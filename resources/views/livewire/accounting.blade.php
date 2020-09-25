<div>
    <table class="table-auto w-full">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">{{ __("SKU") }}</th>
            <th class="px-4 py-2">{{ __("Price") }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($soldProducts as $soldProduct)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $soldProduct->id }}</td>
                <td class="border px-4 py-2">{{ $soldProduct->sku }}</td>
                <td class="border px-4 py-2">{{ $soldProduct->price }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center py-4 text-lg italic">{{ __("There are not sold products.") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="text-center">
        <strong>{{ __("Total: ") . $total }}</strong>
    </div>
</div>
