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
          <ul class="flex justify-between mr-5 mt-2 ">
            <li class="hover:text-gray-700">
              <a href="{{route('comments.add',['post_id'=>$post->id])}}">
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
            <li class="hover:text-gray-700">
            <a href="{{route('post.edit',['post_id'=>$post->id])}}">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg>
                </a>
            </li>

          </ul>
        </div>
      </div>    
    </div>
  </div>
@empty
<div class="text-red-600 text-center text-4xl pt-8">No Posts</div>
@endforelse
</x-app-layout>
