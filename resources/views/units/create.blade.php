<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Unit
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-3 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('units.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="buy_price" class="block font-medium text-sm text-gray-700">Buy price</label>
                            <input type="text" name="buy_price" id="buy_price" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('buy_price', '') }}" />
                            @error('buy_price')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="sell_price" class="block font-medium text-sm text-gray-700">Sell price</label>
                            <input type="text" name="sell_price" id="sell_price" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('sell_price', '') }}" />
                            @error('sell_price')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="item_id" class="block font-medium text-sm text-gray-700">Related Item</label>
                            <input type="text" name="item_id" id="item_id" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('item_id', $item_id) }}" />
                            @error('item_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button name="done" value="done" class="btn-success inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create and done
                            </button>
                            <button name="next" value="next" class="btn-primary inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Save and Add next
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
