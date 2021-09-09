<x-app-layout>
    <x-slot name="header">
        <head>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        </head>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Item
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-1 sm:px-2 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" enctype="multipart/form-data" action="{{ route('items.store') }}">
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
                            <label for="manufacturer" class="block font-medium text-sm text-gray-700">Manufacturer</label>
                            <input type="text" name="manufacturer" id="manufacturer" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('manufacturer', '') }}" />
                            @error('manufacturer')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="text" name="quantity" id="quantity" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('quantity', '') }}" />
                            @error('quantity')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-1 bg-white sm:p-6">
                            <label for="expiry_date" class="block font-medium text-sm text-gray-700">Expiry date</label>
                            <input type="date" name="expiry_date" id="expiry_date" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('expiry_date', '') }}" />
                            @error('expiry_date')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="px-4 py-1 bg-white sm:p-6">
                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-12 mb-4 flex items-center" style="padding-left: 20%" >
                                    <img id="preview-image" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                         alt="preview image" style="max-height: 250px;">
                                </div>
                            <!--    <div class="col-xs-12">


                                  <button type="button" class="add-unit inline-flex  items-center px-2 py-2 btn btn-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" data-toggle="modal" data-target="#exampleModal">
                              Add unit
                          </button>


                          </div>    -->
                        <div class="flex align-items-end justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="create-item inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create item
                            </button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                    <div class="modal-body">
                        <div class="shadow overflow-hidden sm:rounded-md">

                            <div class="px-4 py-1 bg-white sm:p-6">
                                <label for="unit_name" class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="unit_name" id="unit_name" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('unit_name', '') }}" required/>
                                @error('unit_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-1 bg-white sm:p-6">
                                <label for="buy_price" class="block font-medium text-sm text-gray-700">Buy price</label>
                                <input type="number" name="buy_price" id="buy_price" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('buy_price', '') }}" required/>
                                @error('buy_price')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-1 bg-white sm:p-6">
                                <label for="sell_price" class="block font-medium text-sm text-gray-700">Sell price</label>
                                <input type="number" name="sell_price" id="sell_price" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('sell_price', '') }}" required/>
                                @error('sell_price')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="save-unit">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

       </div>

    <script type="text/javascript">
        $('#image').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.add-unit').click(function (){
           $('.create-item').removeAttr("disabled");

        });

        $('#close-modal').click(function (){
            $('.create-item').prop("disabled",true);

        });


    </script>
</x-app-layout>
