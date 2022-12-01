@extends('layout.page_template', [ 'page' => 'List' ])

@section('main-content')
	<h1>List Productions</h1>
	@foreach($productions as $production)
		<h3>{{ $production['title']}}</h3>
		<img src="{{ $production['poster_img_src'] }}" alt="{{ $production['poster_img_caption'] }}" />
	@endforeach
@endsection