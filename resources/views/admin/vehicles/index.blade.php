<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Vehicle management</h1>
        <a href="{{ route('admin.vehicles.create') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Add new</a>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
    @endif

    <x-ui.table class="w-full">
        <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
            <tr>
                <th class="px-4 py-3">Vehicle name</th>
                <th class="px-4 py-3">License plate</th>
                <th class="px-4 py-3">Seats</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($vehicles as $vehicle)
                <tr>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $vehicle->name }}</td>
                    <td class="px-4 py-3">{{ $vehicle->license_plate }}</td>
                    <td class="px-4 py-3">{{ $vehicle->seats }}</td>
                    <td class="px-4 py-3">
                        <x-ui.badge :color="$vehicle->status === 'active' ? 'green' : ($vehicle->status === 'maintenance' ? 'yellow' : 'gray')">{{ ucfirst($vehicle->status) }}</x-ui.badge>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="text-primary hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.vehicles.destroy', $vehicle) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this vehicle?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table>

    <div class="mt-6">
        {{ $vehicles->links() }}
    </div>
</x-admin-layout>
