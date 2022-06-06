<?php

namespace App\Http\Controllers;

use App\Events\LogPostEvent;
use App\Http\Requests\PostRequest;
use App\Jobs\LogPostJob;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //type hinting

    public function __construct()
    {
        $this->middleware('even_post_id')->only([
            'show'
        ]);
    }


    public function store(PostRequest $request)
    {
        $post =  Post::create($request->all());
       //dispatch(new LogPostJob($post));
       event(new LogPostEvent($post));

        return $post;
    }

    public function update(Request $request, Post $post)
    {


        $updatedPost = tap($post)->update($request->all());
        dispatch(new LogPostJob($updatedPost));

        return $updatedPost;

    }

    public function show(Post $post)
    {
        return $post;

    }

    public function index()
    {
        return Post::all();
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'ok']);

    }
}
