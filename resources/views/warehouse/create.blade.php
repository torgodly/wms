<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Warehouse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    //create store form for warehouse
                    <form action="{{ route('warehouse.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="name">Name</label>
                                <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                       id="name" name="name" type="text" placeholder="Warehouse Name">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="address">Address</label>
                                <input class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                       id="address" name="address" type="text" placeholder="Warehouse Address">
                            </div>
                            <div class="mb-4">
                                <label class="font-bold text-gray-800" for="address">phone</label>
                                <input
                                    class="border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"
                                    id="phone" name="phone" type="text" placeholder="Warehouse phone">
                            </div>
                            <div class="mb-4">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>



                </div>

            </div>

        </div>
    </div>

</x-app-layout>
