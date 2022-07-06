<x-admin-layout>
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
                       Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Body
                    </th>
                    <th scope="col" class="px-6 py-3">
                        category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $post->title }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->body }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->category->name }}
                    </td>
                    
                    <td class="px-6 py-4 text-right">
                    
                    <a href="{{route('post.delete',['post'=>$post->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                    
                    </td>
                </tr>
                @endforeach  
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
</x-admin-layout>
