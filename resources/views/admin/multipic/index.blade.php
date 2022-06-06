
@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
    <div class="container">
    <div class="row">

    <div class="col-md-8">
      @if (session('success'))

      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          
      @endif
      <div class="card-header">Portfolio Images</div>
        <div class="card-group">
            
    <table class="table">
      <thead>
      <tr>
          <th scope="col" width="15%">SL Number</th>
          <th scope="col" width="20%">Image</th>
          <th scope="col" width="20%">Created At</th>

          <th scope="col" width="20%">Action</th>
      </tr>
      </thead>
      <tbody>
      @php($i=1)
      @foreach($images as $multi)
              
      <tr>
          <th scope="row">{{$i++}}</th>
          <td><img src="{{ asset($multi->image) }}" style="height:80px;width:140px;" alt=""></td>
          <td>{{Carbon\Carbon::parse($multi->created_at)->diffForHumans()}}</td>
          <td>
          <a href="{{url('multi/delete/'.$multi->id)}}" onclick="return confirm('are you sure to delete')" class="btn btn-danger">Delete</a> 
          </td>
          
      </tr>
      @endforeach
      </tbody>
  </table>
 {{-- <div> {{$images->links()}}</div> --}}

 
  
  
        </div>
    </div>
  

    

<div class="col-md-4">
<div class="card">
<div class="card-header">Multi Image</div>
<div class="card-body">
<form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="form-group">
        <label for="exampleInputEmail1">Multi Image</label>
        <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" 
          aria-describedby="emailHelp" multiple="">
  
        @error('image')
        
        <span class="text-danger">{{$message}}</span>
            
        @enderror
      </div>
 
    <button type="submit" class="btn btn-primary">Add Image</button>
  </form>
</div>
</div>
</div>
</div>
</div>

</div>
@endsection

