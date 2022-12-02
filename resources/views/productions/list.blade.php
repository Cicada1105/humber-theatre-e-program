@extends('layout.page_template', [ 'page' => 'List' ])

@section('main-content')
	<h1>List Productions</h1>
	@foreach ($productions as $production)
		<h2>{{ $production->title }}</h2>
	@endforeach
@endsection