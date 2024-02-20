@extends('layouts/app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">idno</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">update</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
    <tr>
      <th scope="row">{{$student->id}}</th>
      <td> {{$student->id_no}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->age}}</td>
<td>
    <a type="button" class="btn btn-primary" href="{{ url('students/' . $student->id . '/edit') }}">
        update 
    </a>
</td>
<td>
<form action="{{ route('students.delete', $student->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
    </tr>
    @endforeach
  </tbody>
</table>

<a type="button" class="btn btn-success" href="students/create">new</a>



@endsection