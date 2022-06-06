@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Member</h2>
        </div>
        <div class="card-body">
            <form action="{{url('member/update/'.$members->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value="{{$members->image}}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" value="{{$members->name}}" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Position</label>
                    <input type="text" name="position" value="{{$members->position}}" class="form-control" id="exampleFormControlInput1" placeholder="Position">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Member Image</label>
                    <input type="file" name="image" value="{{$members->image}}"  class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <img src="{{asset($members->image)}}" style="width:400px;height:200px" alt="">

                </div> 
                <div class="form-group">
                    <label for="exampleFormControlInput1">Facebook</label>
                    <input type="text" name="facebook" value="{{$members->facebook}}" class="form-control" id="exampleFormControlInput1" placeholder="Facebook Link">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Instagram</label>
                    <input type="text" name="instagram" value="{{$members->instagram}}" class="form-control" id="exampleFormControlInput1" placeholder="Instagram Link">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{$members->linkedin}}" class="form-control" id="exampleFormControlInput1" placeholder="LinkedIn Link">
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>

   
@endsection