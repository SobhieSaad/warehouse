<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div style="text-align: center;">
                <p class="font-weight-bold black" >Welcome to Warehouse</p>
                <div class="px-6 py-4">
                    <div class="inline-flex">
                        <div>
                            <a href="/items">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="https://images.assetsdelivery.com/compings_v2/reziart/reziart1706/reziart170600005.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Items</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="inline-flex">
                        @can('user_access')
                        <div>
                            <a href="/users">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="https://static.thenounproject.com/png/17241-200.png" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Users</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
