@props(['categories'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Categories') }}
        </h2>
        <div class=" inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400" x-data="{create:false}">
            <button class="block" @click="create=!create">Create a Category</button>

        <form action="{{route('admin.createCategory')}}"
              x-show="create"
              method="POST"
              class="absolute rounded bg-white shadow-md py-4 right-0 mt-6  flex flex-col sm:justify-start ">
            @csrf
            <div class="flex space-x-4  px-4 ">
                <input type="text"  name="name" class="text-black mx-0 w-56 rounded px-2 py-0" required placeholder="Enter Category Name">
                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800  ">
                    Add
                </button> <br>
            </div>
            <div class="px-4">
                <x-input-error :messages="$errors->get('name')" class="mt-2 block" />
            </div>
        </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--! Contetn--}}
                    @foreach($categories as $category)
                         <div x-data="{show:false}" class=" inline-block m-2 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-white ">{{$category->name}}</h5>
                       <div class="flex sm:justify-start  space-x-4 mt-3">
                            <button @click="show=!show" class="inline-flex items-center px-3 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 ">
                                Edit Name
                            </button>
                            <form action="{{route('admin.deleteCategory' , $category->name)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="inline-flex items-center px-3 py-1 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800">
                                    Delete
                                </button>
                           </form>
                       </div>
                            <form x-show="show" action="{{route('admin.updateCategory' , $category->name)}}" method="POST" class="mt-6 flex space-x-10">
                               @csrf
                                @method('PUT')
                                <input type="text" name="name" class=" w-56 rounded px-2 py-0" required placeholder="Enter New Category Name">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800  ">
                                    Update
                                </button>
                            </form>
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
