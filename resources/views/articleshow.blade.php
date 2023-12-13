@extends('dashboard1')

@section('content')
    <div class="card">
        <div class="card-body">
        <img src="{{ asset('storage/image/'.$article->image) }}" class="card-img-top" alt="photo" width="75" height="200">
            <h5 class="card-title text-center">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->description }}</p>
            
        </div>
    </div>
@endsection
