@props(['categories' , 'portfolio'])
<x-layout>
    <x-single-page-header pageName="Portfolio"/>

    <!-- Start Portfolio Section
		=========================================== -->

    <section class="portfolio section-sm" id="portfolio">
        <div class="container-fluid">
            <x-section-header
                title="Our Works"
                desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, veritatis.
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, vitae?"
            />

            <div class="row">
                <div class="col-lg-12">

                    <div class="portfolio-filter">
                        <button type="button" data-filter="all">All</button>
                        @foreach($categories as $category)
                            <button type="button" data-filter="{{$category->name}}">{{$category->name}}</button>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="filtr-container">
                                @forelse($portfolio as $singlePortfolio)
                                    <div class="col-md-3 col-sm-6 col-xs-6 filtr-item " data-category="mix, {{$singlePortfolio->category->name}}">
                                        <div class="portfolio-block">
                                            <img class="img-fluid" src="{{asset('storage/'.$singlePortfolio->path)}}" alt="">
                                            <div class="caption">
                                                <a class="search-icon" href="{{asset('storage/'.$singlePortfolio->path)}}" data-lightbox="image-1">
                                                    <i class="tf-ion-ios-search-strong"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div>
                                        <h2>
                                            Not Yet! Sign as Admin To Add Portfolio
                                        </h2>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div> <!-- /end col-lg-12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- End section -->
    <!-- Start Testimonial
    =========================================== -->
        <x-testimonial-card :clients="$clients"/>
    <!-- End Testimonial
    =========================================== -->

</x-layout>
