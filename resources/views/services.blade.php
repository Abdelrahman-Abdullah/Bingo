@props(['services'])
<x-layout>
    <x-single-page-header pageName="Services" />


    <section class="services" id="services">
        <div class="container">
            <x-section-header
                title="Our Services"
                desc="Vestibulum nisl tortor, consectetur quis imperdiet bibendum, laoreet sed arcu. Sed condimentum iaculis ex,
                 in faucibus lorem accumsan non. Donec mattis tincidunt metus. Morbi sed tortor a risus luctus dignissim"
                    {{-- --}}
                />
            <div class="row no-gutters">
                @if($services->count() >= 1)
                        @foreach($services as $service)
                            <!-- Start Single Service Item -->
                                <x-service-card
                                    :name="$service->name"
                                    :description="$service->description"
                                    :loop="$loop"
                                    {{--Foreach Loop Variable To Check If The Card Is even or odd --}}
                                />
                            <!-- End Single Service Item -->
                        @endforeach
                @else
                    <h2>No Services There</h2>
                @endif
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->
</x-layout>
