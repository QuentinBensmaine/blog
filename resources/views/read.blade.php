@extends('layout.master')

@section('content')
@guest
<div class="container mt-5 read">
  <div class="card mt-5 mb-5">
    <div class="card-body">
      <h1 class="card-title text-center title">{{ $posts->title }}</h1>
      <h2 class="card-text">{{ $posts->description }}</h2>
      <p class="card-text">{{ $posts->content }}</p>
      <div class="card-footer text-muted">
        <a class="btn btn-primary float-left mt-4" href="{{ url('post') }}">Retour</a>
        Written : {{ $posts->created_at }}
        <t style="display: none;">{{ $next = $posts->id +1}}</t>
        <a class="btn btn-primary float-right mt-4" href="{{ url('post/read/'.$next) }}">Post suivant</a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    @foreach ($comments as $comment)
    <div class="col-4">
      <div class="card mt-5 mb-5" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$comment->user->name}}</h5>
          <p class="card-title">{{$comment->created_at}}</p>
          <p class="card-text">"{{$comment->content}}"</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
<div class="container mt-5 read">
  <div class="card mt-5 mb-5">
    <div class="card-body">
      <h1 class="card-title text-center title">{{ $posts->title }}</h1>
      <h2 class="card-text">{{ $posts->description }}</h2>
      <p class="card-text">{{ $posts->content }}</p>
      <div class="card-footer text-muted">
        <a class="btn btn-primary float-left mt-4" href="{{ url('post') }}">Retour</a>
        Written : {{ $posts->created_at }}
        <t style="display: none;">{{ $next = $posts->id +1}}</t>
        <a class="btn btn-primary float-right mt-4" href="{{ url('post/read/'.$next) }}">Post suivant</a>
      </div>
      <a class="btn btn-primary mt-4" href="{{ url('post/comment/'.$posts->id) }}">Commenter</a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    @foreach ($comments as $comment)
    <div class="col-4">
      <div class="card mt-5 mb-5" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$comment->user->name}}</h5>
          <p class="card-title">{{$comment->created_at}}</p>
          <p class="card-text">"{{$comment->content}}"</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endguest
@endsection