@extends('layout.page_template', [ 'page' => 'Details' ])

@section('styles')
	<link rel='stylesheet' href='/css/productions/preview.css' />
@endsection

@section('main-content')
	<h1>{{$active_program->title}} Preview</h1>
	<form action="/pm/preview" method="post">
		{{ csrf_field() }}
		<input id="publish-btn" class="btn" type="submit" value="Publish" />
	</form>
	<figure class="program-poster text-center">
        <img src="{{ asset('storage/'.$active_program->poster_img_src) }}" alt="{{ $active_program->title }} poster" />
        <figcaption>{{ $active_program->poster_img_caption }}</figcaption>
    </figure>
    <h3 class="program-title text-upper">{{ $active_program->title }}</h3>
    <h4 class="program-writer">By: {{ $active_program->authors }}</h4>
    <section class="text-center synopsis-section">
        <p>{{ $active_program->blurb }}</p>
    </section>
    <section class="director-section">
        <h4 class="text-upper">Directed By</h4>
        <p class="text-center">{{ $active_program->directors }}</p>
    </section>
    @if ($active_program->choreographers)
        <section class="choreographer-section">
            <h4 class="text-upper">Choreographed By</h4>
            <p class="text-center">{{ $active_program->choreographers }}</p>
        </section>
    @endif
    <section class="dates-section">
        <h4 class="text-upper">Dates and Times</h4>
        @php($dateAndTimes = explode(';', $active_program->dates))
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
        <h4 class="text-upper">Location</h4>
        <p class="text-center">{{ $active_program->location }}</p>
    </section>
    @if ($active_program->content_warning)
        <section class="advisory-section">
            <h4>Content Warning</h4>
            <h4>Please be advised this show contains</h4>
            <p class="text-center">{{ $active_program->content_warning }}</p>
        </section>
    @endif

    <h3>Contributors</h3>
    @php($categoryColor = [ 'performance' => '#0C87CE', 'guest_artist' => '#EA7994', 'production' => '#3FA276' ])
    <hgroup class="departments flex-container m-auto">
        @foreach($categoryColor as $category=>$color)
            <h4 style="color: {{$color}}">{{ ucwords($category) }}</h4>
        @endforeach
    </hgroup>
    <section class="contributors-section">
        @foreach($contributions as $contribution)
            @php($contributor = $contribution->contributor)
            <article class="contributor">
                <h4 class="contributor__name">{{ $contributor['first_name'] }} {{ $contributor['last_name'] }}</h4>
                <hgroup class="role flex-container">
                    <h5 style="color: {{ $categoryColor[$contribution['category']] }}">{{ ucwords(str_replace('_',' ',$contribution['category']))  }}</h5>
                    <h5>{{ $contribution['role'] }}</h5>
                </hgroup>
                <p class="contributor__bio">{{ $contributor['bio'] }}</p>
            </article>
        @endforeach


    <h3>Humber Theatre Acknowledgement</h3>
    <section class="acknowledgment-section">
        <h4>Acknowledging The Land</h4>
        <p style="text-align:center">{{$active_program->land_acknowledgment}}</p>
    </section>
    <section class="about-humber-section">
        <h4>About Humber Theatre</h4>
        <p style="text-align:center">{{$active_program->about_humber}}</p>
    </section>
    <section class="faculty-involved-section">
        <h4>Faculty {{ date('Y') }}</h4>
        <dl>
            @if ($active_program->faculty) 
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->seniorDean->first_name }} {{ $active_program->seniorDean->last_name }}</dt>
                <dd>Senior Dean, Faculty of Media and Creative Arts</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->associateDean->first_name }} {{ $active_program->associateDean->last_name }}</dt>
                <dd>Associate Dean, Faculty of Media and Creative Arts</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfCarpentry->first_name }} {{ $active_program->headOfCarpentry->last_name }}</dt>
                <dd>Faculty Department Head of Carpentry</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->theatreDirector->first_name }} {{ $active_program->theatreDirector->last_name }}</dt>
                <dd>Director Theatre Production</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfProperties->first_name }} {{ $active_program->headOfProperties->last_name }}</dt>
                <dd>Faculty Department Head of Properties</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->voiceProfessor->first_name }} {{ $active_program->voiceProfessor->last_name }}</dt>
                <dd>Voice Professor, Vocal Research</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->academicProgramManager->first_name }} {{ $active_program->academicProgramManager->last_name }}</dt>
                <dd>Academic Program Manager</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfLighting->first_name }} {{ $active_program->headOfLighting->last_name }}</dt>
                <dd>Faculty Department Head of Lighting</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfWardrobe->first_name }} {{ $active_program->headOfWardrobe->last_name }}</dt>
                <dd>Faculty Department Head of Wardrobe</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfMovement->first_name }} {{ $active_program->headOfMovement->last_name }}</dt>
                <dd>Head of Movement, Movement Director</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfSound->first_name }} {{ $active_program->headOfSound->last_name }}</dt>
                <dd>Faculty Department Head of Sound</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->headOfPaint->first_name }} {{ $active_program->headOfPaint->last_name }}</dt>
                <dd>Faculty Department Head of Paint</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->technicalDirector->first_name }} {{ $active_program->technicalDirector->last_name }}</dt>
                <dd>Technical Director</dd>
            </div>
            <div class="faculty-involved-member flex-container">
                <dt>{{ $active_program->Pso->first_name }} {{ $active_program->Pso->last_name }}</dt>
                <dd>PSO</dd>
            </div>
            @endif
        </dl>
    </section>
    <section class="faculty-section">
        <ul class='faculty-list'>
        @foreach ($faculty as $member)
            <li class="text-center">{{ $member->first_name }} {{ $member->last_name }}</li>
        @endforeach
        </ul>
    </section>
    <section class="special-thanks-section">
        <h3>Special Thanks</h3>
        <p>{{$active_program->special_thanks}}</p>
    </section>
    </section>
@endsection