@extends('main')
@section('title','|Categories')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>{{$category->name}} Tag : <small>{{$category->posts()->count()}} Posts</small></h2>
	</div>

</div>
@foreach ($category->posts as $post)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>{{$post->title}}</h2>
        <h5>Published:{{date('M j, Y',strtotime($post->created_at))}}</h5>
        <img src="{{asset('images/'.$post->image)}}" class="img-sm">
        <p>{{substr(strip_tags($post->body),0,250)}}{{strlen(strip_tags($post->body))>250?"...":""}}</p>
        <a href="{{Route('blog.single',$post->slug)}}" class="btn btn-default ">Read more</a>
    <hr>
    </div>
</div>
@endforeach

@endsection