<x-admin-layout>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Add vehicle</h1>

    <x-ui.card>
        <form method="POST" action="{{ route('admin.vehicles.store') }}" enctype="multipart/form-data" class="grid gap-4">
            @csrf
            <x-ui.input name="name" label="Vehicle name" />
            <x-ui.input name="license_plate" label="License plate" />
            <x-ui.input name="seats" type="number" label="Seats" />
            <x-ui.input name="image" type="file" label="Vehicle image" />

            <label class="block text-sm font-medium text-gray-700">
                <span class="mb-1 inline-block">Status</span>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                    <option value="active" selected>active</option>
                    <option value="inactive">inactive</option>
                    <option value="maintenance">maintenance</option>
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </label>

            <div class="flex justify-end">
                <x-ui.button type="submit" variant="primary">Save vehicle</x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-admin-layout>
