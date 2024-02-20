@extends('layouts/app')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}
    @endforeach
</ul>
</div>
@endif
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
{!! Form::open(['url' => 'students', 'method' => 'POST']) !!}
  <div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
  <div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">age</label>
    {!!Form::number('age',null,['class'=>'form-control'])!!}
    </div>
  <div class="form-group mb-3">
    <label for="exampleInputEmail1" class="form-label">track id</label>
    {!!Form::number('tid',null,['class'=>'form-control'])!!}
    </div>
  <button type="submit" class="btn btn-primary">create</button>
{!! Form::close() !!}
   
@endsection