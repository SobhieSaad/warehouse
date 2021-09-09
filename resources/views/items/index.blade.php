<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Items List
        </h2>

    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            @can('user_access')
            <div class="block mb-8">
                <a href="{{ route('items.create') }}" class="btn btn-success bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Item</a>
            </div>
            @endcan
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-condensed min-w-full divide-y divide-gray-200 w-full"
                            style="border-collapse:collapse;">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Manufacturer
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Expiry date
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->id }}
                                        </td>

                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->manufacturer }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->expiry_date }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm text-gray-900">
                                            {{ $item->image }}
                                        </td>
                                        <td class="px-6 py-1 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('items.show', $item->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                            <a href="{{ route('items.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            @can('user_access')
                                            <form class="inline-block" action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>
                                                <a class="btn btn-primary hover:text-indigo-900 mb-1 mr-1" href="../units?item_id={{$item->id}}" >Item's units</a>

                                            @endcan
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function showUnits(event){
     $.post('/units/search/' + event,function (response){
         console.log(response)
     })
    }
</script>
