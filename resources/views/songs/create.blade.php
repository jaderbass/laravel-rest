@extends('layout')

@section('content')
    <h2>Neuer Song</h2>

    <form action="/songs" method="post">
      @csrf
      <p>
        <label for="title">Titel</label>
        <input type="text" name="title" id="title" value="{{old('title')}}">
      </p>

      <p>
        <label for="band">Band</label>
        <input type="text" name="band" id="band" value="{{old('band')}}">
      </p>

      <p>
        <label for="label">Label</label>
        <select name="labels_id_ref" id="label">
          @foreach ($labels as $label)
              <option value="{{$label->id}}">{{$label->name}}</option>
          @endforeach
        </select>
      </p>

      <p>
        <button type="submit">Speichern</button>
      </p>
    
    </form>

    {{-- Fehlerausgabe --}}
    @if ($errors->any())
      <div>
        <ul>
          @foreach ($errors->all() as $error)
              <li> {!! $error !!} </li>
          @endforeach
        </ul>
      </div>
    @endif
@endsection