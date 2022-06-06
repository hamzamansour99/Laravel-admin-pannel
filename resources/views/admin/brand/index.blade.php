
@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
    <div class="container">
    <div class="row">
    <div class="col-md-8">
    <div class="card">
        {{-- @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            
        @endif --}}
        
          
    <div class="card-header">All Brand</div>             
    <table class="table">
    <thead>
    <tr>
        <th scope="col" width="5%">SL</th>
        <th scope="col" width="5%"> Name</th>
        <th scope="col" width="10%">Image</th>
        <th scope="col" width="25%">Details</th>
        {{-- <th scope="col"width="5%">Created At</th> --}}
        <th scope="col" width="20%">Action</th>

    </tr>
    </thead>
    <tbody>
    {{-- @php($i=1) --}}
    @foreach ($brands as $item)
            
    <tr>
        <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
        <td>{{$item->brand_name}}</td>
        <td><img src="{{asset($item->brand_image)}}" style="height:40px;width:70px;" alt=""></td>
        <td>{{$item->brand_details}}</td>

        {{-- <td>@if ($item->created_at==NULL)
            <span class="text-danger">No Date Set</span>
            @else
            {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
            @endif --}}
            <td><a href="{{url('brand/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
              <a href="{{url('brand/delete/'.$item->id)}}" onclick="return confirm('are you sure to delete')" class="btn btn-danger">Delete</a> 
            </td>
    </tr>

    @endforeach
    
    </tbody>
</table>
{{$brands->links()}}
</div>
</div>
<div class="col-md-4">
<div class="card">
<div class="card-header">Add brand</div>
<div class="card-body">
<form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Brand Name</label>
      <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="" aria-describedby="emailHelp">

      @error('brand_name')
      
      <span class="text-danger">{{$message}}</span>
          
      @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Brand Details</label>
      <textarea name="brand_details" class="form-control" id="exampleInputEmail1" placeholder="" aria-describedby="emailHelp"></textarea>

      @error('brand_details')
      
      <span class="text-danger">{{$message}}</span>
          
      @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Brand Image</label>
        <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" placeholder="" aria-describedby="emailHelp">
  
        @error('brand_image')
        
        <span class="text-danger">{{$message}}</span>
            
        @enderror
      </div>
 
    <button type="submit" class="btn btn-primary">Add brand</button>
  </form>
</div>
</div>
</div>
</div>
</div>

</div>
@endsection

