@props(['post' , 'categories'])

<x-layout>
{{--    Page Single Header --}}
<x-single-page-header pageName="Blog Single"/>

    <!-- blog details part start -->
    <section class="blog-details section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="post">
                        <div class="post-image mb-5">
                            <img loading="lazy" class="img-fluid w-100" src="{{asset($post->thumbnail)}}" alt="post-image">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <h3>{{$post->title}}</h3>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <span>{{$post->author->name}}</span>&nbsp;/
                                </li>
                                <li class="list-inline-item">
                                    <span>{{$post->comments->count()}} comments</span>
                                </li>
                            </ul>
                            <p>
                                {{$post->content}}
                            </p>
                            @auth
                                 <h3>{{$post->comments->count()}} comments</h3>
                            @endauth
                            <ul class="comment-list">
                                <!-- comment list -->
                                @foreach($post->comments as $comment)
                                    <li class="comment-list-item">
                                        <div class="comment-list-item-image">
                                            <img loading="lazy" width="80" height="80" src="{{$comment->user->social_type ? $comment->user->thumbnail : asset("storage/".$comment->user->thumbnail)}}" alt="comment-img">
                                        </div>
                                        <div class="comment-list-item-content">
                                            <h5>{{$comment->user->name}}</h5>
                                            <h6>Aug 20, 2018</h6>
                                            <p>{{$comment->content}}</p>
                                       </div>
                                    </li>
                                @endforeach
                            </ul>
                            @auth
                                <h3>Leave A Comments</h3>
                                <!-- Comment Form -->
                                <form action="/comment/{{$post->id}}" class="comment-form" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <textarea class="form-control" name="msg" id="msg" rows="6" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" value="send" class="btn btn-primary">Comment</button>
                                </form>
                            @endauth
                        </div>
                    </article>
                </div>
                @if(session('success'))
                    <x-flash/>
                @endif
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- sidebar -->
                    <aside class="sidebar pl-0 pl-lg-4">
                        <div class="widget-search widget">
                            <form action="/posts/?search={{request('search')}}" method="get">
                                <!-- Search bar -->
                                <input class="form-control shadow-none" type="text" placeholder="Search..." name="search">
                                <button type="submit" class="widget-search-btn">
                                    <i class="tf-ion-ios-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="widget-categories widget">
                            <h2>Categories</h2>
                            <!-- widget categories list -->
                            <ul class="widget-categories-list">
                                @foreach($categories as $category)
                                <li>
                                    <a href="/posts/?category={{$category->name}}">{{$category->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget-post widget">
                            <h2>Latest Post</h2>
                            <!-- latest post -->
                            <ul class="widget-post-list ">
                                @foreach($latestPosts as $latestPost)
                                    <li class="widget-post-list-item  justify-content-around">
                                        <div class="widget-post-image">
                                            <a href="/post/{{$latestPost->title}}">
                                                <img loading="lazy" class="max-w-xl" src="{{asset('images/blog/post-1.jpg')}}" alt="post-img">
                                            </a>
                                        </div>
                                        <div class="widget-post-content">
                                            <a href="/post/{{$latestPost->title}}">
                                                <h5 class="f">{{$latestPost->title}}</h5>
                                            </a>
                                            <h6>{{$latestPost->created_at->diffForHumans()}}</h6>
                                        </div>
                                   </li>
                                @endforeach

                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog details part end -->
</x-layout>
