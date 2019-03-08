<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;


class PublicationController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publication.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'user_id'   =>  'required'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/publications/'), $imageName);
       
        $publication = Publication::Create([
            'title'         =>  $request->title,
            'description'   =>  $request->description,
            'image'         =>  $imageName,
            'user_id'       =>  Auth::user()->id
        ]);

        return redirect()->back()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
