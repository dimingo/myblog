<x-layout>
    <body style="font-family: Open Sans, sans-serif">
        <section class="px-6 py-8">


            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                    <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                        <img src="{{asset('storage/'.$post->thumbnail )}}" alt="" class="rounded-xl">

                        <p class="mt-4 block text-gray-400 text-xs">
                            Published <time>{{$post->created_at->diffForHumans()}}</time>
                        </p>

                        <div class="flex items-center lg:justify-center text-sm mt-4">
                            <img src="/images/lary-avatar.svg" alt="Lary avatar">
                            <div class="ml-3 text-left">
                                <a href="/?author={{$post->author->username}}">
                                    <h5 class="font-bold">{{$post->author->name}}</h5>
                                </a>
                                <h6>Mascot at Laracasts</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-8">
                        <div class="hidden lg:flex justify-between mb-6">
                            <a href="/" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>

                                Back to Posts
                            </a>

                            <x-category-button :category="$post->category" />
                        </div>

                        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                            {{$post->title}}
                        </h1>

                        <div class="space-y-4 lg:text-lg leading-loose ">
                            {!! $post->body !!} </div>
                    </div>
                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @auth
                        <x-panel>
                            <form method="POST" action='/posts/{{$post->slug}}/comments'>
                                @csrf



                                <header>
                                    <h2 class="flex items-center">
                                        <img src="https://i.pravatar.cc/60" width="60" height="60" alt="" class="rounded-full">
                                        <span class="ml-3"> Want to participate?</span>
                                    </h2>
                                </header>
                                <div class="mt-6">


                                    <textarea name="body" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">

                                    </textarea>
                                    @error('body')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="justify-end flex">
                                    <button type="submit" class="bg-blue-500 text-white p-2 text-sm rounded-xl w-20 mt-4 m-2">Post</button>
                                </div>

                            </form>
                        </x-panel>
                        @else
                        <a href="/login" class="border border-blue-500 space-y-4 shadow-xl hover:bg-white-100 hover:text-gray-300 p-2 rounded-xl text-gray-900">Log in to comment </a>
                        @endauth
                        @foreach($post->comment as $comment)
                        <x-post-comment :comment="$comment" class="bg-gray-100 " />

                        @endforeach


                        <section>
                </article>
            </main>

    </body>

</x-layout>
