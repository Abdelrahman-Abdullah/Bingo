@props(['plan'])
@php
    $properties = implode(',',$plan->properties);
@endphp
<x-app-layout class="static">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit: '.$plan->type) }}
        </h2>
    </x-slot>

    <div class="py-12 static border-red-300 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--Start Content--}}
                    <form action="{{route('admin.updatePlan' , $plan->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 ">Type</label>
                                <input type="text" id="type" name="type" value="{{$plan->type}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                <input type="text" id="price" name="price" value="{{$plan->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                <input type="text" id="description" name="description" value="{{$plan->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6">
                            <div>
                                <label for="properties" class="block mb-2 text-sm font-medium text-gray-900 ">Properties</label>
                                <input type="text" id="properties" name="properties" value="{{$properties}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                <p class="text-sm text-gray-500 mt-1" >Comma Seperated Value</p>
                                <x-input-error :messages="$errors->get('properties')" class="mt-2" />
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                    </form>
                </div>
            </div>
        </div>
        @if(session('success'))
            <x-flash class="bg-blue-500 p-2 rounded w-96 text-center text-white absolute right-0 top-32 "/>
        @endif
    </div>
</x-app-layout>
