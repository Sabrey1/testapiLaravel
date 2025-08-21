<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AppUserController extends Controller
{
    // Get all users
    public function index()
    {
        return response()->json(AppUser::with('permissions')->get());
    }

    // Get single user
    public function show($id)
    {
        $user = AppUser::with('permissions')->find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    // Create new user
    public function store(Request $request)
    {
        $data = $request->all();
        // Hash password before saving
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = AppUser::create($data);
        return response()->json($user, 201);
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = AppUser::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $data = $request->all();
        // Hash password if being updated
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return response()->json($user);
    }

    // Delete user
    public function destroy($id)
    {
        $user = AppUser::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
