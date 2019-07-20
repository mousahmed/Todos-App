<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todo $todos)
    {
        //
        return view('todos.index')->with('todos', $todos->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        Todo::create($request->all());
        Session::flash('success','The todo has been created');
        return redirect(route('todos.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //

        return view('todos.edit', compact('todo'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        Todo::findOrFail($id)->update($request->all());
        Session::flash('success','The todo has been updated');
        return redirect(route('todos.index'));
    }

    public function completed(Todo $todo , Request $request)
    {
        //

        $todo->update($request->all());
        Session::flash('success','The todo has been updated');
        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Todo::findOrFail($id)->delete();
        Session::flash('deleted_todo','The todo has been deleted');
        return redirect(route('todos.index'));
    }
}
