@extends('layout')

@section('content')
  <h2>Übersicht</h2>
  
  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    
    @foreach ($songs as $song)
      <div class="col"> 
        <div class="card">

          <div class="card-header">
            <h5><a href="{{url('/songs', ['id' => $song->id])}}">{{$song->title}}</a></h5>
          </div>

          <div class="card-body">
            <p class="card-title">
              von {{$song->band}}<br>
              Label: {{$song->name}}
            </p>
          </div>

          <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-warning" href="/songs/{{$song->id}}/edit">Song bearbeiten</a>
            
            <form action="{{url('/songs', ['id' => $song->id])}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Song löschen</button>
            </form>
          </div>

        </div>
      </div>
    @endforeach

  </div>

  
  
    
  
@endsection