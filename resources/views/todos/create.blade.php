@extends('layouts.app')

@section('title')
    <title>Create a Todo</title>
@endsection

@section('content')
    <h1 class="text-center my-3">Create Todos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create new todos</div>
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
                    <form action="{{route('todos.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="completed" value=0>

                        <div class="form-group">
                            <input placeholder="Name" type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <textarea placeholder="Description" name="description" cols="5" rows="10"
                                      class="form-control" required></textarea>
                        </div>

                        <button class="btn btn-success">Create Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
