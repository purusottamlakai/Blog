<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-4 lg:px-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-grey-400">
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class='mt-4'>
                            <label class="block" for="category">Category:<label>                   
                            <div class='mt-4'>
                                <label class="block" for="Category">Category:<label>
                                <input type="text" name="name" value="{{$category->name}}" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>       
                        </div>
                        <div class="flex justify-center">
                            <button
                                class="border-black py-2 mt-4 px-4 bg-indigo-500 font-semibold rounded-lg shadow-md">
                                Submit
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>