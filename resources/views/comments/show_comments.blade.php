<x-app-layout>
    @if (Session::has('status'))
    <div class=" text-red-600 text-md px-4 py-3" role="alert">
        <p>{{ Session('status') }}</p>
    </div>
    @endif
@forelse($comments as $comment)
  <div class="focus:outline-none py-8 w-full">
    <div class="lg:flex items-center justify-center w-full mt-2 max-h-sm">
        <div  class="focus:outline-none lg:w-4/12 lg:mr-7 lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
            <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
            <svg width='30' height='30' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">@fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
                <div class="flex items-start justify-between w-full">
                    <div class="pl-3 w-full">
                        <p class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">{{$comment->user->name}}</p>
                    </div>
                    @if($comment->user_id==$authUser)
                    <div role="img" aria-label="bookmark">
                    <ul class="flex justify-between">
                        <li class="px-4">
                        <a class="hover:bg:red-400" href="{{route('comment.edit',['post_id'=>$comment->post_id,'id'=>$comment->id])}}">
                        <svg  width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"/></svg>
                        </a>
                        </li>
                        <li class="px-4">
                        <a class="hover:bg:red-400" href="{{route('comment.delete',['post_id'=>$comment->post_id,'id'=>$comment->id])}}">
                            <svg  width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/></svg>                        </a>
                        </li>
                    </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="px-2">
                <p class="focus:outline-none text-sm leading-5 py-4 text-gray-600 dark:text-gray-200 ">{{$comment->body}}</p>
            </div>
        </div>
    </div>
</div>
@empty
    <div class="items-center">
        <h1 class="text-red-600">No Comments Yet.</h1>
    </div>
</div>
@endforelse
{{$comments->links()}}
</x-app-layout>