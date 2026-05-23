<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TransferRoute;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $searchPickup = $request->get('pickup_point');
        $searchDropoff = $request->get('dropoff_point');

        $routes = TransferRoute::where('status', 'active')
            ->when($searchPickup, fn ($query) => $query->where('pickup_point', 'like', "%{$searchPickup}%"))
            ->when($searchDropoff, fn ($query) => $query->where('dropoff_point', 'like', "%{$searchDropoff}%"))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('user.routes.index', compact('routes', 'searchPickup', 'searchDropoff'));
    }

    public function show(TransferRoute $route)
    {
        abort_unless($route->status === 'active', 404);

        return view('user.routes.show', compact('route'));
    }
}
