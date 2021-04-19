@extends('layout.master')

@section('content')

<div class="container mt-5">
  @guest
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-sm-4">
        <div class="card mt-5 mb-5" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title text-center">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <a class="btn btn-primary float-right mt-4" href="{{ url('post/read/'.$post->id) }}">Lire</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @else
    @if (Auth::user()->hasRole('admin'))
    <div class="text-center"><a class="btn btn-primary mt-4" href="{{ url('post/create') }}">Créer un post</a></div>
    <div class="text-center"><a class="btn btn-primary mt-4" href="{{ url('comment') }}">Gérer les commentaires</a></div>
    @endif
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-sm-4">
        <div class="card mt-5 mb-5" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title text-center">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <a class="btn btn-primary float-right mt-4" href="{{ url('post/read/'.$post->id) }}">Lire</a>
            @if (Auth::user()->hasRole('admin'))
            <a class="btn btn-primary mt-4" href="{{ url('post/edit/'.$post->id) }}">Modifier</a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  @endguest
</div>

@endsection