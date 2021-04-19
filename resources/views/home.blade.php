@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-title"> <a class="btn btn-danger mt-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div>
                        {{Auth::user()->name}}<br>
                        {{Auth::user()->email}}
                    </div>
                    <div class="container">
                        <div class="row">
                            @foreach (Auth::user()->comments as $comment)
                            <div class="col-5">
                                <div class="card mt-5 mb-5" style="width: 18rem;">
                                    <div class="card-body">
                                        <p class="card-title">{{$comment->post->title}}</p>
                                        <p class="card-text">"{{$comment->content}}"</p>
                                        <p class="card-text">{{$comment->created_at}}</p>
                                        @if (Auth::user()->hasRole('admin'))
                                        <a class="btn btn-primary mt-4" href="{{ url('comment/edit/'.$comment->id) }}">Modifier</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection