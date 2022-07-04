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
              <a href="{{route('post.show',['post'=>$post->id])}}">
                <svg width='27' height='30' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M528.3 46.5H388.5c-48.1 0-89.9 33.3-100.4 80.3-10.6-47-52.3-80.3-100.4-80.3H48c-26.5 0-48 21.5-48 48v245.8c0 26.5 21.5 48 48 48h89.7c102.2 0 132.7 24.4 147.3 75 .7 2.8 5.2 2.8 6 0 14.7-50.6 45.2-75 147.3-75H528c26.5 0 48-21.5 48-48V94.6c0-26.4-21.3-47.9-47.7-48.1zM242 311.9c0 1.9-1.5 3.5-3.5 3.5H78.2c-1.9 0-3.5-1.5-3.5-3.5V289c0-1.9 1.5-3.5 3.5-3.5h160.4c1.9 0 3.5 1.5 3.5 3.5v22.9zm0-60.9c0 1.9-1.5 3.5-3.5 3.5H78.2c-1.9 0-3.5-1.5-3.5-3.5v-22.9c0-1.9 1.5-3.5 3.5-3.5h160.4c1.9 0 3.5 1.5 3.5 3.5V251zm0-60.9c0 1.9-1.5 3.5-3.5 3.5H78.2c-1.9 0-3.5-1.5-3.5-3.5v-22.9c0-1.9 1.5-3.5 3.5-3.5h160.4c1.9 0 3.5 1.5 3.5 3.5v22.9zm259.3 121.7c0 1.9-1.5 3.5-3.5 3.5H337.5c-1.9 0-3.5-1.5-3.5-3.5v-22.9c0-1.9 1.5-3.5 3.5-3.5h160.4c1.9 0 3.5 1.5 3.5 3.5v22.9zm0-60.9c0 1.9-1.5 3.5-3.5 3.5H337.5c-1.9 0-3.5-1.5-3.5-3.5V228c0-1.9 1.5-3.5 3.5-3.5h160.4c1.9 0 3.5 1.5 3.5 3.5v22.9zm0-60.9c0 1.9-1.5 3.5-3.5 3.5H337.5c-1.9 0-3.5-1.5-3.5-3.5v-22.8c0-1.9 1.5-3.5 3.5-3.5h160.4c1.9 0 3.5 1.5 3.5 3.5V190z"/></svg>
              </a>
            </li>
            <li class="pr-4 font-md">{{$post->counts}} views</li>
            <li class="hover:text-gray-700 pr-4 flex">
              <svg xmlns="http://www.w3.org/2000/svg" fill='yellow' width='25' height='25' viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>
              <span class="px-4">{{round($post->ratings->average('stars_rated'),2) ?? '0'}}</span>
            </li>
            @if($post->user_id==$authUser)
            <li class="hover:text-gray-700 pr-4">
            <a href="{{route('post.edit',['post'=>$post->id])}}" class="underline text-red-600">
              Edit
            </a>
            </li>
            <li class="hover:text-gray-700 pr-4">
              <a href="{{route('post.delete',['post'=>$post->id])}}" class="underline text-red-600">
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
