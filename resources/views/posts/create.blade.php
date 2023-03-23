<x-layout>
    <style>
        body {
            background: white !important;
        }

    </style>
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
    <form action="/admin/posts/store" method='POST' enctype="multipart/form-data">
        <div class="editor mx-auto rounded-xl space-y-4 w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            @csrf


            <x-form.input name="title">Title</x-form.input>
            <x-form.input name="slug">Slug</x-form.input>
            <x-form.input name="thumbnail" type="file">Thumbnail</x-form.input>
            <x-form.text-area name="excerpt">Excerpt</x-form.text-area>
            <x-form.text-area name="body" class=" h-60">Body</x-form.text-area>



            <!-- icons -->
            <div class="flex">
                <x-form.label>Category</x-form-label>
                <select name="category_id" id="category" class="p-1 text-sm w-1/3 mx-4 bg-white text-blue-500 border-2 border-gray-400 rounded p-1 w-1/3 mx-4">
                    @php
                    $categories = App\Models\Category::all();
                    @endphp
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ ucwords($category->name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="icons flex text-gray-500 m-2">
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>

            </div>
            <!-- buttons -->
            <div class="buttons flex">
                <div class="btn border border-gray-300 p-1 hover:bg-red-500 hover:text-white px-4  cursor-pointer text-gray-500 ml-auto rounded-full">Cancel</div>
            <x-form.button name="Post" />
            </div>

        </div>
    </form>

</x-layout>
