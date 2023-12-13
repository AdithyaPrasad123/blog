@extends('dashboard')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{route('doaddcategory')}}" method="POST" class="mt-5 p-3">
    @csrf
    <input type="text" name="name" class="form-control" placeholder="Add category"><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection