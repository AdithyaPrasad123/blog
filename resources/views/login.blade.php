@extends('index')
@section('content')
<form action="{{route('dologin')}}" method="POST" class="mt-5 p-3">
    @csrf
    <input type="email" name="email" class="form-control" placeholder="Enter the Email Id as Username"><br>
    <input type="password" name="password" class="form-control" placeholder="Enetr the Password"><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection