<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
     // Get all customers
    public function index()
    {
        return response()->json(Customers::all());
    }

    // Get single customer
    public function show($id)
    {
        $customer = Customers::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        return response()->json($customer);
    }

    // Create new customer
    public function store(Request $request)
    {
        $customer = Customers::create($request->all());
        return response()->json($customer, 201);
    }

    // Update customer
    public function update(Request $request, $id)
    {
        $customer = Customers::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $customer->update($request->all());
        return response()->json($customer);
    }

    // Delete customer
    public function destroy($id)
    {
        $customer = Customers::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
