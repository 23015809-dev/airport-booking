<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRouteRequest;
use App\Http\Requests\Admin\UpdateRouteRequest;
use App\Models\Driver;
use App\Models\TransferRoute;
use App\Models\Vehicle;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = TransferRoute::latest()->paginate(10);

        return view('admin.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::orderBy('name')->get();
        $drivers = Driver::orderBy('name')->get();

        return view('admin.routes.create', compact('vehicles', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRouteRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        TransferRoute::create($data);

        return redirect()->route('admin.routes.index')->with('success', 'Tao tuyen xe thanh cong.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransferRoute $route)
    {
        return redirect()->route('admin.routes.edit', $route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransferRoute $route)
    {
        $vehicles = Vehicle::orderBy('name')->get();
        $drivers = Driver::orderBy('name')->get();

        return view('admin.routes.edit', compact('route', 'vehicles', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRouteRequest $request, TransferRoute $route)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $route->update($data);

        return redirect()->route('admin.routes.index')->with('success', 'Route updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransferRoute $route)
    {
        $route->delete();

        return redirect()->route('admin.routes.index')->with('success', 'Da xoa tuyen xe.');
    }
}
