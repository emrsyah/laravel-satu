@extends('layouts.main')
@section('container')
<div class="col-lg-4">
@if (session('success'))
<div class="alert-success">
    <p>{{session('success')}}</p>
</div>
@endif

@if($errors->any())
<div class="alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{url('todo', $todo->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input type="text" name="task" id="" class="form-control" placeholder="Edit your task">
            <button type="submit" class="btn btn-outline-secondary">Edit</button>
        </div>
    </form>
</div>

@endsection