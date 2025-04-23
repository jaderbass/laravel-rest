@extends('layout')

@section('content')
  <h2>Übersicht</h2>

  <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

    <table class="table table-hover">
      @foreach ($labels as $label)
        <tr>
          <td><a href="/labels/{{$label->id}}">{{$label->name}}</a></td>
          <td class="d-flex">
            <a href="/labels/{{$label->id}}/edit" class="btn btn-warning me-3">Label bearbeiten</a>

            <form action="{{url('/labels', ['id' => $label->id])}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Label löschen</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

  </div>
@endsection