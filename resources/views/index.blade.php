<x-layout>
<x-hero/>

    {{--    Start Services Card--}}
    <x-services-card />
{{--    !End Services Card--}}

    <!--
    Start About Section
    ==================================== -->
    <x-about-card/>
    <!-- End section -->

    <!--
    Start Call To Action
    ==================================== -->
    <section class="call-to-action section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 text-center">
                    <h2>Let's Create Something Together</h2>
                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin bibendum auctor, nisi elit consequat ipsum,
                        nesagittis sem nid elit. Duis sed odio sitain elit.</p>
                    <a href="/contact" class="btn btn-main">Contact us</a>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End section -->

    <!--
    Start Counter Section
    ==================================== -->
    <x-counter-card/>

    <!-- Start Testimonial
    =========================================== -->
    <x-testimonial-card :clients="$clients"/>
    <!--
    Start Blog Section
    =========================================== -->
    <x-posts-card :posts="$latestPosts"/>
    <!-- end section -->
</x-layout>
