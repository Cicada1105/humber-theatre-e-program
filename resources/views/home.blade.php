@extends('layout.page_template', [ 'title' => (isset($title) ? $title : "Humber Program")])

@section('styles')
    <link rel="stylesheet" href="{{ url("/css/about.css") }}">
@endsection

@section('main-content')
    @isset($title)
        <figure class="program-poster text-center">
            <img aria-labeledBy="poster__caption" src="{{ $poster_img_src ? asset('storage/'.$poster_img_src) : url("/imgs/default_img.png") }}" alt="{{ $title }} poster">
            <figcaption>{{ $poster_img_caption }}</figcaption>
        </figure>
        <h1 class="program-title text-upper">{{ $title }}</h1>
        @if(isset($authors))
            <h2 class="program-writer">By: {{ $authors }}</h2>
        @endif
        @if(isset($blurb))
            <section class="text-center synopsis-section">
                <p>{{ $blurb }}</p>
            </section>
        @endif
        <section class="director-section">
            <h2 class="text-upper">Directed By</h2>
            <p class="text-center">{{ $directors ? $directors : "Unavailable" }}</p>
        </section>
        <section class="choreographer-section">
            <h2 class="text-upper">Choreographed By</h2>
            <p class="text-center">{{ $choreographers ? $choreographers : "Unavailable" }}</p>
        </section>
        <section class="dates-section">
            <h2 class="text-upper">Dates and Times</h2>
            @if(isset($dates))
                @php($dateAndTimes = explode(';', $dates))
                @foreach($dateAndTimes as $dateAndTimeStr)
                    @php($dateAndTime = explode(',',$dateAndTimeStr))
                    @php($trimmedDateAndTime = trim($dateAndTime[0]))
                    @php($date = date_create_from_format("F jS - ga", $trimmedDateAndTime))
                    <section class='date text-center'>
                        <time datetime="{{ date_format($date,'Y-m-d') }}">{{ $dateAndTime[0] }}</time>
                        <p>{{ $dateAndTime[1] }}</p>
                    </section>
                @endforeach
            @else
                <p class="text-center">Unavailable</p>
            @endif
        </section>
        <section class="location-section">
            <h2 class="text-upper">Location</h2>
            <p class="text-center">{{ $location ? $location : "Unavailable" }}</p>
        </section>
        @isset($content_warning)
            <section class="advisory-section">
                <h2>Content Warning</h2>
                <h3>Please be advised this show contains</h3>
                <p class="text-center">{{ $content_warning }}</p>
            </section>
        @endisset
    @else
        <h1 class="program-title text-upper">No Active Program</h1>
        <p class="text-center">There is no active program at this time. Please check back later</p>
    @endisset
@endsection
