@extends('layouts.main')
@section('container')

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

<div class="col-lg-4 flex mt-3">
    <form action="{{url('todo')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="task" id="" class="form-control" placeholder="Add your task">
            <button type="submit" class="btn btn-outline-secondary">Add</button>
        </div>
    </form>

    <ul class="list-group">
        @foreach($todos as $todo)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <p style="width: 150px; margin:0;">{{$todo->task}}</p>
            <div class="row">
                <div class="col">
                    <a href="todo/{{$todo->id}}/edit" class="btn btn-warning">Edit</a>
                </div>
                <div class="col">
                    <form action='{{url("todo", $todo->id)}}' method="post">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

</div>


@endsection