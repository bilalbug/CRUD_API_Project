<?php

namespace App\Http\Controllers;

use App\Models\custom_user;
use Illuminate\Http\Request;

class CustomUserController extends Controller
{
    public function index()
    {
        return custom_user::all();
    }

    public function store(Request $request)
    {
        $user = custom_user::create($request->all());

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = custom_user::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = custom_user::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = custom_user::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted'], 204);
    }
}