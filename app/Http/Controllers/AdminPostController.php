<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostPublishedEvent;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $post = Post::create(array_merge($this->validatePost(), [
            // 'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('images',['disk'=>'public'])
        ]));
        PostPublishedEvent::dispatch($post);

        return redirect()->route('admin.posts.index')->with('Post created!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // 'user_id'=> $post->exists ? ['exists:users,id'] : request()->user()->id,
            'user_id'=>  ['required', Rule::exists('users', 'id')],
        ]);
    }
}
