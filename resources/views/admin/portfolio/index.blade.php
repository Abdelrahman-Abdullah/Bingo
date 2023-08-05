@props(['images' , 'categories'])
{{--@dd($categories);--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Services') }}
        </h2>
        <div class=" inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400" x-data="{create:false}">
            <button class="block" @click="create=!create">Add an Image</button>

            <form action="{{route('admin.createImg')}}"
                  x-show="create"
                  method="POST"
                  enctype="multipart/form-data"
                  class="absolute rounded bg-white shadow-md py-4 right-0 mt-6  flex flex-col sm:justify-start ">
                @csrf
                <div class="flex space-x-4  px-4 ">
                    <input type="file"  name="file" class="w-72 text-black mx-0 w-56 rounded px-2 py-0" required >
                    <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800  ">
                        Add
                    </button>
                </div>
                <div class="w-full">
                    <label>
                        <select name="category" class="w-60 ml-6 mt-4 text-sm text-gray-700">
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option class="text-gray-700 pl-3" value="{{$category['id']}}">
                                    {{ ucwords($category['name'])}}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <div class="px-4">
                        <x-input-error :messages="$errors->get('category')" class="mt-2 block" />
                    </div>
                </div>
                <div class="px-4">
                    <x-input-error :messages="$errors->get('file')" class="mt-2 block" />
                </div>
            </form>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{--! Start Content--}}
                    @foreach($images as $image)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 inline-block my-1">
                            <img class="rounded-t-lg" src="{{asset('images/'.$image->path)}}" alt="" />
                            <div class="p-5">
                                    <h5 class=" uppercase mb-2 text-xl tracking-tight text-gray-900 dark:text-white">
                                       Category : {{$image->category->name}}
                                    </h5>
                                <form method="POST" action="{{route('admin.deleteImg' , $image->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 ">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if(session('deleted'))
            <x-flash class="bg-red-500 py-2  rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
        @if(session('success'))
            <x-flash class="bg-green-500 p-2  rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
    </div>
</x-app-layout>
