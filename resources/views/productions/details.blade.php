@extends('layout.page_template', [ 'page' => 'Details' ])

@section('styles')
	<link rel='stylesheet' href='{{ url("/css/productions/preview.css") }}'>
@endsection

@section('main-content')
    <script type="text/javascript">
        function confirmation(e) {
            // Check if there is missing data
            /* Program info */
            const hasPoster = "{{$active_program->poster_img_src}}" && "{{$active_program->poster_img_caption}}";
            const hasAuthor = "{{$active_program->authors}}";
            const hasBlurb = "{{$active_program->blurb}}";
            const hasDirectors = "{{$active_program->directors}}";
            const hasChoreographers = "{{$active_program->choreographers}}";
            const hasDates = "{{$active_program->dates}}";
            const hasLocation = "{{$active_program->location}}";
            /* Contributions */
            const hasContributions = {{count($contributions)}};
            /* Acknowledgment */
            const hasAcknowledgment = "{{$active_program->land_acknowledgement}}";
            const hasAboutHumber = "{{$active_program->about_humber}}";
            const hasFacultyInvolvement = "{{$faculty_involvement}}";
            const hasFaculty = "{{count($faculty)}}";
            const hasSpecialThanks = "{{$active_program->special_thanks}}";

            const isMissingProgramInfo = !hasPoster || !hasAuthor || !hasBlurb || !hasDirectors || !hasChoreographers || !hasDates || !hasLocation;
            const isMissingContributions = !hasContributions;
            const isMissingAcknowledgmentInfo = !hasAcknowledgment || !hasAboutHumber || !hasFacultyInvolvement || !hasFaculty || !hasSpecialThanks;

            // If there is any information missing, alert the user before publishing it to the public facing pages
            if (isMissingProgramInfo || isMissingContributions || isMissingAcknowledgmentInfo) {
                let confirmPublish = confirm('There is some missing info for the {{$active_program->title}} program. Are you sure you want to publish with missing info?');

                // If the user cancels, prevent form from being submitted
                if (!confirmPublish) {
                    e.preventDefault();
                }
            }
        }
    </script>
    @if ($active_program)
    	<h1>{{$active_program->title}} Preview</h1>
    	<form action="{{ url('/pm/preview') }}" method="post" onsubmit="confirmation(event)">
    		{{ csrf_field() }}
    		<button id="publish-btn" class="btn" type="submit">Publish</button>
    	</form>
    	<figure class="program-poster text-center">
            <img src="{{ $active_program->poster_img_src ? asset('storage/'.$active_program->poster_img_src) : url('/imgs/default_img.png') }}" alt="{{ $active_program->title }} poster">
            <figcaption>{{ $active_program->poster_img_caption }}</figcaption>
        </figure>
        <h3 class="program-title text-upper">{{ $active_program->title }}</h3>
        @isset($active_program->authors)
               <h4 class="program-writer">By: {{ $active_program->authors }}</h4>
        @endisset
        @isset($active_program->blurb)
            <section class="text-justify synopsis-section">
                <p>{{ $active_program->blurb }}</p>
            </section>
        @endisset
        <section class="director-section">
            <h4 class="text-upper">Directed By</h4>
            <p class="text-center">{{ $active_program->directors ? $active_program->directors : "Unavailable" }}</p>
        </section>
        <section class="choreographer-section">
            <h4 class="text-upper">Choreographed By</h4>
            <p class="text-center">{{ $active_program->choreographers ? $active_program->choreographers : "Unavailable" }}</p>
        </section>
        <section class="dates-section">
            <h4 class="text-upper">Dates and Times</h4>
            @if(isset($active_program->dates))
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
            @else
                <p class="text-center">Unavailable</p>
            @endif
        </section>
        <section class="location-section">
            <h4 class="text-upper">Location</h4>
            <p class="text-center">{{ $active_program->location ? $active_program->location : "Unavailable" }}</p>
        </section>
        <section class="advisory-section">
            <h4>Content Warning</h4>
            @if(isset($active_program->content_warning))
                <h4>Please be advised this show contains</h4>
                <p class="text-center">{{ $active_program->content_warning }}</p>
            @else
                <p class="text-center">N/A</p>
            @endif
        </section>

        <h3>Contributors</h3>
        @php($categoryColor = [ 'performance' => '#0C87CE', 'guest_artist' => '#EA7994', 'production' => '#3FA276' ])
        <hgroup class="departments flex-container m-auto">
            @foreach($categoryColor as $category=>$color)
                <h4 style="color: {{$color}}">{{ ucwords(str_replace('_', ' ', $category)) }}</h4>
            @endforeach
        </hgroup>
        <section class="contributors-section">
            @if(count($contributions))
                @foreach($contributions as $contribution)
                    @php($contributor = $contribution->contributor)
                    <article class="contributor">
                        <h4 class="contributor__name">{{ $contributor['first_name'] }} {{ $contributor['last_name'] }}</h4>
                        <hgroup class="role flex-container">
                            <h5 style="color: {{ $categoryColor[$contribution['category']] }}">{{ ucwords(str_replace('_',' ',$contribution['category']))  }}</h5>
                            <h5>{{ $contribution['role'] }}</h5>
                        </hgroup>
                        <section class="flex-wrapper contributor-bio">
                            <img class="bio__img" src="{{ $contributor->photo ? asset('storage/' . $contributor->photo) : url('imgs/default_img.png')}}" alt="{{$contributor->first_name}} {{$contributor->last_name}} headshot">
                            <p class="bio__text text-justify">{{ $contributor['bio'] ? $contributor['bio'] : "[Bio not available]" }}</p>
                        </section>
                    </article>
                @endforeach
            @else
                <h2>No Available Contributors</h2>
            @endif
        </section>

        <h3>Humber Theatre Acknowledgement</h3>
        <section class="acknowledgment-section">
            <h4>Acknowledging The Land</h4>
            @if(isset($active_program->land_acknowledgment))
                <p class="text-justify">{{$active_program->land_acknowledgment}}</p>
            @else
                <p class="text-center">Unavailable</p>
            @endif
        </section>
        <section class="about-humber-section">
            <h4>About Humber Theatre</h4>
            @if(isset($active_program->about_humber))
                <p class="text-justify">{{$active_program->about_humber}}</p>
            @else
                <p class="text-center">Unavailable</p>
            @endif
        </section>
        @if(count($faculty_involvement))
            <section class="faculty-involved-section">
                <h4>Faculty {{ date('Y') }}</h4>
                <dl>
                    @foreach($faculty_involvement as $involvement)
                        @if(!is_null($involvement->faculty_role_id))
                            @php($facultyMember = $involvement->faculty)
                            @php($facultyRole = $involvement->facultyRole->role)
                            @php($roleId = str_replace(" ", "-", strtolower($facultyRole)))
                            <div class="faculty-involved-member flex-container">
                                <dt aria-describedBy="{{$roleId}}">
                                    {{ $facultyMember->first_name }} {{ $facultyMember->last_name }}
                                </dt>
                                <dd id="{{$roleId}}">{{ $facultyRole }}</dd>
                            </div>
                        @endif
                    @endforeach
                </dl>
            </section>
        @endif
        @if(count($faculty))
            <section class="faculty-section">
                <ul class='faculty-list'>
                @foreach ($faculty as $member)
                    <li class="text-center">{{ $member->first_name }} {{ $member->last_name }}</li>
                @endforeach
                </ul>
            </section>
        @endif
        @isset($active_program->special_thanks)
            <section class="special-thanks-section">
                <h3>Special Thanks</h3>
                <p class="text-center">{{$active_program->special_thanks}}</p>
            </section>
        @endisset
        <section class="text-center digital-accredidation-section">
            <h2 class="text-upper">Digital Program Creation by:</h2>
            <p>Josh Colvin - joshicolvin@gmail.com</p>
        </section>
    @else
        <h1>No Current Active Program</h1>
    @endif
@endsection