@extends('layout.page_template')

@section('main-content')
    <figure class="program-poster text-center">
        <img src={{ $img['src'] }} alt={{ $img['alt'] }} />
        <figcaption>{{ $img['caption'] }}</figcaption>
    </figure>
    <h1>{{ $title }}</h1>
    <h3>By: {{ $writer }}</h3>
    <section class="synopsis">
        <h3>Synopsis</h3>
        @foreach($about as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </section>
    <section class="director">
        <h3>Directed By:</h3>
        <p class="text-center">{{ $directed_by }}</p>
    </section>
    <section class="dates">
        <h3>Dates and Times</h3>
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
@endsection
