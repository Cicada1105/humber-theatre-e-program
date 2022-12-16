@extends('layout.page_template')

@section('styles')
	<link rel="stylesheet" href="/css/contributors.css" />
@endsection

@section('main-content')
	<h1>{{ $program }}: Contributors</h1>
	<hgroup class="departments flex-container m-auto">
		@foreach($departments as $department)
			<h3 style="color: {{ $department->color() }}">{{ ucwords($department->value) }}</h3>
		@endforeach
	</hgroup>
	<section class="contributors-section">
		@php($categoryColor = [ 'performance' => '#0C87CE', 'guest_artist' => '#EA7994', 'production' => '#3FA276' ])
		@foreach($contributions as $contribution)
			@php($contributor = $contribution->contributor)
			<article class="contributor">
				<h3 class="contributor__name">{{ $contributor['first_name'] }} {{ $contributor['last_name'] }}</h3>
				<hgroup class="role flex-container">
					<h4 style="color: {{ $categoryColor[$contribution['category']] }}">{{ ucwords(str_replace('_',' ',$contribution['category']))  }}</h4>
					<h4>{{ $contribution['role'] }}</h4>
				</hgroup>
				<p class="contributor__bio"><img class="contributor__headshot" src="{{asset('storage/' . $contributor->photo)}}" alt="{{$contributor->first_name}} {{$contributor->last_name}} headshot" />{{ $contributor['bio'] }}</p>
			</article>
		@endforeach
	</section>
@endsection