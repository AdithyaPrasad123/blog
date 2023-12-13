

@extends('dashboard')

@section('content')
@if(Session::has('success'))
    <p class="alert alert-info">{{ Session::get('success') }}</p>
@endif

<div class="row">
    @forelse($data as $datas)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset('storage/image/'.$datas->image) }}" class="card-img-top" alt="photo">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $datas->title }}</h5>
                    <p class="card-text flex-grow-1">
                        @if(strlen($datas->description) > 50)
                            {{ substr($datas->description, 0, 50) }} <a href="{{ route('articleshow', ['id' => $datas->id]) }}">Read More</a>
                        @else
                            {{ $datas->description }}
                        @endif
                    </p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('editarticle', $datas->id) }}" class="btn btn-warning ml-auto">Edit</a>&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('deletearticle', $datas->id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="col-md-12">No articles available for this category.</p>
    @endforelse
</div>
@endsection
