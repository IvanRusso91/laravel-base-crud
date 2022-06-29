@extends('layout.main')

@section('content')

    <div class="container text-center ">
        <h1 class="titolo">{{$comic->title}} <a class="btn btn-primary" href="">EDIT</a></h1>
        <span class="bg-info badge text-bg-info">{{$comic->type}}</span>

            <div class="img-box">
                <img src="{{$comic->image}}" alt="{{$comic->title}}">
            </div>

            <a class="btn btn-secondary" href="{{ route('comics.index')}}"><< Torna</a>

        </div>
    </div>

@endsection
