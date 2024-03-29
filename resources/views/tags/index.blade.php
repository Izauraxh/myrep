@extends('main')
@section('title','| Tags')
@section('content')
     <div class="row">
        <div class="col-md-8">
          <h1 style="text-align:center"> Tags</h1>
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
           </thead>
            <tbody>
              @foreach($tags as $tag)
                 <tr>
                    <td>{{$tag->id}}</td>
                    <td><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></td>
                 </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--end of col md 8-->
             <div class="col-md-3">
                <div class="well">
                    {!!Form::open(['route'=>'tags.store','method'=>'POST'])!!}
                    <h2 >New Tag</h2>
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Create new Tag',['class'=>'btn btn-primary btn-block'])}}

                    {!!Form::close()!!}
                </div>
             </div>

     </div>


@endsection