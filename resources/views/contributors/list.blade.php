@extends('layout.page_template', [ 'page' => 'List' ])

@section('main-content')
	<h1>List Contributors</h1>
	@foreach ($contributors as $contributor)
		<h2>{{ $contributor->first_name }} {{ $contributor->last_name }}</h2>
		@foreach ($contributor->contributions as $contribution)
			<p>{{ $contribution->production->title }}</p>
		@endforeach
	@endforeach
@endsection