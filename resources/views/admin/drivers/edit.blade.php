<x-admin-layout>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Update driver</h1>

    <x-ui.card>
        <form method="POST" action="{{ route('admin.drivers.update', $driver) }}" class="grid gap-4">
            @csrf
            @method('PUT')
            <x-ui.input name="name" label="Driver name" value="{{ $driver->name }}" />
            <x-ui.input name="phone" label="Phone number" value="{{ $driver->phone }}" />
            <x-ui.input name="license_number" label="License number" value="{{ $driver->license_number }}" />

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Status</span>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                    <option value="active" @selected($driver->status === 'active')>active</option>
                    <option value="inactive" @selected($driver->status === 'inactive')>inactive</option>
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
