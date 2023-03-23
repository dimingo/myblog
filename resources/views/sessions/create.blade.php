<x-layout>
 <div class="w-full max-w-md  m-auto">
     <div>

         <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Log in</h2>

     </div>
     <form class="mt-8 space-y-6" action="/session" method="POST">
         @csrf
         <input type="hidden" name="remember" value="true">
         <div class=" rounded-lg shadow-smborder-solid border-2 border-sky-500 p-6 bg-gray-100">
             
             
             <div class='mt-5'>
                 <label for="email-address" class="block text-sm text-gray-600 capitalize  my-2">Email</label>
                 <input id="email-address" value="{{old('email')}}" name="email" type="email" autocomplete="email" required class="relative block w-full rounded-md border-0 px-2 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                 @error("email")
                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @endError
             </div>

             <div class='mt-5'>
                 <label for="password" class="block text-sm text-gray-600 capitalize my-2">Password</label>
                 <input id="password" name="password" value="{{old('password')}}" type="password" autocomplete="current-password" required class="relative block w-full px-2 rounded-md border-0 py-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                 @error("password")
                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @endError
             </div>

             <div class="my-6">
                 <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                     <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                         <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                             <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                         </svg>
                     </span>
                     Log in
                 </button>
             </div>
             {{-- <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs mt-1">{{$error}}</li>

             @endforeach
             </ul> --}}
         </div>

     </form>
 </div>
</x-layout>