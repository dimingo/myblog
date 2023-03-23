<x-dropdown>
    <x-slot name="activator">
        <button class="inline-flex text-left appearance-none bg-transparent  w-32 py-2 pl-3  text-sm font-semibold capitalize">

            {{ isset($currentCategory) ? $currentCategory->name : 'Categories'}}
            <svg class="absolute transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </button>
    </x-slot>
    <x-dropdown-item href="/?{{http_build_query(request()->except('category', 'page'))}}" :active="request()->routeIs('home')">All</x-dropdown-item>
    @foreach($categories as $category)
    <x-dropdown-item href="?category={{$category->slug}}&{{ http_build_query(request()->except('category', 'page')) }}" :active='request()->is("categories/{$category->slug}")'>{{ ucwords($category->name)}}</x-dropdown-item>
    @endforeach
</x-dropdown> 
