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
           <div class="top-section flex mb-5 flex-col sm:flex-row  space-x-6 text-center sm:text-left">
              <h2 class="font-bold text-2xl text-black pt-2 ">{{$post->user->name}}</h2>
              <h3 class="text-sm font-bold">
                 {{$post->user->email}} <span class="text-red-600">{{$post->created_at->format('d M')}}</span>
              </h3>
           </div>
           <div class="mb-5 text-md text-gray-600 font-semibold text-justify sm:text-left">
              <h1 class="font-bold text-xl py-2">{{$post->title}}</h1>
              <p class="text-sm">
                 {{$post->body}}
              </p>
           </div>
           <div class="max-w-lg">
              <form action="{{route('comment.store',['post_id'=>$post->id])}}" method="POST" class="w-full p-4">
                @csrf
                 <div class="mb-2">
                    <label for="comment" class="text-lg ">Add a comment</label>
                    @error('body')
                    <div class="text-red-600 text-md">{{ $message }}</div>
                    @enderror
                    <textarea class="w-full h-10 p-2 rounded"
                       name="body" placeholder="Type your Comment here.." rows="2" required></textarea>
                 </div>
                 <button class="px-3 py-2 text-md underline">submit</button>
              </form>    
            </div>
            <a class="justify-center underline" href="{{route('comment.show',['post_id'=>$post->id])}}">view comments</a>
        </div>
     </div>
  </div>
  </div>
  @endif
</x-app-layout>