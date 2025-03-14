<div>
    <table class="table-auto w-full">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">{{ __("User") }}</th>
            <th class="px-4 py-2">{{ __("SKU") }}</th>
            <th class="px-4 py-2">{{ __("Action") }}</th>
            <th class="px-4 py-2 whitespace-no-wrap">{{ __("Old Data") }}</th>
            <th class="px-4 py-2 whitespace-no-wrap">{{ __("New Data") }}</th>
            <th class="px-4 py-2 whitespace-no-wrap">{{ __("Created At") }}</th>
            <th class="px-4 py-2 whitespace-no-wrap">{{ __("Updated At") }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($history as $item)
            <tr class="text-center">
                <td class="border px-4 py-2">
                    <div>{{ $item->user->name }}</div>
                    <div><small>({{ $item->user->email }})</small></div></td>
                <td class="border px-4 py-2 whitespace-no-wrap"><small>{{ __("SKU")}}: {{ $item->sku }}</small></td>
                <td class="border px-4 py-2">{{ __($item->action) }}</td>
                {{-- @todo: Desarrollar información del producto antes y después de la acción, crear metodo en el controller. --}}
                <td class="border px-4 py-2">-</td>
                <td class="border px-4 py-2">-</td>
                <td class="border px-4 py-2 whitespace-no-wrap">{{ $item->created_at }}</td>
                <td class="border px-4 py-2 whitespace-no-wrap">{{ $item->updated_at }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="12" class="py-4 text-lg text-center italic">{{ __("There are not registries.") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
