@extends('index')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{route('doregister')}}" method="POST" class="mt-5 p-3">
    @csrf
    <input type="text" name="name" class="form-control" placeholder="Enter the Name"><br>
    <input type="email" name="email" class="form-control" placeholder="Enter the Email Id"><br>
    <input type="password" name="password" class="form-control" placeholder="Enetr the Password"><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection