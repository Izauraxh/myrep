<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
Use Session;
Use App\Comment;

class CommentsController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth',['except'=>'store']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {  $this->validate($request, array(
        'name'=>'required|max:255',
        'email'=>'required|max:255|email',
        'comment'=>'required|min:5|max:2000'
    ));
    $post=Post::find($post_id);
      $comment =new Comment();
      $comment->name=$request->name;
      $comment->email=$request->email;
      $comment->comment=$request->comment;
      $comment->approved=true;
      $comment->post()->associate($post);
      $comment->save();
      Session::flash('success','Comment was added!');
      return redirect()->route('blog.single',[$post->slug]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $comment=Comment::find($id);
     return view('comments.edit')->withComment($comment);
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
        $comment=Comment::find($id);
        $this->validate($request,array('comment'=>'required|max:2000|min:5'));
        $comment->comment=$request->comment;
        $comment->save();

        Session::flash('success','You succesfully edited comment!');

        return redirect()->route('posts.show',$comment->post_id);
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $comment=Comment::find($id);
        return view('comments.delete')->withComment($comment);

    }
    public function destroy($id)
    {
        $comment=Comment::find($id);
        $post_id=$comment->post_id;
        $comment->delete();
        session::flash('success','Comment deleted!');
        return redirect()->route('posts.show',$post_id);
        
    }
}
