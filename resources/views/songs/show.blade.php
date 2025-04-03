@extends('layout')

@section('content')
    <h2>{{ $song->title }}</h2>
    <p>
      von <b>{{ $song->band }}</b>, <br>
      Label: <b>{{ $song->name }}</b>
    </p>
    <p>
      <small>
        angelegt am: <i>{{$song->created_at}}</i><br>
        geändert am: <i>{{$song->updated_at}}</i>
      </small>
    </p>
@endsection