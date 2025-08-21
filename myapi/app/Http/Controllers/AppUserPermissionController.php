<?php

namespace App\Http\Controllers;

use App\Models\AppUserPermission;
use Illuminate\Http\Request;

class AppUserPermissionController extends Controller
{
    // Get all permissions
    public function index()
    {
        return response()->json(AppUserPermission::with('user')->get());
    }

    // Get single permission
    public function show($id)
    {
        $permission = AppUserPermission::with('user')->find($id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        return response()->json($permission);
    }

    // Create new permission
    public function store(Request $request)
    {
        $permission = AppUserPermission::create($request->all());
        return response()->json($permission, 201);
    }

    // Update permission
    public function update(Request $request, $id)
    {
        $permission = AppUserPermission::find($id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        $permission->update($request->all());
        return response()->json($permission);
    }

    // Delete permission
    public function destroy($id)
    {
        $permission = AppUserPermission::find($id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        $permission->delete();
        return response()->json(['message' => 'Permission deleted successfully']);
    }
}
