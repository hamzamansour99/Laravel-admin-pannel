<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>All Category</b>  
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="container">
    <div class="row">
    <div class="col-md-8">
    <div class="card">
        @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            
        @endif
        
          
    <div class="card-header">All Category</div>             
    <table class="table">
    <thead>
    <tr>
        <th scope="col">SL Number</th>
        <th scope="col">Category Name</th>
        <th scope="col">User</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    {{-- @php($i=1) --}}
    @foreach ($categories as $item)
            
    <tr>
        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
        <td>{{$item->category_name}}</td>
        <td>{{$item->user->name}}</td>

        <td>@if ($item->created_at==NULL)
            <span class="text-danger">No Date Set</span>
            @else
            {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
            @endif
            <td><a href="{{url('category/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
              <a href="{{url('softdelete/category/'.$item->id)}}" class="btn btn-danger">Delete</a> 
            </td>
    </tr>

    @endforeach
    
    </tbody>
</table>
{{$categories->links()}}
</div>
</div>
<div class="col-md-4">
<div class="card">
<div class="card-header">Add Category</div>
<div class="card-body">
<form action="{{route('store.category')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category  Name</label>
      <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="" aria-describedby="emailHelp">

      @error('category_name')
      
      <span class="text-danger">{{$message}}</span>
          
      @enderror
    </div>
 
    <button type="submit" class="btn btn-primary">Add Category</button>
  </form>
</div>
</div>
</div>
</div>
</div>


{{-- trash part --}}

<div class="container">
  <div class="row">
  <div class="col-md-8">
  <div class="card">
  <div class="card-header">Trash List</div>             
  <table class="table">
  <thead>
  <tr>
      <th scope="col">SL Number</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>

  </tr>
  </thead>
  <tbody>
  {{-- @php($i=1) --}}
  @foreach ($trachCat as $item)
          
  <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$item->category_name}}</td>
      <td>{{$item->user->name}}</td>

      <td>@if ($item->created_at==NULL)
          <span class="text-danger">No Date Set</span>
          @else
          {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
          @endif
          <td><a href="{{url('category/restore/'.$item->id)}}" class="btn btn-info">Restore</a>
            <a href="{{url('category/pdelete/'.$item->id)}}" class="btn btn-danger">Pdelete</a> 
          </td>
  </tr>

  @endforeach
  
  </tbody>
</table>
{{$trachCat->links()}}
</div>
</div>
<div class="col-md-4">

</div>
</div>
</div>   

{{-- End Trash --}}

</div>
</x-app-layout>
