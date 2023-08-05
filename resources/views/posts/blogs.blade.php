@props(['allPostsWithSameCategory'])
<x-layout>
    <x-single-page-header pageName="Blogs"/>

        <div style="display: flex; flex-wrap: wrap; width: 90% ; margin: 0 auto">
            @if(count($allPostsWithSameCategory) > 0)
                @foreach($allPostsWithSameCategory as $post)
                        <x-single-post-card :post="$post"/>
                @endforeach
            @else
                <h2 style="margin: 150px auto;">
                    There Is Not Posts Yet
                </h2>
            @endif
        </div>
</x-layout>
