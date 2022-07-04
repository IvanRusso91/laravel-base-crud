@extends('layout.main')

@section('content')

<div class="container my-5">

    <div class="row">
        @if ($errors->any())
            <div class="col-8 offset-2 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-8 offset-2">
            <h2 class="mb-3">Modifica {{$comic->title}}</h2>
            <form action="{{ route('comics.update', $comic) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Comics Title</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Comics Title" value="{{ old('title',$comic->title)}}">
                    @error('title')
                        <p class="form-control text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="Comics Type" value="{{ old('type',$comic->type)}}">
                    @error('type')
                        <p class="form-control text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <img class="w-25 mb-3" src="{{$comic->image}}" alt="">
                    <label for="image" class="form-label">URL immage</label>
                    <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror"" placeholder="URL immagine" value="{{ old('image',$comic->image)}}">
                    @error('image')
                        <p class="form-control text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10" >{{ old('description')}}"</textarea>
                    @error('description')
                        <p class="form-control text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>

</div>
@endsection
