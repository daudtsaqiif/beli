<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Product') }}
            </h2>
            <a href="{{ route('product.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($products as $product)
                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($product->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="hidden md:flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$product->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$product->category->name}}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp {{ number_format($product->price ,0,',', '.') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('product.edit', $product) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            edit
                        </a>
                    </div>
                    <form action="{{ route('product.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                            Delete
                        </button>
                    </form>
                </div>
                @empty
                <p class="text-center font-semibold fs-1">Belum ada data product terbaru</p>
                @endforelse


            </div>
        </div>
    </div>
</x-app-layout>
