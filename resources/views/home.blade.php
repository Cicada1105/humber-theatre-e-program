@extends('layout.page_template')

@section('styles')
    <link rel="stylesheet" href="/css/about.css" />
@endsection

@section('main-content')
    <figure class="program-poster text-center">
        <img src={{ $img['src'] }} alt={{ $img['alt'] }} />
        <figcaption>{{ $img['caption'] }}</figcaption>
    </figure>
    <h1 class="program-title text-upper">{{ $title }}</h1>
    <h3 class="program-writer">By: {{ $writer }}</h3>
    <section class="synopsis-section">
        <h3 class='text-upper'>Synopsis</h3>
        @foreach($about as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </section>
    <section class="director-section">
        <h3 class="text-upper">Directed By</h3>
        <p class="text-center">{{ $directed_by }}</p>
    </section>
    <section class="dates-section">
        <h3 class="text-upper">Dates and Times</h3>
        @foreach($dates as $date)
            <section class='date text-center'>
                @php
                    $formatDate = date_create($date['date_time']);
                    $d = date_format($formatDate,'F jS - ga');
                @endphp
                <time datetime={{ $date['date_time'] }}>{{ $d }}</time>
                <p>{{ $date['details'] }}</p>
            </section>
        @endforeach
    </section>
    <section class="location-section">
        <h3 class="text-upper">Location</h3>
        <p class="text-center">{{ $location }}</p>
    </section>
    @if (is_array($advisory))
        <section class="advisory-section">
            <h3>Content Warning</h3>
            <h4>Please be advised this show contains</h4>
            @foreach ($advisory as $content)
                <p class="text-center">{{ $content }}</p>
            @endforeach
        </section>
    @endif
@endsection
