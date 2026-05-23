<x-admin-layout>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Update vehicle</h1>

    <x-ui.card>
        <form method="POST" action="{{ route('admin.vehicles.update', $vehicle) }}" enctype="multipart/form-data" class="grid gap-4">
            @csrf
            @method('PUT')
            <x-ui.input name="name" label="Vehicle name" value="{{ $vehicle->name }}" />
            <x-ui.input name="license_plate" label="License plate" value="{{ $vehicle->license_plate }}" />
            <x-ui.input name="seats" type="number" label="Seats" value="{{ $vehicle->seats }}" />

            @if($vehicle->image)
                <div class="text-sm text-gray-500">Current image:</div>
                <img src="{{ asset('storage/' . $vehicle->image) }}" alt="{{ $vehicle->name }}" class="h-40 w-full object-cover rounded-xl">
            @endif
            <x-ui.input name="image" type="file" label="Update image" />

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Status</span>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                    <option value="active" @selected($vehicle->status === 'active')>active</option>
                    <option value="inactive" @selected($vehicle->status === 'inactive')>inactive</option>
                    <option value="maintenance" @selected($vehicle->status === 'maintenance')>maintenance</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </label>

            <div class="flex justify-end">
                <x-ui.button type="submit" variant="primary">Update</x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-admin-layout>
