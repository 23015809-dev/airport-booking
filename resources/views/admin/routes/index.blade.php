<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Route management</h1>
        <a href="{{ route('admin.routes.create') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Add new</a>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
    @endif

    <x-ui.table class="w-full">
        <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
            <tr>
                <th class="px-4 py-3">Route name</th>
                <th class="px-4 py-3">Pickup point</th>
                <th class="px-4 py-3">Dropoff point</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($routes as $route)
                <tr>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $route->name }}</td>
                    <td class="px-4 py-3">{{ $route->pickup_point }}</td>
                    <td class="px-4 py-3">{{ $route->dropoff_point }}</td>
                    <td class="px-4 py-3">{{ number_format($route->price) }} VND</td>
                    <td class="px-4 py-3">
                        <x-ui.badge :color="$route->status === 'active' ? 'green' : 'gray'">{{ ucfirst($route->status) }}</x-ui.badge>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.routes.edit', $route) }}" class="text-primary hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.routes.destroy', $route) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this route?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table>

    <div class="mt-6">
        {{ $routes->links() }}
    </div>
</x-admin-layout>
