@extends('main')
@section('content')

<div class="container mt-3">
  <div class="row">
    <div class="col-md-6">
      <h3>Dashboard Users</h3>
    </div>
    <div class="col-md-6">
      <a href="{{ route('adduser') }}" type="submit" class="btn btn-success">Add User</a>
    </div>
  </div>
	@if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
               {{ $message }}
            </div>
  @endif
	<table class="table table-hover mt-3 mb-5	">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($cruds as $crud)  
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
      <td>{{$crud->email}}</td>
      <td><img src="{{asset('image')}}/{{ $crud->image }}" class="mb-2" style="width:100px;height:50px;"></td>
      <td>{{$crud->dob}}</td>
      <td>{{$crud->country->name}}</td>
      <td>{{$crud->state->name}}</td>
      <td>{{$crud->city->name}}</td>
      <td>
          <a href="{{ route('edit',$crud->id)}}"><i class="fa fa-edit" style="font-size:24px; color:blue;"></i></a> 
          <a href="{{ route('delete',$crud->id)}}"><i class="fa fa-trash" onclick="return confirm('Are you sure?')" style="font-size:30px;color:blue"></i></a>
           <a href="{{ route('single',$crud->id)}}"><i class="fa fa-eye" style="font-size:30px;color:blue"></i></a>
      </td>
    </tr>
    @endforeach 
  </tbody>
</table>
    
        {!! $cruds->links() !!}
</div>
@endsection