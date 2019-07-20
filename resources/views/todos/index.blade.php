@extends('layouts.app')
@section('title')
    <title>Todos - List</title>
@endsection
@section('content')
    <h1 class="text-center my-3">Todos Page</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Session::has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif

            @if(Session::has('deleted_todo'))
                <div class="alert alert-danger">{{session('deleted_todo')}}</div>
            @endif
            <div class="card card-default">

                <div class="card-header">
                    Todos
                </div>
                <div class="card-body">
                    @if($todos)

                        <ul class="list-group">
                            @foreach($todos->all() as $todo)
                                <li class="list-group-item">

                                    {{$todo->name}}

                                    <a href="{{route('todos.show',$todo->id)}}"
                                       class="btn btn-primary  btn-sm float-right">view</a>
                                    <form class="float-right mr-2" action="todos/{{$todo->id}}/completed" method="post">
                                        @csrf
                                        @if($todo->completed == 0)
                                            <input type="hidden" name="completed" value=1>
                                            <button class="btn btn-warning btn-sm ">Completed</button>
                                        @endif
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="row justify-content-center">
                    {{$todos->render()}}
                </div>
            </div>

        </div>
    </div>
@endsection
