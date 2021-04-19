@extends('layout.master')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ url('post/edit/'.$posts->id) }}">
        @csrf
        <div class="form-group">
          <label>Titre du post</label>
          <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
        </div>
        <div class="form-group">
          <label>Description du post</label>
          <textarea rows="2" class="form-control" name="description">{{ $posts->description }}</textarea>
        </div>
        <div class="form-group">
          <label>Contenu du post</label>
          <textarea rows="4" class="form-control" name="content">{{ $posts->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
    <form action="{{ url('post/delete/'.$posts->id) }}" method="POST">
        @csrf
        @method('DELETE')
            <button class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
    </form>
</div>

@endsection