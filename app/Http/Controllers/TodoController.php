<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|string|in:in progress,completed,cancelled',
        ]);

        $todo = Todo::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'status' => 'sometimes|required|string|in:in progress,completed,cancelled',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->only(['name', 'status']));

        return response()->json($todo);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json(null, 204);
    }

    public function index()
    {
        $todos = Todo::all();
        // return response()->json($todos);
        return TodoResource::collection($todos);
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return new TodoResource($todo);
    }
}
