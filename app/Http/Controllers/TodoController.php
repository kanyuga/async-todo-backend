<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoResource;
use Illuminate\Http\Request;

class TodoController extends Controller {

    public function fetch() {
        return TodoResource::collection(Todo::all()->mapWithKeys(function ($item) {
            return [ $item->id => $item];
        }));
    }

    public function get($id) {
        return new TodoResource(Todo::findOrFail($id));
    }

    public function add(Request $request) {
        $this->validate($request, [
            'title' => 'string|required'
        ]);
        $todo = new Todo;
        $todo->fill($request->all());
        $todo->save();
        return new TodoResource($todo);
    }

    public function edit(Request $request, $id) {
        $this->validate($request, [
            'title' => 'string',
            'completed' => 'boolean'
        ]);
        $todo = Todo::findOrFail($id);
        //return $request->all();
        $todo->update($request->all());
        return new TodoResource($todo);
    }

    public function delete($id) {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return ['result' => true];
    }
}