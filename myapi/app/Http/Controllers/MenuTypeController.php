<?php

namespace App\Http\Controllers;

use App\Models\MenuType;
use Illuminate\Http\Request;

class MenuTypeController extends Controller
{
    // Get all menu types
    public function index()
    {
        return response()->json(MenuType::with('menus')->get());
    }

    // Get single menu type
    public function show($id)
    {
        $menutype = MenuType::with('menus')->find($id);
        if (!$menutype) {
            return response()->json(['message' => 'Menu type not found'], 404);
        }
        return response()->json($menutype);
    }

    // Create new menu type
    public function store(Request $request)
    {
        $menutype = MenuType::create($request->all());
        return response()->json($menutype, 201);
    }

    // Update menu type
    public function update(Request $request, $id)
    {
        $menutype = MenuType::find($id);
        if (!$menutype) {
            return response()->json(['message' => 'Menu type not found'], 404);
        }
        $menutype->update($request->all());
        return response()->json($menutype);
    }

    // Delete menu type
    public function destroy($id)
    {
        $menutype = MenuType::find($id);
        if (!$menutype) {
            return response()->json(['message' => 'Menu type not found'], 404);
        }
        $menutype->delete();
        return response()->json(['message' => 'Menu type deleted successfully']);
    }
}
