
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
        
          
    <div class="card-header">Team skills</div>             
    <table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">SL Number</th>
        <th scope="col" width="15%">Skill</th>
        <th scope="col" width="15%">Percentage</th>
        <th scope="col" width="15%">Action</th>

    </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($searched as $skill)
            
    <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$skill->skill}}</td>
        <td>{{$skill->percentage}}</td>
        <td><a href="{{url('skill/edit/'.$skill->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('skill/delete/'.$skill->id)}}" onclick="return confirm('are you sure to delete')" class="btn btn-danger">Delete</a> 
            </td>
    </tr>

    @endforeach
    
    </tbody>
</table>

</div>
</div>

   
<a href="{{route('add.skill')}}"><button style="margin-left:10.2in;margin-top:50px;"class="btn btn-info">Add team skill</button></a> 
</div>
</div>

</div>
@endsection

