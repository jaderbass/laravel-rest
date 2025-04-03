@extends('layout')

@section('content')
  <nav>
    <a href="/songs/create">Neuen Song anlegen</a>
  </nav>
    <ul>
      @foreach ($songs as $song)
        <li> 
          <a href="{{url('/songs', ['id' => $song->id])}}">{{$song->title}}</a> 
            von {{$song->band}} 
            Label: {{$song->name}}
          <a href="/songs/{{$song->id}}/edit">Song bearbeiten</a>
          <form action="{{url('/songs', ['id' => $song->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Song löschen</button>
          </form>
        </li>
      @endforeach
    </ul>
@endsection