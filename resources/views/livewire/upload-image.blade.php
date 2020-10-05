<div>
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
</div>
