@extends('layout.page_template')

@section('styles')
    <link rel="stylesheet" href="{{ url("/css/about.css") }}">
@endsection

@section('main-content')
    <figure class="program-poster text-center">
        <img aria-labeledBy="poster__caption" src="{{ asset('storage/'.$poster_img_src) }}" alt="{{ $title }} poster">
        <figcaption>{{ $poster_img_caption }}</figcaption>
    </figure>
    <h1 class="program-title text-upper">{{ $title }}</h1>
    <h2 class="program-writer">By: {{ $authors }}</h2>
    <section class="text-justify synopsis-section">
        <p>{{ $blurb }}</p>
    </section>
    <section class="director-section">
        <h2 class="text-upper">Directed By</h2>
        <p class="text-center">{{ $directors }}</p>
    </section>
    @if ($choreographers)
        <section class="choreographer-section">
            <h2 class="text-upper">Choreographed By</h2>
            <p class="text-center">{{ $choreographers }}</p>
        </section>
    @endif
    <section class="dates-section">
        <h2 class="text-upper">Dates and Times</h2>
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
        <h2 class="text-upper">Location</h2>
        <p class="text-center">{{ $location }}</p>
    </section>
    @if ($content_warning)
        <section class="advisory-section">
            <h2>Content Warning</h2>
            <h3>Please be advised this show contains</h3>
            <p class="text-center">{{ $content_warning }}</p>
        </section>
    @endif
@endsection
