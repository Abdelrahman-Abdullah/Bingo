@props(['posts'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Posts') }}
        </h2>
        <div class="inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400">
            <a href="{{auth()->user()->user_type == 'admin'? route('admin.create') : route('user.create')}}">Create a Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--Start Content--}}
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-400 bg-gray-100" >
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Post Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 {{$loop->last ? 'dark:border-gray-700' :''}}">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$post->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$post->slug}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$post->category->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$post->author->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('admin.edit' , $post->title)}}" class="font-medium text-blue-600  hover:underline">Edit</a>
                                        <form action="{{route('admin.delete', $post->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="font-medium text-red-600   hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center my-3 text-gray-300 px-3">
                            {{$posts->links()}}
                        </div>
                    </div>

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
