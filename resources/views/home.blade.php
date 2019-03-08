@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                
        <div class="container section">
            <form method="POST" action="{{route('publication.store')}}" enctype="multipart/form-data">
                <div class="row">
                    @csrf
                    <div class="col-md-6">
                        <img src="{{asset('images/publications/default-product-img.png')}}" class="img-thumbnail" id="blah">
                    </div>
        
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <div class="mb-3">
                                <input id="title" name="title" placeholder="Title" class="form-control here" required="required" type="text">
                            </div>
                        
                            
                            <div class="mb-3">
                                <select name="leve" class="custom-select">
                                    <option selected>Select Post Level</option>
                                    <option value="BEM">BEM</option>
                                    <option value="BAC">BAC</option>       
                                </select>
                            </div>
        
                            <div class="mb-3">
                                <textarea id="description" name="description" placeholder="description" cols="40" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" class="custom-file-input" name="image" id="imageInput">
                                    <label class="custom-file-label" for="imageInput">Choose file</label>
                                </div>
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">Submit</button>

                        
                    </div>
        
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <img src="https://preview.ibb.co/cu76g9/Employee-2.jpg" alt=""/>
                </div>
                <div class="col-md-6">
                    <h3>
                        Cutting-Edge Skill Development
                    </h3>
                    <p>
                    GetLance Academy hosts regular, rigorous learning sessions for the most in-demand skills. By presenting our elite, experienced network with ongoing opportunities to update and elevate their portfolios, we are able to solve pressing talent shortages while ensuring success for dedicated participants.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>
                        Highly Skilled Volunteers
                    </h3>
                    <p>
                        Through its program, TopVolunteer™, GetLance partners with leading nonprofits and NGOs around the world who need high-skilled talent for their volunteer initiatives. Members of the GetLance network are encouraged to offer their skills and experience to these projects, whether to solve a timely problem or to contribute on an ongoing basis.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="https://preview.ibb.co/erdq8p/Employee-1.jpg" alt=""/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width()
                    .height();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection