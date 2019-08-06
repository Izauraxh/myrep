@extends('main')
@section('title','|Show')
@section('content')
<div class="row">
    <div class="col-md-8">
    <img src="{{asset('images/'.$post->image)}}" class="img-size">
        <h1>{{$post->title}}</h1>
        <p class="lead">{!!$post->body!!}</p>
        <div class="tags">
       <h4> @foreach($post->tags as $tag)
        <span class="label label-info">{{$tag->name}}</span>
        @endforeach</h4>
</div>
   <div id="backend comments" style="margin-top:50px;">
          <h3>Comments <small>{{$post->comments()->count()}} total <small></h3>
          <table class="table">
                <thead> 
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>
                           <a href="{{ route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary"> <span class="glyphicon glyphicon-pencil"></span></a>
                           <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-xs btn-danger"> <span class="glyphicon glyphicon-trash"></span></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
              
          </table>
   </div>
    </div>
    
    <div class="col-md-4">
        <div class="well well-lg">
        <dl class="dl">
        <dt>Url:</dt>
                 <dd><a href="{{url('blog/'.$post->slug)}}">{{url('blog/'.$post->slug)}}</a></dd>
             </dl>
             <dt>Category:</dt>
                 <dd>{{$post->category->name}}</dd>
             </dl>
             <br>
            <dl class="dl">
                 <dt>Created at:</dt>
                 <dd>{{date('M j, Y H:i',strtotime($post->created_at))}}</dd>
             </dl>
             <dl class="dl">
                 <dt>Last Updated:</dt>
                 <dd>{{date('M j, Y H:i',strtotime($post->updated_at))}}</dd>
             </dl>

         <hr>
               <div class="row">
                 <div class="col-sm-6">
                 {!!Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block'))!!}
                  
                     </div>
                 <div class="col-sm-6">
                      {!!Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
                         {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                     {!!Form::close()!!}
                     </div>
               </div>
               <div class="row">
                      <div class=col-md-12>
                       {{Html::linkRoute('posts.index','<< See all posts',[],['class'=>'btn btn-default btn-block btn-h1-spacing'])}}
                      </div>
               </div>
        </div>
    </div>
</div>
@endsection