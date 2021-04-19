@extends('layout.master')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ url('comment/edit/'.$comments->id) }}">
        @csrf
        <div class="form-group">
          <label>Contenu du commentaire</label>
          <textarea rows="4" class="form-control" name="content">{{ $comments->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
    <form action="{{ url('comment/delete/'.$comments->id) }}" method="POST">
        @csrf
        @method('DELETE')
            <button class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
    </form>
</div>

@endsection