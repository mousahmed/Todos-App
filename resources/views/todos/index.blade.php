@extends('layouts.app')
@section('title')
<title>Todos - List</title>
@endsection
@section('content')
<h1 class="text-center my-5">Todos Page</h1>
<div class="row justify-content-center">

    <div class="card card-default">
        <div class="card-header">
            Todos
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">View</th>
                    <th scope="col">Completed</th>

                </tr>
                </thead>
                <tbody>
                @if($records)
                    @foreach($records as $record)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$record->name}}</td>
                            <td><a href="{{route('todos.show',$record->id)}}" class="btn btn-primary">view</a></td>
                            <td>{{$record->completed}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="row justify-content-center">
                {{$records->render()}}
            </div>
        </div>

    </div>

</div>
@endsection
