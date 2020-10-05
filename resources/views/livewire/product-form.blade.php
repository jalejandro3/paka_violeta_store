<div>
    <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4" wire:submit.prevent="createProduct">
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">{{ __("Image") }}</label>
            </div>
            <div class="md:w-2/3">
                @if ($image)
                    <span class="text-sm text-left bg-red-600 hover:bg-red-800 text-white font-bold px-2 rounded m-2 inline-flex items-center"
                            wire:click="$set('image', {{ null }})">X</span>
                    <img class="w-64 h-64" src="{{ $image->temporaryUrl() }}" alt="preview">
                @else
                    <input id="product-image"
                           class="overflow-hidden opacity-0 absolute z:-1"
                           type="file"
                           wire:model="image">
                    <label for="product-image"
                           wire:loading.remove
                           class="bg-purple-600 rounded px-3 py-1 text-sm font-semibold text-white text-center inline-flex items-center">
                        <svg fill="#FFF" viewBox="0 0 24 24" class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                        </svg>
                        {{ __("Load an image") }}
                    </label>
                    @error('image') <span class="text-red-500">{{ $message }}</span> @enderror

                    <div wire:loading
                         wire:target="image">
                        <span class="bg-purple-600 rounded px-3 py-1 text-sm font-semibold text-white text-center">
                            {{ __("Generating preview...") }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="brand">{{ __("Category") }}</label>
            </div>
            <div class="lg:w-2/3">
                <div class="inline-block relative w-64">
                    <select id="category"
                            wire:model="categoryId"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">{{ __("Select a category") }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>
        </div>

        @if($brands)
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="brand">{{ __("Brands") }}</label>
                </div>
                <div class="lg:w-2/3">
                    <div class="inline-block relative w-64">
                        <select id="brand"
                                wire:model="brandId"
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value=null>{{ __("Select a brand") }}</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ __($brand->name) }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                @error('colorId') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        @endif

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="color">{{ __("Color") }}</label>
            </div>
            <div class="lg:w-2/3">
                <div class="inline-block relative w-64">
                    <select id="color"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="colorId">
                        <option value="">{{ __("Select a color") }}</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ __($color->name) }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                @error('colorId') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="size">{{ __("Size") }}</label>
            </div>
            <div class="md:w-2/3">
                <div class="inline-block relative w-64">
                    <select id="size"
                            wire:model="sizeId"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">{{ __("Select a size") }}</option>
                        @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                    @error('sizeId') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="sku">{{ __("SKU") }}</label>
            </div>
            <div class="md:w-2/3">
                <input id="sku"
                       class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block appearance-none leading-normal"
                       type="text"
                       wire:model="sku"
                       disabled>
                @error('sku') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">{{ __("Price") }}</label>
            </div>
            <div class="md:w-2/3">
                <input id="price"
                       class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block appearance-none leading-normal"
                       type="number"
                       wire:model="price">
                @error('price') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">{{ __("Description") }}</label>
            </div>
            <div class="md:w-2/3">
                <textarea class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block appearance-none leading-normal"
                          name="description"
                          id="description"
                          cols="30"
                          rows="10"
                          wire:model="description"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="text-center">
            <button class="flex-3 bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded m-2 inline-flex items-center"
                    wire:click="redirectToProducts">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                {{ __("Back") }}
            </button>

            <button class="bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded inline-flex items-center"
                    type="submit">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
                {{ __("Create Product") }}</button>
        </div>
    </form>
</div>
