@extends('dashboard')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{ route('updatearticle',$row->id) }}" method="POST" enctype="multipart/form-data" class="mt-5 p-3">
    @csrf
    <input type="hidden" name="category_id" value="{{ $category_id }}">
<input type="text" name="title" class="form-control" value="{{ $row->title }}"><br>
<textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $row->description }}</textarea><br>
<input type="file" name="image"><br><br>
<input type="submit" class="btn btn-primary">

</form>
@endsection
