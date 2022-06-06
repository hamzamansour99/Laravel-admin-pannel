
@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
        @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            
        @endif
        
          
    <div class="card-header">Team Members</div>             
    <table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">SL Number</th>
        <th scope="col" width="5%">Name</th>
        <th scope="col" width="5%">Position</th>
        <th scope="col" width="10%">Image</th>
        <th scope="col" width="5%">Facebook</th>
        <th scope="col" width="5%">Instagram</th>
        <th scope="col" width="5%">LinkedIn</th>

        <th scope="col" width="15%">Action</th>

    </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($teams as $team)
            
    <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$team->name}}</td>
        <td>{{$team->position}}</td>
        <td><img src="{{asset($team->image)}}" style="height:40px;width:70px;" alt=""></td>
        <td>{{$team->facebook}}</td>
        <td>{{$team->instagram}}</td>
        <td>{{$team->linkedin}}</td> 
        <td><a href="{{url('team/edit/'.$team->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('team/delete/'.$team->id)}}" onclick="return confirm('are you sure to delete')" class="btn btn-danger">Delete</a> 
            </td>
    </tr>

    @endforeach
    
    </tbody>
</table>

</div>
</div>

   
<a href="{{route('add.member')}}"><button style="margin-left:10.2in;margin-top:50px;"class="btn btn-info">Add team member</button></a> 
</div>
</div>

</div>
@endsection

