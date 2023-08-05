@props(['galleries'])

<section class="section gallery">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="title text-center">
                    <h2>Sneak Peak Gallery</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore numquam esse vitae recusandae qui
                        aspernatur, blanditiis, laboriosam dignissimos dolore facere provident ex? Porro, praesentium consectetur
                        tempore. Nulla, error eius dolorem.</p>
                    <div class="border"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="company-gallery">
                    @foreach($galleries as $gallery)
                        <img loading="lazy" src="{{asset($gallery->path)}}" alt="">
                    @endforeach
                    <img loading="lazy" src="images/company/gallery-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
