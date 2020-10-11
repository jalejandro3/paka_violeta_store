<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="max-w-none mx-auto">
            <div class="pb-4">
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
