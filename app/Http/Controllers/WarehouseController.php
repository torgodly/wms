<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Auth::user()->warehouses()->OrderByDesc('created_at')->paginate(5);
        return view('warehouse.index', ['warehouses' => $warehouses]);
    }

    public function show(Warehouse $warehouse)
    {
        if (Auth::user()->id !== $warehouse->user_id) {
            abort(403);
        }
        return view('warehouse.show', ['warehouse' => $warehouse]);
    }

    public function create()
    {
        return view('warehouse.create');
    }

    //create store
    public function store(Request $request)
    {
        $warehouse = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Auth::user()->warehouses()->create($warehouse);

        return redirect()->route('warehouses.index');
    }


}