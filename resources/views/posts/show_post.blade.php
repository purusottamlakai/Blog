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
           <form action="{{route('rating.store',['post'=>$post->id])}}" action="POST">
            <div class="block max-w-3xl px-1 py-2 mx-auto">
                <div class="flex space-x-1 rating">
                    <label for="star1">
                        <input  type="radio" id="star1" name="stars_rated" value="1"/>
                        <svg class="cursor-pointer block w-8 h-8" fill="yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </label>
                    <label for="star2">
                        <input  type="radio" id="star2" name="stars_rated" value="2" />
                        <svg class="cursor-pointer block w-8 h-8 " fill="yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </label>
                    <label for="star3">
                        <input  type="radio" id="star3" name="stars_rated" value="3" />
                        <svg class="cursor-pointer block w-8 h-8 " fill="yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </label>
                    <label for="star4">
                        <input  type="radio" id="star4" name="stars_rated" value="4" />
                        <svg class="cursor-pointer block w-8 h-8 " fill="yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </label>
                    <label for="star5">
                        <input  type="radio" id="star5" name="stars_rated" value="5" />
                        <svg class="cursor-pointer block w-8 h-8 " fill="yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </label>
                  </div>
            </div>
            <div class="block">
               @error('stars_rated')
                    <div class="text-red-600 text-md">{{ $message }}</div>
               @enderror
               @if (Session::has('rating'))
               <div class=" text-red-600 text-md px-4 py-3" role="alert">
                  <p>your Rating is {{Session('rating')}}</p>
               </div>
                @endif
                <button type="submit" class="px-2 py-4 font-bold underline text-xl">Rate us</button>
            </div>
          </form>
           <div class="max-w-lg">
              <form action="{{route('comment.store',['post'=>$post->id])}}" method="POST" class="w-full p-4">
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
            @include('comments.show_comments',['authUser'=>$authUser,'posts'=>$post])
         </div>
     </div>
  </div>
  </div>
  @endif
</x-app-layout>