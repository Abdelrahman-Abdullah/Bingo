@props(['posts'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Your Posts') }}
        </h2>
        <div class="inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400">
            <a href="{{auth()->user()->user_type == 'admin'? route('admin.create') : route('user.create')}}">Create a Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($posts->count() > 0)
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
                                        <a href="{{route('user.edit' , $post->title)}}" class="font-medium text-blue-600  hover:underline">Edit</a>
                                        <form action="{{route('user.delete', $post->id)}}" method="POST" >
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
                    @else
                        <div class="text-center text-lg">
                            <p>
                                You Doesn't Have Posts Yet.
                                <span class="text-blue-400 font-semibold hover:underline">
                                    <a href="{{route('user.create')}}">
                                        Add One Now!
                                    </a>
                                </span>
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        @if(session('deleted'))
            <x-flash class="bg-red-500 p-2  rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
        @if(session('success'))
            <x-flash class="bg-green-500 p-2  rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
    </div>
</x-app-layout>
