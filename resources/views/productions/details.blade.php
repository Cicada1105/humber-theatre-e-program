@extends('layout.page_template', [ 'page' => 'Details' ])

@section('main-content')
	<h1>Production Details</h1>
	<form action="/pm/preview" method="post">
		{{ csrf_field() }}
		<input class="btn" type="submit" value="Publish" />
	</form>
@endsection