<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Driver management</h1>
        <a href="{{ route('admin.drivers.create') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Add new</a>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
    @endif

    <x-ui.table class="w-full">
        <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
            <tr>
                <th class="px-4 py-3">Driver name</th>
                <th class="px-4 py-3">Phone number</th>
                <th class="px-4 py-3">License ID</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($drivers as $driver)
                <tr>
                    <td class="px-4 py-3 font-medium text-gray-800">{{ $driver->name }}</td>
                    <td class="px-4 py-3">{{ $driver->phone }}</td>
                    <td class="px-4 py-3">{{ $driver->license_number }}</td>
                    <td class="px-4 py-3">
                        <x-ui.badge :color="$driver->status === 'active' ? 'green' : 'gray'">{{ ucfirst($driver->status) }}</x-ui.badge>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <a href="{{ route('admin.drivers.edit', $driver) }}" class="text-primary hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.drivers.destroy', $driver) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Delete this driver?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table>

    <div class="mt-6">
        {{ $drivers->links() }}
    </div>
</x-admin-layout>
