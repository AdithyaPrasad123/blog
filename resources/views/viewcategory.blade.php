@extends('dashboard1')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<table class=" table table-light table-hover mt-5">
    <tr>
        <th>Category</th>       
        <th colspan="3" class="text-center">Action</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td><a href="{{ route('addarticle',['category_id' => $category->id]) }}" class="btn btn-primary">AddArticle</a></td>

        <td><a href="{{ route('viewarticles',['category_id' => $category->id]) }}" class="btn btn-info">ViewArticle</a></td>
        <td><a href="{{ route('editcategory',$category->id) }}" class="btn btn-warning">Edit</a></td>
        <td><a href="{{ route('deletecategory',$category->id) }}" class="btn btn-danger">Delete</a></td>      
    </tr>
    @endforeach
</table>
@endsection