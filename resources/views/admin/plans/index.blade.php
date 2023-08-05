@props(['plans'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Plans') }}
        </h2>
        <div class=" inline-block absolute right-60 text-white text-lg rounded px-4 py-1 bg-blue-400"">
            <a href="{{route('admin.createPlan')}}" class="block" >Add new Plan</a>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{--! Start Content--}}
                    <div class="col-lg-4 col-md-6 flex justify-start flex-wrap">

                        @foreach($plans as $plan)
                             <div class="pricing-item  border-r-blue-200 border-r-2  border-b-blue-200 border-b-2   mr-2 mb-8  rounded">
                                <!-- plan name & value -->
                                <div class="price-title">
                                    <strong>{{ucwords($plan->type)}}</strong>
                                    <p class="value">${{$plan->price}}</p>
                                    <p>{{$plan->description}}</p>
                                </div>
                                <!-- /plan name & value -->

                                <!-- plan description -->
                                <ul>
                                    @foreach($plan->properties as $property)
                                        <li><i class="tf-ion-ios-arrow-forward text-blue-400"></i> {{$property}}</li>
                                    @endforeach
                                </ul>
                                <!-- /plan description -->

                                <!-- signup button -->
                                 <div class="text-center flex justify-evenly mt-4">
                                    <a class="btn btn-main text-blue-400 text-center hover:underline" href="{{route('admin.editPlan' , $plan->type)}}">Edit</a>
                                     <form method="post" action="{{route('admin.deletePlan' , $plan->type)}}">
                                        @csrf
                                         @method('DELETE')
                                         <button class="btn btn-main text-red-400 text-center hover:underline">Delete</button>
                                     </form>
                                 </div>
                            <!-- /signup button -->
                        </div>
                        @endforeach
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
