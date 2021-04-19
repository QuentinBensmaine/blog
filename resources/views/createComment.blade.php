@extends('layout.master')

@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ url('post/comment/' .$postid) }}">
@csrf
        <div class="form-group">
          <label>Commentaire :</label>
          <textarea rows="4" class="form-control" name="content"></textarea>
        </div>
        <div class="form-group" style="display: none;">
          <textarea name="user_id">{{Auth::user()->id}}</textarea>
          <textarea name="post_id">{{$postid}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</div>

@endsection