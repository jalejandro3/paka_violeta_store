<div>
    <div class="w-full sm:max-w-full bg-white shadow-md overflow-hidden sm:rounded-lg bg-gray-100">
        <div class="flex flex-col sm:flex-row items-center text-center">
            <div class="flex flex-auto flex-shrink-0 mb-5 sm:mb-0">
                <div class="relative mt-5 sm:m-auto w-auto">
                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                        <svg class="fill-current pointer-events-none text-gray-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
                    </div>
                    <input id="product_search"
                           class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block appearance-none leading-normal pr-4 pl-10"
                           type="text"
                           placeholder="{{ __("Search product") }}"
                           wire:model="search">
                </div>
            </div>
            <div class="flex flex-auto">
                <button class="bg-purple-600 hover:bg-purple-800 text-white font-bold w-full sm:w-auto py-2 px-4 mb-5 sm:m-auto rounded m-2 inline-flex items-center"
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
        </div>
    </div>


    @if(count($products->items()) > 0)
    <div class="grid grid-cols-3 place-items-auto">
        @foreach($products as $product)
            <div class="m-2 max-w-xs rounded overflow-hidden shadow-lg">
                <button wire:click="redirectToProductDetail({{ $product->id }})">
                    <img class="w-64 h-64 rounded-lg"
                         src="{{ get_s3_image($product->image) }}"
                         alt="{{ $product->sku }}"
                         title="{{ $product->sku }}">
                </button>
                <div class="px-6 py-4 bg-gray-200 h-full">
                    <div class="grid grid-cols-2 place-items-auto font-bold text-xl pt-2 pb-2">
                        <div>
                            <span class="text-purple-800 text-sm">{{ __("SKU") }}:</span>
                            <span class="text-sm">{{ $product->sku }}</span>
                        </div>
                    </div>
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
                    <div class="text-center">
                        @if(! $product->is_sold)
                            <button class="bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded m-2"
                                    wire:click="checkAsSold({{ $product }})">
                                {{ __("Check as sold") }}
                            </button>
                        @else
                            <div class="bg-red-500 text-white font-bold py-2 px-4 rounded m-2">
                                {{ __("Sold") }}
                            </div>
                        @endif
                    </div>
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
