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
		@foreach($contributors as $contributor)
			<article class="contributor">
				<h4 class="contributor__name">{{ $contributor['name'] }}</h4>
				<hgroup class="role flex-container">
					<h5 style="color: {{ $contributor['department']->color() }}">{{ ucwords($contributor['department']->value) }}</h5>
					<h5>{{ $contributor['role'] }}</h5>
				</hgroup>
				<p class="contributor__bio">{{ $contributor['bio'] }}</p>
			</article>
		@endforeach
	</section>
@endsection