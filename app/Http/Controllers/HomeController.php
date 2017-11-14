<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // public function mySearch(Request $request){
    //   if($request->has('search')){
    //     $videos = Video::search($request->get('search'))->get();
    //   }
    //   else{
    //     $videos = Video::get();
    //   }
    //
    //   return view('Video.index', compact('videos'));
    // }
}
