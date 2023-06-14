<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return category::all();
    }

    public function store(Request $request)
    {
        $user = category::create($request->all());

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = category::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = category::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = category::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted'], 204);
    }
}
