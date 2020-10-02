<div>
    <div>
        <div class="grid grid-cols-1 place-items-start font-bold text-xl pt-2 pb-2">
            <div>
                <span class="text-purple-800 text-base">{{ __("SKU") }}:</span>
                <span class="text-base">{{ $product->sku }}</span>
                @if($product->is_sold)
                    <p class="text-purple-800 text-base">
                        {{__("Status")}}: <span class="bg-red-300 rounded px-3 py-1 text-sm font-semibold text-gray-700 text-center">
                        {{ __("Sold") }}
                    </span>
                    </p>
                @endif
            </div>
        </div>
        <img class="object-cover object-center bg-gray-400 w-64 h-64 my-5"
             src="{{ get_s3_image($product->image) }}"
             alt="{{ $product->sku }}"
             title="{{ $product->sku }}">
        <p class="text-purple-800 text-base">
            <strong>{{ __("Description") }}:</strong> <span class="text-gray-800">{{ $product->description }}</span>
        </p>
        <p class="text-purple-800 text-base">
            <strong>{{ __("Brand") }}:</strong> <span class="text-gray-800">{{ $product->brand->name }}</span>
        </p>
        <p class="text-purple-800 text-base">
            <strong>{{ __("Price") }}:</strong> <span class="text-gray-800">${{ $product->price }}</span>
        </p>
        <p class="text-purple-800 text-base">
            <strong>{{ __("Color") }}:</strong> <span class="text-gray-800">{{ __($product->color->name) }}</span>
        </p>
        <p class="text-purple-800 text-base">
            <strong>{{ __("Size") }}:</strong> <span class="text-gray-800">{{ $product->size->name }}</span>
        </p>
        <p class="text-purple-800 text-base">
            <strong>{{ __("Category") }}:</strong>
            <span class="inline-block bg-green-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                {{ $product->brand->category->name }}
            </span>
        </p>

        <button class="flex-3 bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded m-2 inline-flex items-center"
                wire:click="redirectToProducts">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
            </svg>
            {{ __("Back") }}
        </button>

        <button class="modal-open bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded m-2 inline-flex items-center"
                data-toggle="modal"
                data-target="#deleteModal">
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <span>{{ __("Delete") }}</span>
        </button>
    </div>
</div>

@livewire('delete-modal', ['title' => 'Delete Product', 'content' => 'Are you sure you want to delete the product?', 'objectId' => $product->id])
