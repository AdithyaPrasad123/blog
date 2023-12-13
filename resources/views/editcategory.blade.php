@extends('dashboard')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{route('updatecategory',$row->id)}}" method="POST" class="mt-5 p-3">
    @csrf
    <input type="text" name="name" class="form-control" value="{{$row->name}}"><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection