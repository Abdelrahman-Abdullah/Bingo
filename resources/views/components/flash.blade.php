<div id="flash"  x-data="{ open: true }" x-show="open" x-init="setTimeout(()=> open = false , 2500)"
     {{$attributes->merge(['class'=>''])}}
>
    {{session('success') ?? session('deleted')}}
</div>
