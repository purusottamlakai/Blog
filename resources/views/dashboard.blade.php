<x-app-layout>
    @if (Session::has('status'))
        <div class=" text-red-600 text-md px-4 py-3" role="alert">
            <p>{{ Session('status') }}</p>
        </div>
    @endif
    <!-- component -->
@forelse($posts as $post)
<div class="py-2 px-4 flex flex-col mb-2 max-w-md">
    <div class="bg-white rounded-lg w-1/2 justify-center sm:justify-start items-center sm:items-start sm:flex-row space-x-2 p-8  ">
      <div class="px-4">
        <div class="top-section flex flex-col sm:flex-row  space-x-6 text-center sm:text-left">
          <h2 class="font-bold text-xl pt-2 ">{{$post->user->name}}</h2>
          <h3 class="text-gray-400">
            {{$post->user->email}} <span>{{$post->created_at->format('d M')}}</span>
          </h3>
        </div>
        <div class="text-md text-gray-600 font-semibold text-justify sm:text-left">
          <h1 class="font-bold text-xl ">{{$post->title}}</h1>
          <p>
            {{$post->body}}
          </p>
        </div>
        <div class="social-media mb-5">
          <ul class="flex">
            <li class="hover:text-gray-700 pr-4">
              <a href="{{route('post.show',['post_id'=>$post->id])}}">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                  />
                </svg>
              </a>
            </li>
            <li class="pr-4 font-md">{{$post->counts}} views</li>
            @if($post->user_id==$authUser)
            <li class="hover:text-gray-700 pr-4">
            <a href="{{route('post.edit',['post_id'=>$post->id])}}" class="underline text-red-600">
              Edit
            </a>
            </li>
            <li class="hover:text-gray-700 pr-4">
              <a href="{{route('post.delete',['post_id'=>$post->id])}}" class="underline text-red-600">
                Delete
              </a>
            </li>
            @endif
          </ul>
        </div>
      </div>    
    </div>
  </div>
@empty
<div class="text-red-600 text-center text-4xl pt-8">No Posts</div>
@endforelse
{{$posts->links()}}
</x-app-layout>
