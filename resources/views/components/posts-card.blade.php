@props(['posts'])

<section class="blog" id="blog">
    <div class="container">
        <x-section-header
            title="Latest Posts"
            desc="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, veritatis.
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, vitae?"
        />
        <div class="row">
            @foreach($posts as $post)
            <!-- single blog post -->
            <x-single-post-card :post="$post"/>
            <!-- /single blog post -->
            @endforeach
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
