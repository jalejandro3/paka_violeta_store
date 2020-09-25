<div>
    <div class="mb-4 flex">
        <input id="product_search"
               class="flex-1 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 m-2 block appearance-none leading-normal"
               type="text"
               placeholder="{{ __("Search product") }}"
               wire:model="search">
        <button class="flex-3 bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded m-2 inline-flex items-center"
                wire:click="redirectToProductForm">
            <svg class="fill-current w-4 h-4 mr-2"
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>
            {{ __("Add Product") }}
        </button>
    </div>

    @if(count($products->items()) > 0)
    <div class="grid grid-cols-3 place-items-auto">
        @foreach($products as $product)
            <div class="m-2 max-w-xs rounded overflow-hidden shadow-lg">
                <button wire:click="redirectToProductDetail({{ $product->id }})">
                    <img class="w-64 h-64 object-cover"
                         src="{{ asset("images/{$product->image}") }}"
                         alt="{{ $product->sku }}"
                         title="{{ $product->sku }}">
                </button>
                <div class="px-6 py-4 bg-gray-200 h-full">
                    <div class="grid grid-cols-2 place-items-auto font-bold text-xl pt-2 pb-2">
                        <div>
                            <span class="text-purple-800 text-sm">{{ __("SKU") }}:</span>
                            <span class="text-sm">{{ $product->sku }}</span>
                        </div>
                        @if($product->is_sold)
                            <span class="bg-red-300 rounded px-3 py-1 text-sm font-semibold text-gray-700 text-center">
                                {{ __("Sold") }}
                            </span>
                        @endif
                    </div>
                    <p class="text-purple-800 text-base">
                        <strong>{{ __("Price") }}:</strong> <span class="text-gray-800">${{ $product->price }}</span>
                    </p>
                    <p class="text-purple-800 text-base">
                        <strong>{{ __("Color") }}:</strong> <span class="text-gray-800">{{ __($product->color) }}</span>
                    </p>
                    <p class="text-purple-800 text-base">
                        <strong>{{ __("Size") }}:</strong> <span class="text-gray-800">{{ $product->size }}</span>
                    </p>
                    <p class="text-purple-800 text-base">
                        <strong>{{ __("Categories") }}:</strong>
                        <span class="inline-block bg-green-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            <a href="#">{{ __("Pants") }}</a>
                        </span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $products->links() }}
    </div>
    @else
        <div class="text-center">
            <p>{{ __("There are not products.") }}</p>
        </div>
    @endif
</div>
