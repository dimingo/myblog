@props(['comment'])
<x-panel>

    <article>
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" width="60" height="60" alt="" class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold ">
                    {{$comment->user->username}}
                </h3>
                <p class="text-xs">Posted <time>{{$comment->created_at->format("F j, Y, g:i a")}}</time></p>
            </header>
            <p>
                {!!$comment->body!!}
            </p>
        </div>
    </article>
</x-panel>
