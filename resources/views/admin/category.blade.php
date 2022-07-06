<x-admin-layout>
    <a class="font-bold py-2 px-4" href="{{route('category.create')}}" style="background-color:blue;color:aliceblue">
        New Category
    </a>
    @if (Session::has('status'))
        <div class=" text-red-600 text-md px-4 py-3" role="alert">
            <p>{{ Session('status') }}</p>
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. of Post
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $category->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->posts->count() }}
                    </td>
                    <td class="px-6 py-4 text-right">
                    <a href="{{route('category.edit',['category'=>$category->id])}}" class="font-bold text-black px-2 underline">Edit</a>
                    <a href="{{route('category.delete',['category'=>$category->id])}}" class="font-bold text-black px-2 underline">Delete</a>
                    </td>
                </tr>
                @endforeach  
            </tbody>
        </table>
    </div>
</x-admin-layout>
    
  