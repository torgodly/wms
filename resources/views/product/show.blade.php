<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prodcut') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="flex justify-between">
                        <div class="flex">
                            <div class="flex flex-col">
                                <div class="text-2xl font-bold">{{ $product->name }}</div>
                                <div class="text-sm">{{ $product->code }}</div>
                                <div class="text-sm">{{ $product->price }}</div>
                                <div class="text-sm">{{ $product->description }}</div>
                            </div>
                        </div>
                        //create back button
                        <div>
                            <a href="{{ route('warehouse.show', $warehouse->id) }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>

                    </div>

                </div>
            </div>

</x-app-layout>
