@props(['users'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Users') }}
        </h2>
        <div class="inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400">
            <a href="{{route('admin.createUser')}}">Add New User</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--Start Content--}}

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 p-4">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <form action="{{route('admin.users' , request('search'))}}">
                                    <input type="text" id="table-search-users" name="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                                </form>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Position
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="{{asset('images/client-logo/202307141308abod.jpg')}}" alt="Jese image">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">{{$user->name}}</div>
                                        <div class="font-normal text-gray-500">{{$user->email}}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{$user->position ?? 'No Position Yet'}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$user->phone ?? 'User Doesn\'t Have Phone'}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{route('admin.editUser' , $user->email)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                                    <form action="{{route('admin.deleteUser', $user->email)}}" method="POST" >
                                        @csrf
                                        @method('DELETE')

                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete user</button>
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center my-3 text-gray-300 px-3">
                            {{$users->links()}}
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
