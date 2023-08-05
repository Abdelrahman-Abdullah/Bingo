@props(['post'])
<x-app-layout class="static">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New ') }}
        </h2>
    </x-slot>

    <div class="py-12 static border-red-300 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--Start Content--}}
                    <form action="{{route('admin.storeUser')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6  ">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="text" id="name" name="name" value="{{old('name' , request()->name)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid gap-6 mt-3 ">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                <input type="email" id="email" name="email" value="{{old('email' , request()->email)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John@example.com" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid gap-6 mt-3 ">
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                <input type="password" id="password" name="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid gap-6 mt-3 ">
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid gap-6 mt-3 ">
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{old('phone' , request()->phone)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="011524xxxx" required>
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid gap-6 mt-3 ">
                            <div>
                                <label for="position" class="block mb-2 text-sm font-medium text-gray-900 ">Position</label>
                                <input type="text" id="position" name="position" value="{{old('position' , request()->position)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Web Developer" required>
                                <x-input-error :messages="$errors->get('position')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid gap-6 mt-3 ">
                            <div>
                                <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 ">Bio</label>
                                <input type="text" id="bio" name="bio" value="{{old('bio' , request()->bio)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                            </div>
                        </div>
                        <div class="mb-6 mt-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="imageFile">Photo</label>
                            <input  name="imageFile" class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="thumbnail" type="file">
                            <p class="my-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG, JPG</p>
                            <x-input-error :messages="$errors->get('imageFile')" class="my-2" />
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                    </form>
                </div>
            </div>
        </div>
        @if(session('success'))
            <x-flash class="bg-blue-500 p-2 rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
    </div>
</x-app-layout>

