@props(['title' , 'desc'])
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8">
        <!-- section title -->
        <div {{$attributes->merge(['class'=>"title text-center"])}}>
            <h2>{{$title}}</h2>
            <p>{{$desc}} </p>
            <div class="border"></div>
        </div>
        <!-- /section title -->
    </div>
</div>
