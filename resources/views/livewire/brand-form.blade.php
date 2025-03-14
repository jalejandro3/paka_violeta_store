<div>
    <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4" wire:submit.prevent="createBrand">
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

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="sku">{{ __("Brand name") }}</label>
            </div>
            <div class="md:w-2/3">
                <input id="sku"
                       class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block appearance-none leading-normal"
                       type="text"
                       wire:model="name">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="text-center">
            <button class="flex-3 bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded m-2 inline-flex items-center"
                    wire:click="redirectToBrands">
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
                {{ __("Create Brand") }}</button>
        </div>
    </form>
</div>
