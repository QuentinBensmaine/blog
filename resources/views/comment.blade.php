@extends('layout.master')

@section('content')

<div class="container mt-5">
  @guest
  <div class="row">
    @foreach ($comments as $comment)
    <div class="col-sm-4">
      <div class="card mt-5 mb-5" style="width: 18rem;">
        <div class="card-body">
          <h3 class="card-title text-center">{{ $comment->post->title }}</h3>
          <h5 class="card-subtitle">{{ $comment->user->name }}</h5>
          <p class="card-text">"{{ $comment->content }}"</p>
          <p class="card-text">{{$comment->created_at}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  @if (Auth::user()->hasRole('admin'))
  <div class="text-center"><a class="btn btn-primary mt-4" href="{{ url('comment/create') }}">Créer un commentaire</a></div>
  @endif
  <div class="row">
    @foreach ($comments as $comment)
    <div class="col-sm-4">
      <div class="card mt-5 mb-5" style="width: 18rem;">
        <div class="card-body">
          <h3 class="card-title text-center">{{ $comment->post->title }}</h3>
          <h5 class="card-subtitle">{{ $comment->user->name }}</h5>
          <p class="card-text">"{{ $comment->content }}"</p>
          <p class="card-text">{{$comment->created_at}}</p>
          @if (Auth::user()->hasRole('admin'))
          <a class="btn btn-primary mt-4" href="{{ url('comment/edit/'.$comment->id) }}">Modifier</a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endguest
</div>

@endsection