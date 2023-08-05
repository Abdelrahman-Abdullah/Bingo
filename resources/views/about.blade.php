@props(['galleries' , 'teamMembers'])
<x-layout>
    <x-single-page-header pageName="About Us" />

{{--Main Section--}}
    <x-about-main-section />

{{--Mession and Vision--}}
    <x-about-mission />

{{--Qoute--}}
    <x-about-quote/>

{{--Gallery--}}
    <x-about-gallery :galleries="$galleries"/>

{{--our team--}}
    <x-team-card :teamMembers="$teamMembers"/>

{{--counter--}}
    <x-counter-card/>

{{--contact--}}
    <x-contact-card/>
</x-layout>
