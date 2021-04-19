@extends('layout.master')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div class="flex-center full-height">

    <div class="content">
        <div class="title m-b-md">
            Bienvenue sur mon blog
        </div>

        <div class="links">
            <a href="{{ url('post') }}">Derniers posts</a>
        </div>
    </div>
</div>
</html>
@endsection