@extends('layouts.app')

@section('content')
    
<div class="col-md-8">
<form method="POST" action="{{route('publication.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="text" class="col-12 col-form-label">Enter Title here</label> 
            <div class="col-12">
                <input id="title" name="title" placeholder="Enter Title here" class="form-control here" required="required" type="text">
            </div>
            <label for="text" class="col-12 col-form-label">Enter Title here</label> 
            <div class="col-12">
                <input id="user_id" name="user_id" placeholder="Enter Title here" class="form-control here" required="required" type="text">
            </div>
            
            <div class="custom-file col-12">
                <input type="file" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" class="custom-file-input" name="image" id="image">
                <img src="{{asset('images/publications/add_image.png')}}" class="custom-file-label image-fluid" for="customFile" id="blah">
            </div>
        </div>
        <div class="form-group row">
            <label for="textarea" class="col-12 col-form-label">Visual Editor</label> 
            <div class="col-12">
            <textarea id="description" name="description" cols="40" rows="5" class="form-control"></textarea>
            </div>
        </div> 
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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