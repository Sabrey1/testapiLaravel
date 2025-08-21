<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    // Get all invoice details
    public function index()
    {
        return response()->json(InvoiceDetail::with(['invoice', 'menu'])->get());
    }

    // Get single invoice detail
    public function show($id)
    {
        $detail = InvoiceDetail::with(['invoice', 'menu'])->find($id);
        if (!$detail) {
            return response()->json(['message' => 'Invoice detail not found'], 404);
        }
        return response()->json($detail);
    }

    // Create new invoice detail
    public function store(Request $request)
    {
        $detail = InvoiceDetail::create($request->all());
        return response()->json($detail, 201);
    }

    // Update invoice detail
    public function update(Request $request, $id)
    {
        $detail = InvoiceDetail::find($id);
        if (!$detail) {
            return response()->json(['message' => 'Invoice detail not found'], 404);
        }
        $detail->update($request->all());
        return response()->json($detail);
    }

    // Delete invoice detail
    public function destroy($id)
    {
        $detail = InvoiceDetail::find($id);
        if (!$detail) {
            return response()->json(['message' => 'Invoice detail not found'], 404);
        }
        $detail->delete();
        return response()->json(['message' => 'Invoice detail deleted successfully']);
    }
}
