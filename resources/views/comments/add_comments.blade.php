<x-app-layout>
    @if (Session::has('status'))
        <div class=" text-red-600 text-md px-4 py-3" role="alert">
            <p>{{ Session('status') }}</p>
        </div>
    @endif
    <!-- component -->
@if(!$post)
<div class="text-red-600 text-center text-4xl pt-8">No Posts</div>
@else
<div class="py-2 px-4 flex flex-col mb-2 max-w-md">
    <div class="bg-white rounded-lg w-1/2 justify-center sm:justify-start items-center sm:items-start sm:flex-row space-x-2 p-8  ">
      <div class="px-4">
        <div class="top-section flex flex-col sm:flex-row  space-x-6 text-center sm:text-left">
          <h2 class="font-bold text-xl pt-2 ">{{$post->user->name}}</h2>
          <h3 class="text-gray-400">
            {{$post->user->email}} <span>{{$post->created_at->format('d M')}}</span>
          </h3>
        </div>

        <div class="mb-5 text-md text-gray-600 font-semibold text-justify sm:text-left">
          <h1 class="font-bold text-xl ">{{$post->title}}</h1>
          <p>
            {{$post->body}}
          </p>
        </div>
      </div>    
    </div>
  </div>
  @endif
</x-app-layout>