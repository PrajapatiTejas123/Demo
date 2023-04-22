@extends('main')
@section('content')

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding:5px;
  text-align: left;
}
</style>

<div class="container mt-3">
<h2>User Personal Details:</h2>
<table style="width:30%" class="mt-3">
  <tr>
    <th>First Name :</th>
    <td>{{$crud->firstname}}</td>
  </tr>
  <tr>
    <th>Last Name :</th>
    <td>{{$crud->lastname}}</td>
  </tr>
  <tr>
    <th>Email :</th>
    <td>{{$crud->email}}</td>
  </tr>
  <tr>
    <th>Image :</th>
    <td><img src="{{asset('image')}}/{{ $crud->image }}" class="mb-2" style="width:100px;height:50px;"></td>
  </tr>
  <tr>
    <th>Date Of Birth :</th>
    <td>{{$crud->dob}}</td>
  </tr>
  <tr>
    <th>Gender :</th>
    <td>{{$crud->gender}}</td>
  </tr>
  <tr>
    <th>Mobile :</th>
    <td>{{$crud->mobile}}</td>
  </tr>
  <tr>
    <th>Country :</th>
    <td>{{$crud->country}}</td>
  </tr>
  <tr>
    <th>State :</th>
    <td>{{$crud->state}}</td>
  </tr>
  <tr>
    <th>City :</th>
    <td>{{$crud->city}}</td>
  </tr>
</table>
</div>

@endsection