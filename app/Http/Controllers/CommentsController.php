<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::get()->all();
        return view('comment', compact('comments'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $postid = $id;
        return view('createComment', compact('postid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postid)
    {
        $attributes = request()->validate([
            'content'=>'required',
            'post_id'=> 'required',
            'user_id'=> 'required',
        ]);
        $comment = Comment::create($attributes);
        return redirect()->route('read', $postid);  
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($postid)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comment::findOrFail($id);
        return view('editComment', compact('comments'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $attributes = request()->validate([
            'content' => 'required',
            'post_id'=> 'required',
            'user_id'=> 'required',
        ]);
        $comments = Comment::findOrFail($id);
        $comments->update($attributes);
        return redirect()->route('comments');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Comment::findOrFail($id);
        $post->delete();
        return redirect()->route('comments');    }
}
