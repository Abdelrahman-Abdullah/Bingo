@props(['services'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Services') }}
        </h2>
        <div class=" inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400">
            <a href="{{route('admin.createService')}}" class="block">Create a Service</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{--! Start Content--}}
                    @foreach($services as $service)
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 inline-block my-1">
                            <i class=" text-6xl text-white tf-ion-ios-copy-outline"></i>
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$service->name}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$service->description}}</p>
                            <form method="POST" action="{{route('admin.deleteService' , $service->id)}}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm w-full sm:w-auto px-4 py-2 text-center ">
                                    Delete
                                </button>
                                <a
                                    class="text-green-700  ml-4 hover:underline"
                                    href="{{route('admin.editService' , $service->name)}}"
                                >
                                    Edit From Here
                                </a>
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
