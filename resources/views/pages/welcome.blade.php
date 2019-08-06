@extends("main")
@section('title','| Homepage')
@section('stylesheets')
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://xcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@section('content')
<br>

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
        <img src="3.jpg" alt="Los Angeles" style="width:100%;height:350px;">
      </div>

      <div class="item">
        <img src="22.jpg" alt="Chicago" style="width:100%;height:350px;">
      </div>
    
      <div class="item">
        <img src="2.jpg" alt="New york" style="width:100%;height:350px">
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
 <div class="col-md-8 col-md-offsett-2">
 @foreach($posts as $post)
  <div class="post">
      <h3>{{$post->title}}</h3>
      <p>{{substr(strip_tags($post->body),0,300)}}{{strlen(strip_tags($post->body))>300?"...":""}}</p>
      <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read more </a>
      <hr>
</div><!--end of post-->
 @endforeach
</div><!--end of col-->

 <div class="col-md-3 col-md-offset-1">
                <h2>MUSIC BLOG</h2>
                <div>

                     <h3> Music Blog has {{$post->count()}} Posts</h3>
                </div>
                <div>
                  <h3>Categories</h3>
                  <ul class="list-group">
                   @foreach($categories as $category) 
                  <li class="list-group-item"> <a href="{{ route('categories.show',$category->id)}}" class="list">{{$category->name}}</a><span class="badge">{{$category->posts()->count()}}</span></li>
                       @endforeach
                     </ul>
                </div>
                <div >
                  <h3>New Releases</h3>
                  <iframe width="262" height="250" src="https://www.youtube.com/embed/mvSItvjFE1c?rel=0"
                   frameborder="0"  allow="autoplay; encrypted-media" allowfullscreen></iframe>
                 <iframe width="262" height="250" src="https://www.youtube.com/embed/F1B9Fk_SgI0?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
 </div>
 </div><!--end of row-->
 
@stop