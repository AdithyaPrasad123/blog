@extends('dashboard')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{route('updatearticle',$row->id)}}" method="POST" enctype="multipart/form-data" class="mt-5 p-3">
    @csrf
    <input type="text" name="name" class="form-control" value="{{$row->name}}"><br>
    <textarea name="description" id="description" cols="30" rows="10" value="{{$row->description}}" class="form-control"></textarea>
    <input type="file" name="image"><br><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection