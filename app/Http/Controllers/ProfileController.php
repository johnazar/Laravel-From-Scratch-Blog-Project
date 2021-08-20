<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function bookmarks(){
        // get user
        // get bookmarks
        $bookmarks = auth()->user()->bookmarks;

        return view('profile.bookmarks',compact('bookmarks'));
    }
    public function avatar(){
        // get user
        // get avatar
        return view('profile.avatar');
    }
}
