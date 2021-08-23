<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function avatarset() 
    {
        $val = request()->validate([
            'avatar'=>   'required|mimes:jpg,bmp,png|max:10120',
        ]);
        // dd($val);
        $path= Storage::disk('public')->putFile('avatars',request()->file('avatar'));
        Storage::delete(auth()->user()->avatar);
        auth()->user()->update(['avatar'=>$path]);
        return back();

    }
    public function follow()
    {
        $val = request()->validate([
            'author_id'=>  ['required', Rule::exists('users', 'id')],
        ]);
        auth()->user()->follow()->attach($val['author_id']);

        return back();

    }
    public function unfollow()
    {
        $val = request()->validate([
            'author_id'=>  ['required', Rule::exists('users', 'id')],
        ]);
        auth()->user()->follow()->detach($val['author_id']);

        
        return back();
    }

    public function bookmark()
    {
        $val = request()->validate([
            'post_id'=>  ['required', Rule::exists('posts', 'id')],
        ]);
        auth()->user()->bookmarks()->attach($val['post_id']);
        return back();
    }
    public function unbookmark()
    {
        $val = request()->validate([
            'post_id'=>  ['required', Rule::exists('posts', 'id')],
        ]);
        auth()->user()->bookmarks()->detach($val['post_id']);
        return back();
    }
    
}
