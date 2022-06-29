@extends('layout.main')

@section('content')

    <div class="container box-ir">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">Type</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                <tr>
                  <th scope="row">{{$comic->id}}</th>
                  <td>{{$comic->title}}</td>
                  <td>{{$comic->type}}</td>
                  <td>
                    <a class="btn btn-success" href="{{route('comics.show',$comic)}}">Show</a>
                    <a class="btn btn-primary" href="">EDIT</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>

    </div>

@endsection
