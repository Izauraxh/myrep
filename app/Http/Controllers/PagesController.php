<?php 
namespace App\Http\Controllers;
use App\Post;
use App\Category;
class PagesController extends Controller
{
public function getIndex ()
{  $categories=Category::all();
	$posts=Post::orderBy('created_at','desc')->limit(4)->get();
     return view('pages/welcome')->withPosts($posts)->withCategories($categories);
}
public function getAbout ()
{
 return view('pages/about');
}
public function GetContact ()
{
       return view('pages/contact');
}
}