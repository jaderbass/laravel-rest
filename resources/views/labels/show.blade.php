@extends('layout')

@php
  // function dates2german($date) 
  //   {
  //       $pieces = explode(' ', $date);
  //       $dPieces = explode('-', $pieces[0]);
  //       $date = $dPieces[2] . '.' . $dPieces[1] . '.' . $dPieces[0] . ' ' . $pieces[1];
  //       return $date;
  //   }
@endphp

@section('content')
  <h2>Label: <span style="color: #fd7e14;">{{ $label->name }}</span></h2>

  <p>
    <small>
      {{-- erstellt am: @dates2german($label->created_at)<br>
      geändert am: @dates2german($label->updated_at) --}}
      erstellt am: {{$label->created_at}}<br>
      geändert am: {{$label->updated_at}}
    </small>
  </p>

  <hr>
  <h3>verlegte Songs</h3>

  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    
  @php if(is_null($songs)): @endphp
    <div class="col">
      noch keine Songs vorhanden.
    </div>
  @php else: @endphp
    @foreach ($songs as $song)
      <div class="col">
        <div class="card h-100">

          <div class="card-header">
            <h5><a href="{{url('/songs', ['id' => $song->id])}}">{{$song->title}}</a></h5>
          </div>

          <div class="card-body">
            <p class="card-title">
              von <strong>{{$song->band}}</strong>
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
  @php endif; @endphp

  </div>
@endsection