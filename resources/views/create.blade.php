@extends('layout.master')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ url('post/create') }}">
@csrf
        <div class="form-group">
          <label>Ttre du post</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
          <label>Description du post</label>
          <textarea rows="2" class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
          <label>Contenu du post</label>
          <textarea rows="4" class="form-control" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection