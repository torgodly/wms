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
                    <div class="flex justify-between">
                        <div class="flex">
                            <div class="flex flex-col">
                                <div class="text-2xl font-bold">{{ $warehouse->name }}</div>
                                <div class="text-sm">{{ $warehouse->address }}</div>
                                <div class="text-sm">{{ $warehouse->phone }}</div>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('warehouses.index') }}"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>


                    </div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 ">
                                    <a href="{{ route('product.create', $warehouse->id) }}"
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</a>
                                    <table class="table-auto w-full">
                                        <thead>
                                        <tr>
                                            <th class="px-4 py-2">Name</th>
                                            <th class="px-4 py-2">Address</th>
                                            <th class="px-4 py-2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                                <td class="border px-4 py-2">{{ $product->code }}</td>
                                                <td class="border px-4 py-2">{{ $product->description }}</td>
                                                <td class="border px-4 py-2">{{ $product->price }}</td>
                                                <td class="border px-4 py-2">
                                                    <a  href="{{route('product.show',['warehouse' => $warehouse->id, 'product' => $product->code])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <form  method="POST" action="{{route('product.destroy',['warehouse' => $warehouse->id, 'product' => $product->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                                    </form>
                                                </td>
                                                <td class="border px-4 py-2">
                                                    <a href="{{route('product.edit', ['warehouse' => $warehouse->id, 'product'=>$product->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    {{ $products->links()}}



                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

</x-app-layout>
