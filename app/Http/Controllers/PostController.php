<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Purifier;
use Storage;
use Image;
class PostController extends Controller

{  //only authorized users
      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all blog post from db
          $post=Post::orderBy('id','desc')->paginate(5);
          
        //return a view and pass in the above variable
        return view('posts.index')->withPosts($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tags=Tag::all();
        $categories=Category::all();
        return view('posts/create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required',
            'featured_image'=>'sometimes|image'
        ));
        //store in database
        $post= new Post;
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=Purifier::clean($request->body);
        //save our image
        if($request->hasFile('featured_image'))
        {   //saving the image to public folder
            $image=$request->file('featured_image');
            $filename=time(). '.' . $image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            //saving into the db
            $post->image=$filename;

        }
        $post->save();
        
        $post->tags()->sync($request->tags,false);
        Session::flash('success','The blog post was successfully saved');
        return redirect()->route('posts.show',$post->id);
        
        //redirect to another page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $post= Post::find($id) ;
         $categories=Category::all();
        $cats=array(); 
        foreach($categories as $category)
        {
        $cats[$category->id]=$category->name;
        }
        $tags=Tag::all();
        $tags2=array();
        foreach($tags as $tag)
        {
            $tags2[$tag->id]=$tag->name;
        }
       
        //return the view and pass the var
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data
        $post=Post::find($id);
   
        $this->validate($request,array(
            'title'=>'required|max:255',
            'slug'=>"required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id'=>'required|integer',
            'body'=>'required',
            'featured'=>'image'

        ));
        //save the data to database
        $post=Post::find($id);
        $post->title= $request->input('title');
        $post->slug= $request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->body= Purifier::clean($request->input('body'));

        if($request->hasFile('featured_image'))
        { 
             //saving the image to public folder
             $image=$request->file('featured_image');
             $filename=time(). '.' . $image->getClientOriginalExtension();
             $location=public_path('images/'.$filename);
             Image::make($image)->resize(800,400)->save($location);
             $oldfilename=$post->image;
             //saving into the db
             $post->image=$filename;
             Storage::delete($oldfilename);

        }
        $post->save();
        if(isset($request->tags)){
        $post->tags()->sync($request->tags);
        }
        else{
            $post->tags()->sync(array());
        }

        session::flash('success','This post was successfully saved');
        //redirect with flash data to post.show
        return redirect()->route('posts.show',$post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $post=Post::find($id);
        $post->tags()->detach();
        $post->delete();
        session::flash('success','Post deleted!');
        return redirect()->route('posts.index');
    }
}
