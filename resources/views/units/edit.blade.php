<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Unit
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('units.update', $unit->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $unit->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="buy_price" class="block font-medium text-sm text-gray-700">Buy price</label>
                            <input type="text" name="buy_price" id="buy_price" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('manufacturer', $unit->buy_price) }}" />
                            @error('buy_price')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="sell_price" class="block font-medium text-sm text-gray-700">Sell price</label>
                            <input type="text" name="quantity" id="sell_price" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('sell_price', $unit->sell_price) }}" />
                            @error('sell_price')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
                <div class="block mt-8">
                    <a href="{{ route('units.index','item_id='.$unit->item_id) }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
