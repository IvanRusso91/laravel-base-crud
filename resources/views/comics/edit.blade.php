@extends('layout.main')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="mb-3">Modifica {{$comic->title}}</h2>
            <form action="{{ route('comics.store') }}" method="POST">

                @csrf
                @method('UPT')
                <div class="mb-3">
                    <label for="title" class="form-label">Comics Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Comics Title" value="{{$comic->title}}">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <input type="text" id="type" name="type" class="form-control" placeholder="Comics Type" value="{{$comic->type}}">
                </div>
                <div class="mb-3">
                    <img class="w-25 mb-3" src="{{$comic->image}}" alt="">
                    <label for="image" class="form-label">URL immage</label>
                    <input type="text" id="image" name="image" class="form-control" placeholder="URL immagine" value="{{$comic->image}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>

</div>
@endsection
