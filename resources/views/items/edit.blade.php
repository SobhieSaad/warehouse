<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Item
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" enctype="multipart/form-data" action="{{ route('items.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        @if(\Illuminate\Support\Facades\Auth::user()->can('user_access'))
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $item->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="manufacturer" class="block font-medium text-sm text-gray-700">Manufacturer</label>
                            <input type="text" name="manufacturer" id="manufacturer" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('manufacturer', $item->manufacturer) }}" />
                            @error('manufacturer')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        @else
                            <div class="px-4 py-1 bg-white sm:p-6">
                                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="name" id="name" type="text" class="hover:bg-gray-700 rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('name', $item->name) }}" readonly/>
                                @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-1 bg-white sm:p-6">
                                <label for="manufacturer" class="block font-medium text-sm text-gray-700">Manufacturer</label>
                                <input type="text" name="manufacturer" id="manufacturer" type="text" class="hover:bg-gray-700 rounded-md mt-1 block w-full"
                                       value="{{ old('manufacturer', $item->manufacturer) }}" readonly/>
                                @error('manufacturer')
                                @enderror
                            </div>
                        @endif
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="text" name="quantity" id="quantity" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('quantity', $item->quantity) }}" />
                            @error('quantity')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="expiry_date" class="block font-medium text-sm text-gray-700">Expiry date</label>
                            <input type="date" name="expiry_date" id="expiry_date" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('expiry_date', $item->expiry_date) }}" />
                            @error('expiry_date')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                            @if(Auth::user()->can('user_access'))

                                <div class="px-4 py-1 bg-white sm:p-6">
                                <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                                <input type="text" name="image" id="image" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('image', $item->image) }}" />
                                @error('image')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            @else
                                <div class="px-4 py-1 bg-white sm:p-6">
                                    <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                                    <input type="text" name="image" id="image" type="text" class="hover:bg-gray-700 rounded-md shadow-sm mt-1 block w-full"
                                           value="{{ old('image', $item->image) }}" readonly />
                                    @error('image')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
