<x-layout>

    <x-single-page-header pageName="Contact Us"/>


    <!--Start Contact Us
       =========================================== -->
    <section class="contact-us" id="contact">
        <div class="container">
            <x-section-header
                title="Get In Touch"
                desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate facilis eveniet maiores ab maxime nam
                            ut numquam molestiae quaerat incidunt"
            />

            <div class="row">
                <!-- Contact Details -->
                <div class="contact-details col-md-6 ">
                    <h3 class="mb-3">Contact Details</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, vero, provident, eum eligendi blanditiis ex
                        explicabo vitae nostrum facilis asperiores dolorem illo officiis ratione vel fugiat dicta laboriosam labore
                        adipisci.</p>
                    <ul class="contact-short-info mt-4">
                        <li class="mb-3">
                            <i class="tf-ion-ios-home"></i>
                            <span>Khaja Road, Bayzid, Chittagong, Bangladesh</span>
                        </li>
                        <li class="mb-3">
                            <i class="tf-ion-android-phone-portrait"></i>
                            <span>Phone: +880-31-000-000</span>
                        </li>
                        <li class="mb-3">
                            <i class="tf-ion-android-globe"></i>
                            <span>Fax: +880-31-000-000</span>
                        </li>
                        <li>
                            <i class="tf-ion-android-mail"></i>
                            <span>Email: hello@meghna.com</span>
                        </li>
                    </ul>
                    <!-- Footer Social Links -->
                    <div class="social-icon">
                        <ul>
                            <li><a href="https://themefisher.com/"><i class="tf-ion-social-facebook"></i></a></li>
                            <li><a href="https://themefisher.com/"><i class="tf-ion-social-twitter"></i></a></li>
                            <li><a href="https://themefisher.com/"><i class="tf-ion-social-dribbble-outline"></i></a></li>
                            <li><a href="https://themefisher.com/"><i class="tf-ion-social-linkedin-outline"></i></a></li>
                        </ul>
                    </div>
                    <!--/. End Footer Social Links -->
                </div>
                <!-- / End Contact Details -->

                <!-- Contact Form -->
                <div class="contact-form col-md-6 ">
                    <form id="contact-form" method="post" role="form" action="/contact">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="text" placeholder="Your Name" class="form-control" name="name" id="name" >
                        </div>
                        <x-contact-error name="name" />
                        <div class="form-group mb-4">
                            <input type="email" placeholder="Your Email" class="form-control" name="email" id="email" >
                        </div>
                        <x-contact-error name="email" />

                        <div class="form-group mb-4">
                            <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject" >
                        </div>
                        <x-contact-error name="subject" />

                        <div class="form-group mb-4">
                            <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message" ></textarea>
                        </div>
                        <x-contact-error name="message" />

                        <div id="cf-submit">
                            <input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
                        </div>
                    </form>
                </div>
                <!-- ./End Contact Form -->

            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end section -->
    @if(session()->has('success'))
    <x-flash/>
    @endif


    <!--================================
   =            Google Map            =
   =================================-->
    <div class="google-map">
        <div id="map_canvas" class="map_canvas" data-latitude="40.712776" data-longitude="-74.005974" data-marker="images/marker.png" data-marker-name="Bingo"></div>
    </div>
    <!--====  End of Google Map  ====-->
</x-layout>
