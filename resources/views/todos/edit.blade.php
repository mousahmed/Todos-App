@extends('layouts.app')

@section('title')
    <title>Update a Todo</title>
@endsection

@section('content')
    <h1 class="text-center my-3">Update Todo</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Update Todo</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)

                                    <li class="list-group-item">{{$error}}</li>

                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('todos.update', $todo->id)}}" method="post">
                        @csrf
                        @method('patch')


                        <div class="form-group">
                            <input placeholder="Name" type="text" name="name" value="{{$todo->name}}"
                                   class="form-control" required>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="Description" name="description"
                                      class="form-control" required>{{$todo->description}}</textarea>
                        </div>

                        <button class="btn btn-success">Update Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
