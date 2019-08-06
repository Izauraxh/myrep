@extends('main')
@section('title','|Edit Blog Post')
@section('stylesheet')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ 
  selector:'textarea',
  plugin:'link'
  
        });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@section('content')
{!!Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true])!!}
<div class="row" >
    
    <div class="col-md-8">
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,['class'=>'form-control input-lg'])}}
        {{Form::label('slug','Url:')}}
        {{Form::text('slug',null,['class'=>'form-control input-lg'])}}
        {{Form::label('category_id','Category;')}}
        {{Form::select('category_id',$categories,null,['class'=>'form-control input-lg'])}}
        {{Form::label('tags','Tags')}}
        {{Form::select('tags[]',$tags,null,['class'=>'form-control','multiple'=>'multiple'])}}
        {{Form::label('featured_image','Image:')}}
        {{Form::file('featured_image')}}
        {{Form::label('body','Body:')}}
        {{Form::textarea('body',null,['class'=>'form-control'])}}
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                 <dt>Created at:</dt>
                 <dd>{{date('M j, Y H:i',strtotime($post->created_at))}}</dd>
             </dl>
             <dl class="dl-horizontal">
                 <dt>Last Updated:</dt>
                 <dd>{{date('M j, Y H:i',strtotime($post->updated_at))}}</dd>
             </dl>

         <hr>
               <div class="row">
                 <div class="col-sm-6">
                 {!!Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block'))!!}
                  
                     </div>
                 <div class="col-sm-6">
                 {{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}
                
                     </div>
               </div>
              
        </div>
    </div>

</div>  {!!Form::close()!!}
@endsection
