<x-admin-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-4 lg:px-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-grey-400">
                    @if (Session::has('status'))
                    <div class=" text-red-600 text-md px-4 py-3" role="alert">
                        <p>{{ Session('status') }}</p>
                    </div>
                    @endif
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf    
                        <div class='mt-4'>
                            <label class="block" for="category">Category:<label>                
                            <select>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>                  
                        </div>
                        <div class='mt-4'>
                            <label class="block" for="category">New Category:<label>
                                    <input type="text" name="category_name" 
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
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