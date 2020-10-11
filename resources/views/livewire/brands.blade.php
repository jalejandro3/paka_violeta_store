<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="max-w-none mx-auto">
            <div class="flex flex-col sm:flex-row items-center text-center pb-4">
                <div class="flex flex-shrink-0 mb-5 flex-grow sm:mb-0">
                    <div class="relative mt-5 sm:mt-0 sm:ml-5">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                            <svg class="fill-current pointer-events-none text-gray-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
                        </div>
                        <div class="w-fill-current">
                            <input id="product_search"
                                   class="bg-white focus:outline-none w-64 focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block appearance-none leading-normal pr-4 pl-10"
                                   type="text"
                                   placeholder="{{ __("Search brand") }}"
                                   wire:model="search">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="bg-purple-600 hover:bg-purple-800 text-white font-bold w-full sm:w-auto py-2 px-4 mb-5 sm:m-auto rounded m-2 inline-flex items-center"
                            wire:click="redirectToBrandForm">
                        <svg class="fill-current w-4 h-4 mr-2"
                             xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        {{ __("Add Brand") }}
                    </button>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <ul>
                    @foreach ($brands as $brand)
                        <li>
                            <div class="block transition duration-150 ease-in-out">
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="text-lg leading-5 font-medium text-indigo-600 truncate">
                                            {{ $brand->name }}
                                        </div>
                                        <div class="ml-2 flex-shrink-0 flex">
                                            <div class="mr-6 flex items-center text-sm leading-5 text-gray-500 bg-gray-100 rounded-full">
                                                <strong>{{__("Category")}}</strong>: {{ $brand->category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                    {{ $brands->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
