@extends('layout')

@section('content')
    <h2>Neuer Song</h2>

    <form class="row" action="/songs" method="post">
      @csrf
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label" for="title">Titel</label>
          <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="mb-3">
          <label class="form-label" for="band">Band</label>
          <input class="form-control" type="text" name="band" id="band" value="{{old('band')}}">
        </div>
      </div>

      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label" for="label">Label</label>
          <select class="form-select" name="labels_id_ref" id="label">
            <option disabled selected>-- Bitte auswählen --</option>
            @foreach ($labels as $label)
                <option value="{{$label->id}}">{{$label->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="mt-5">
          <button class="btn btn-success" type="submit">Speichern</button>
        </div>

        
        {{-- Fehlerausgabe --}}
        @if ($errors->any())
          <div class="alert alert-danger mt-5">
            <ul class="list-group">
              @foreach ($errors->all() as $error)
                <li class="list-group-item bg-transparent"> {!! $error !!} </li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    
    </form>
@endsection