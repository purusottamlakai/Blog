<x-app-layout>
  <div class="flex items-center justify-center p-12">
     <div class="mx-auto w-full max-w-[550px]">
      <h5 class="mt-3 text-center text-2xl font-extrabold text-gray-900">Create a new Post</h5>
        <form action="{{route('post.store')}}" method="POST">
            @csrf
           <div class="mb-5">
              <label
                 for="title"
                 class="mb-3 block text-base font-medium text-[#07074D]"
                 >
              Title
              </label>
               @error('title')
               <div class="text-red-600 text-md">{{ $message }}</div>
               @enderror
              <input
                 type="text"
                 name="title"
                 required
                 placeholder="Enter Post's Title"
                 value="{{old('title')}}"
                 class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                 />
           </div>
           <div class="mb-5">
              <label
                 for="body"
                 class="mb-3 block text-base font-medium text-[#07074D]"
                 >
              Content
              </label>
              @error('body')
              <div class="text-red-600 text-md">{{ $message }}</div>
              @enderror
              <textarea required
                 rows="4"
                 name="body"
                 placeholder="Type your Content"
                 class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                 >{{old('title')}}</textarea>
           </div>
           <div>
              <button
                 class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                 >
              Submit
              </button>
           </div>
        </form>
     </div>
  </div>
</x-app-layout>