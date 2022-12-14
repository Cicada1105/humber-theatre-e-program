@extends('layout.page_template')

@section('styles')
    <link rel="stylesheet" href="/css/about.css" />
@endsection

@section('main-content')
    <figure class="program-poster text-center">
        <img src="{{ asset('storage/'.$poster_img_src) }}" alt="{{ $title }} poster" />
        <figcaption>{{ $poster_img_caption }}</figcaption>
    </figure>
    <h1 class="program-title text-upper">{{ $title }}</h1>
    <h3 class="program-writer">By: {{ $authors }}</h3>
    <section class="synopsis-section">
        <h3 class='text-upper'>Synopsis</h3>
        <p>{{ $blurb }}</p>
    </section>
    <section class="director-section">
        <h3 class="text-upper">Directed By</h3>
        <p class="text-center">{{ $directors }}</p>
    </section>
    @if ($choreographers)
        <section class="choreographer-section">
            <h3 class="text-upper">Choreographed By</h3>
            <p class="text-center">{{ $choreographers }}</p>
        </section>
    @endif
    <section class="dates-section">
        <h3 class="text-upper">Dates and Times</h3>
        @php($dateAndTimes = explode(';', $dates))
        @foreach($dateAndTimes as $dateAndTimeStr)
            @php($dateAndTime = explode(':',$dateAndTimeStr))
            @php($trimmedDateAndTime = trim($dateAndTime[0]))
            @php($date = date_create_from_format("F jS - ga", $trimmedDateAndTime))
            <section class='date text-center'>
                <time datetime="{{ date_format($date,'Y-m-d') }}">{{ $dateAndTime[0] }}</time>
                <p>{{ $dateAndTime[1] }}</p>
            </section>
        @endforeach
    </section>
    <section class="location-section">
        <h3 class="text-upper">Location</h3>
        <p class="text-center">{{ $location }}</p>
    </section>
    @if ($content_warning)
        <section class="advisory-section">
            <h3>Content Warning</h3>
            <h4>Please be advised this show contains</h4>
            <p class="text-center">{{ $content_warning }}</p>
        </section>
    @endif
@endsection
