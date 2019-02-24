<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'birth' => ['required','date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $student = Student::create([
            'classe_id' => $data['classe_id']
         ]);
        // var_dump($student);
        // die();
        $user = User::create([
            'name' => $data['name'],
            'birth'=> $data['birth'],
            'gender'=> $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
            'userable_id' => $student->id,
            'userable_type' => 'App\Student',
        ]);
        $user->slug =Str::slug($user->name,'-').'-'.$user->id;
        $user->save();
        return $user;
    }

    protected function showRegistrationForm()
    {
        $classes = Classe::all();
        return view('auth.register')->with('classes',$classes);
    }
}
