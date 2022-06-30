<x-app-layout>
    @if (Session::has('status'))
    <div class=" text-red-600 text-md px-4 py-3" role="alert">
        <p>{{ Session('status') }}</p>
    </div>
    @endif
     <div class="focus:outline-none py-8 w-full">
       <div class="lg:flex items-center justify-center w-full mt-2 max-h-sm">
           <div  class="focus:outline-none lg:w-4/12 lg:mr-7 lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
               <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
               <svg width='30' height='30' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">@fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
                   <div class="flex items-start justify-between w-full">
                       <div class="pl-3 w-full">
                           <p class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">{{$comment->user->name}}</p>
                       </div>
                   </div>
               </div>
               <div class="px-2">
                  <form action="{{route('comment.update',['post_id'=>$comment->post_id,'id'=>$comment->id])}}" method="post">
                    @csrf
                     @method('put')
                     <label for="comment">Edit Your Comment</label>
                     <textarea class="bg-gray-100 rounded border border-cyan-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" rows="1" name="body" placeholder='Type Your Comment' required>{{$comment->body}}</textarea>
                     <input type='submit' class="font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='submit'>
                  </form>
               </div>
           </div>
       </div>
   </div>
   </div>
   </x-app-layout>