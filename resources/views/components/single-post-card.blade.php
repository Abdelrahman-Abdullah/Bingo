@props(['post'])
<article class="col-lg-4 col-md-6 mt-5">
    <div class="post-item">
        <div class="media-wrapper">
            <img loading="lazy" src="{{asset($post->thumbnail)}}" alt="amazing caves coverimage" class="img-fluid">
        </div>

        <div class="content">
            <h3><a href="/post/{{$post->title}}">{{$post->title}}</a></h3>
            <p>{{$post->content}}.</p>
            <a class="btn btn-main" href="/post/{{$post->title}}">Read more</a>
        </div>
    </div>
</article>

