@props(['plans'])

<x-layout>
    <x-single-page-header pageName="Pricing" />

    <x-about-card/>

    <section class="pricing-table" id="pricing">
        <div class="container">
            <x-section-header class="title-white"
                title="Our Greatest Plans"
                desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium soluta deserunt eaque, est, quia hic odit sed incidunt officiis quidem."
            />
            <div class="row">
                @forelse($plans as $plan)
                    <!-- single pricing table -->
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item">
                            <!-- plan name & value -->
                            <div class="price-title">
                                <h3>{{$plan->type}}</h3>
                                <strong class="value">${{$plan->price}}</strong>
                                <p>{{$plan->description}}</p>
                            </div>
                            <!-- /plan name & value -->

                            <!-- plan description -->
                            <ul>
                                @foreach($plan->properties as $property)
                                <li><i class="tf-ion-ios-arrow-forward"></i> {{$property->property}}</li>
                                @endforeach
                            </ul>
                            <!-- /plan description -->

                            <!-- signup button -->
                            <a class="btn btn-main" href="/contact">Subscribe</a>
                            <!-- /signup button -->

                        </div>
                    </div>
                @empty
                    <div>
                        <h2 class="text-white">
                            Not Yet! Sign as Admin To Add Portfolio
                        </h2>
                    </div>
                    <!-- end single pricing table -->
                @endforelse
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->
</x-layout>
