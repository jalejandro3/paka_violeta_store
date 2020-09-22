<div>
    <div class="mb-4 flex">
        <input id="product_search"
               class="flex-1 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 m-2 block appearance-none leading-normal"
               type="text"
               placeholder="{{ __("Search product") }}"
               wire:model="searchTerm"
               wire:keyup="filterProduct()">
        <button class="flex-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2 inline-flex items-center"
                wire:click="redirectToProductForm">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>
            {{ __("Add Product") }}
        </button>
    </div>

    <div class="grid grid-cols-3 place-items-auto">
        @forelse($products as $product)
            <div class="m-2 max-w-xs rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="{{ $product->sku }}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl text-center mb-2">{{ $product->sku }}</div>
                    <p class="text-gray-700 text-base">
                        <strong>{{ __("Description") }}:</strong> {{ $product->description }}
                    </p>
                    <p class="text-gray-700 text-base">
                        <strong>{{ __("Price") }}:</strong> {{ $product->price }}
                    </p>
                    <p class="text-gray-700 text-base">
                        <strong>{{ __("Color") }}:</strong> {{ $product->color->name }}
                    </p>
                    <p class="text-gray-700 text-base">
                        <strong>{{ __("Size") }}:</strong> {{ $product->size }}
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center">
                <h1>{{ __("There are not products.") }}</h1>
            </div>
        @endforelse
    </div>
</div>
