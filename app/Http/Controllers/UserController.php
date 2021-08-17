<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
    
}
