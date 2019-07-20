@extends('layouts.app')

@section('title')
    <title>single Todo: {{$todo->name}}</title>
@endsection

@section('content')
    <h1 class="text-center my-5">{{$todo->name}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>

            </div>
            <form class="" action="{{route('todos.destroy',$todo->id)}}" method="post">
            <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-info my-2">Edit</a>
                @csrf
                @method('delete')
                <button  class="btn btn-danger my-2">Delete</button>
            </form>
        </div>

    </div>
@endsection
