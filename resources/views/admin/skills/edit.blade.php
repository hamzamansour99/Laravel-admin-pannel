@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2> Edit Skill Details</h2>
        </div>
        <div class="card-body">
            <form action="{{url('skill/update/'.$skills->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Skill Title</label>
                    <input type="text" name="skill" value="{{$skills->skill}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Skill Percentage</label>
                    <input type="number" name="percentage" value="{{$skills->percentage}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Skill percentage">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>

   
@endsection