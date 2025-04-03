@extends('layout')

@section('content')
    <h2>Song bearbeiten</h2>

    <form action="/songs/{{$song->id}}" method="post">
      @csrf
      @method('PUT')

      <p>
        <label for="title">Titel</label>
        <input type="text" name="title" id="title" value="{{$song->title}}">
      </p>

      <p>
        <label for="band">Band</label>
        <input type="text" name="band" id="band" value="{{$song->band}}">
      </p>

      <p>
        <label for="label">Label</label>
        <select name="labels_id_ref" id="label">
          @foreach ($labels as $label)
              <option @if ($label->id === $song->labels_id_ref) selected @endif value="{{$label->id}}">{{$label->name}}</option>
          @endforeach
        </select>
      </p>

      <p>
        <button type="submit">Änderung speichern</button>
      </p>
    </form>
@endsection