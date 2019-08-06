@extends('main')
@section('title','| Blog')
@section('content')
<div class="container">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="1s.jpg" alt="Los Angeles" style="width:100%;height:350px;">
      </div>

      <div class="item">
        <img src="2s.jpg" alt="Chicago" style="width:100%;height:350px;">
      </div>
    
      <div class="item">
        <img src="3s.jpg" alt="New york" style="width:100%;height:350px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Blog</h1>
    </div>
</div>
@foreach ($posts as $post)
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
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            {!!$posts->links()!!}
        </div>

    </div>
</div>



@endsection