<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Banner;


class HomeController extends Controller
{
	private $totalPage = 6;

 	public function index(){
 		$banners = Banner::latest()->get();
 		$posts = Post::latest()->paginate($this->totalPage);
 		return view('site.index', compact('banners', 'posts'));
 	}
 	public function verMais(Request $request, $id){
 		$banners = Banner::latest()->get();
        $post = Post::find($id);
        return view('site.show-post', compact('banners', 'post'));
 	}
}
