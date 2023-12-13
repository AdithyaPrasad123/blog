@extends('dashboard')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{ route('doaddarticle') }}" method="POST" enctype="multipart/form-data" class="mt-5 p-3">
    @csrf
    <input type="hidden" name="category_id" value="{{ $category_id }}">
    <input type="text" name="title" class="form-control" placeholder="Add Title"><br>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Add your article" class="form-control"></textarea><br>
    <input type="file" name="image"><br>   
    <input type="hidden" name="category_id" value="{{ $category_id }}"><br><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection
