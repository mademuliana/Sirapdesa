<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('home',['posts' => $posts]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        return view('welcome');
    }

    /**
     * Show the aplication about
     *
     * @return \Illuminate\Http\Response
     */
    public function showAbout(){
        return view('about');
    }
}
