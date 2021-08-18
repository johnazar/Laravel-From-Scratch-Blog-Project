<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostPublishedEvent;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                        request(['search', 'category', 'author'])
                    )
                    ->Published()
                    ->paginate(18)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        PostPublishedEvent::dispatch($post);
        $post->view_count++;
        $post->save();
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
