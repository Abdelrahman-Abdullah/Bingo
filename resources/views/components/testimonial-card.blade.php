@props(['clients'])
<section class="testimonial section" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- testimonial wrapper -->
                <div class="testimonial-slider">
                    @foreach($clients as $client)
                    <!-- testimonial single -->
                    <div class="item text-center">
                        <i class="tf-ion-chatbubbles"></i>
                        <!-- client info -->
                        <div class="client-details">
                            <p>
                                {{$client->bio}}
                            </p>
                        </div>
                        <!-- /client info -->
                        <!-- client photo -->
                        <div class="client-thumb">
                            <img loading="lazy" src="https://i.pravatar.cc/?u={{$client->id}}" class="img-fluid" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>  {{$client->name}}</h3>
                            <span>  {{$client->position}}</span>
                        </div>
                        <!-- /client photo -->
                    </div>
                    <!-- /testimonial single -->
                    @endforeach

                </div>
            </div> 		<!-- end col lg 12 -->
        </div>	    <!-- End row -->
    </div>       <!-- End container -->
</section>    <!-- End Section -->
