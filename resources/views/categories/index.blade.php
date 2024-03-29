@extends('main')
@section('title','| Categories')
@section('content')
     <div class="row">
        <div class="col-md-8">
          <h1 style="text-align:center"> Categories</h1>
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
           </thead>
            <tbody>
              @foreach($categories as $category)
                 <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                 </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--end of col md 8-->
             <div class="col-md-3">
                <div class="well">
                    {!!Form::open(['route'=>'categories.store','method'=>'POST'])!!}
                    <h2 >New Category</h2>
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Create new category',['class'=>'btn btn-primary btn-block'])}}

                    {!!Form::close()!!}
                </div>
             </div>

     </div>


@endsection