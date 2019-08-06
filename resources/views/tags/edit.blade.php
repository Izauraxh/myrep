@extends('main')
@section('title','|Edit Tag')
@section('content')
{{Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>"PUT"])}}
{{Form::label('name','Name:')}}
{{Form::text('name',null,['class'=>'form-control'])}}
<br>
{{Form::submit('Save changes',['class'=>'btn btn-lg btn-primary'])}}
{{Form::close()}}
@endsection