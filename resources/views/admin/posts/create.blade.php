@props(['categories'])
<x-app-layout class="static">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a New Post') }}
        </h2>
    </x-slot>

    <div class="py-12 static border-red-300 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--Start Content--}}
                    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                                <input type="text" id="first_name" name="title" value="{{old('title' , request()->title)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="textarea" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                            <textarea type="textarea" id="textarea" name="content" rows="4" class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                {{ old('postContent' , request('content')) }}
                            </textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="thumbnail">Upload file</label>
                            <input  value="{{ old('thumbnail', request()->thumbnail) }}" name="thumbnail" class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="thumbnail" type="file">
                            <p class="my-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG, JPG</p>
                            <x-input-error :messages="$errors->get('thumbnail')" class="my-2" />
                        </div>
                        <div class="mb-6">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                            <select id="countries" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                               <option disabled selected > Click Here ... </option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}"
                                    >
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="my-2" />
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                    </form>

                </div>
            </div>
        </div>
        @if(session('successs'))
            <x-flash class="bg-blue-500 p-2 rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
    </div>
</x-app-layout>
