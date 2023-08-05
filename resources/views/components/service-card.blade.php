@props(['name' , 'description' , 'loop'])
<div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
    <div class="service-block p-4 text-center {{$loop->odd ? 'color-bg' : ''}}">
        <div class="service-icon text-center">
            <i class="tf-ion-ios-copy-outline"></i>
        </div>
        <h3>{{$name}}</h3>
        <p>{{$description}}</p>
    </div>
</div>
