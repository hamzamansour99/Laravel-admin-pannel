@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Edit Contact Data</h2>
        </div>
        <div class="card-body">
            <form action="{{url('update/contact/'.$Contact->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Email</label>
                    <input type="email" value="{{$Contact->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Contact Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Phone</label>
                    <input type="text" value="{{$Contact->phone}}" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Contact Phone">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Contact Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3">{{$Contact->address}}</textarea>
                </div>
                
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                    <button type="reset" class="btn btn-secondary btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>

   
@endsection