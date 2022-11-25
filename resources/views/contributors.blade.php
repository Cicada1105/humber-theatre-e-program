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
				<h3 class="contributor__name">{{ $contributor['name'] }}</h3>
				<hgroup class="role flex-container">
					<h4 style="color: {{ $contributor['department']->color() }}">{{ ucwords($contributor['department']->value) }}</h4>
					<h4>{{ $contributor['role'] }}</h4>
				</hgroup>
				<p class="contributor__bio">{{ $contributor['bio'] }}</p>
			</article>
		@endforeach
	</section>
@endsection