@extends('main')

@section('title','|Create new post')
@section('stylesheet')
{!!Html::style('css/select2.css')!!}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ 
  selector:'textarea' ,
  plugin:'link'
  
        });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1>Create new post</h1>
    <hr>
    {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'','files'=>true)) !!}
    {{ Form::label('title','Title:')}}
    {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
    {{Form::label('slug','Url:')}}
    {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}
    {{Form::label('category_id','Category:')}}
    <select class="form-control" name="category_id">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    {{Form::label('tags','Tag:')}}
    <select class="select2-multi form-control" id="tags" name="tags[]" multiple="multiple"  >
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach    
    </select>
    {{Form::label('featured_image','Image:')}}
    {{Form::file('featured_image')}}
    {{Form::label('body','Post body:')}}
    {{Form::textarea('body',null,array('class'=>'form-control'))}}
    {{Form::submit('Create post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}
    
    
    {!! Form::close() !!}

    </div>
</div>
@section('scripts')
{!!Html::script('js/select2.js')!!}

<script type="text/javascript">
  $('tags').select2();
      
</script>
 
@endsection


  