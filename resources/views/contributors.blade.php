@extends('layout.page_template', [ 'title' => (isset($title) ? $title : "Humber Program")])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/contributors.css") }}">
@endsection

@section('main-content')
	@isset($program)
		<h1>{{ $program }}: Contributors</h1>
	    @php($categoryColor = [ 'performance' => '#0C87CE', 'guest_artist' => '#EA7994', 'production' => '#3FA276' ])
	    <hgroup class="departments flex-container m-auto">
	        @foreach($categoryColor as $category=>$color)
	            <h4 style="color: {{$color}}">{{ ucwords(str_replace('_', ' ', $category)) }}</h4>
	        @endforeach
	    </hgroup>
		<section class="contributors-section">
			@if(count($contributions))
				@php($categoryColor = [ 'performance' => '#0C87CE', 'guest_artist' => '#EA7994', 'production' => '#3FA276' ])
				@foreach($contributions as $contribution)
					@php($contributor = $contribution->contributor)
					<article class="contributor">
						<h3 class="contributor__name">{{ $contributor['first_name'] }} {{ $contributor['last_name'] }}</h3>
						<hgroup class="role flex-container">
							<h4 style="color: {{ $categoryColor[$contribution['category']] }}">{{ ucwords(str_replace('_',' ',$contribution['category']))  }}</h4>
							<h4>{{ $contribution['role'] }}</h4>
						</hgroup>
						<section class="flex-wrapper contributor-bio">
							<img class="bio__img" src="{{ $contributor->photo ? asset('storage/' . $contributor->photo) : url('imgs/default_img.png') }}" alt="{{$contributor->first_name}} {{$contributor->last_name}} headshot">
							<p class="bio__text text-justify">{{ $contributor['bio'] ? $contributor['bio'] : '[Bio not available]' }}</p>
						</section>
					</article>
				@endforeach
			@else
				<h2>No Available Contributors</h2>
			@endif
		</section>
	@else
        <h1 class="program-title text-upper">No Active Program</h1>
        <p class="text-center">There is no active program at this time. Please check back later</p>
	@endisset
@endsection