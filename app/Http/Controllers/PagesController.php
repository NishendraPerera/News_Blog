<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller {

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first='Nishendra';
        $last='Perera';

        $fullname=$first. " ".$last;
        $email='shenalnishendra@gmail.com';
        return view('pages.about')->withFullname($fullname)->withemail($email);
    }

    public function getContact() {
        return view('pages.contact');
    }

}