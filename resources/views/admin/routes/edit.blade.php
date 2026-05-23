<x-admin-layout>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Update route</h1>

    <x-ui.card>
        <form method="POST" action="{{ route('admin.routes.update', $route) }}" enctype="multipart/form-data" class="grid gap-4">
            @csrf
            @method('PUT')
            <x-ui.input name="name" label="Route name" value="{{ $route->name }}" />
            <x-ui.input name="pickup_point" label="Pickup point" value="{{ $route->pickup_point }}" />
            <x-ui.input name="dropoff_point" label="Dropoff point" value="{{ $route->dropoff_point }}" />
            <x-ui.input name="price" type="number" label="Price" value="{{ $route->price }}" />
            <x-ui.input name="duration_minutes" type="number" label="Duration (minutes)" value="{{ $route->duration_minutes }}" />

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Description</span>
                <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">{{ old('description', $route->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </label>

            @if($route->image)
                <div class="text-sm text-gray-500">Current image:</div>
                <img src="{{ asset('storage/' . $route->image) }}" alt="{{ $route->name }}" class="h-40 w-full object-cover rounded-xl">
            @endif
            <x-ui.input name="image" type="file" label="Update image" />

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Status</span>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                    <option value="active" @selected($route->status === 'active')>active</option>
                    <option value="inactive" @selected($route->status === 'inactive')>inactive</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </label>

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Vehicle (optional)</span>
                <select name="vehicle_id" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                    <option value="">Not selected</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" @selected($route->vehicle_id === $vehicle->id)>{{ $vehicle->name }}</option>
                    @endforeach
                </select>
                @error('vehicle_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </label>

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Driver (optional)</span>
                <select name="driver_id" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                    <option value="">Not selected</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}" @selected($route->driver_id === $driver->id)>{{ $driver->name }}</option>
                    @endforeach
                </select>
                @error('driver_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </label>

            <div class="flex justify-end">
                <x-ui.button type="submit" variant="primary">Update</x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-admin-layout>
