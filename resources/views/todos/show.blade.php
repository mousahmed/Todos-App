@extends('layouts.app')

@section('title')
    <title>single Todo: {{$todo->name}}</title>
@endsection

@section('content')
    <h1 class="text-center my-5">{{$todo->name}}</h1>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header font-weight-bold">
                    Details
                </div>
                <div class="card-body">
                    {{$todo->description}}
                </div>

            </div>
            <div class="d-flex justify-content-between">
                <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-info mt-2"><i class="fa fa-pencil"></i> Edit</a>

                <form class="" action="{{route('todos.destroy',$todo->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger mt-2"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>

    </div>
@endsection
