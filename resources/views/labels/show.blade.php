@extends('layout')

@section('content')
  <h2>{{ $label->name }}</h2>

  <p>
    <small>
      erstellt am: <i>{{$label->created_at}}</i><br>
      geändert am: <i>{{$label->updated_at}}</i>
    </small>
  </p>
@endsection