@extends('layout.page_template')

@section('main-content')
	<h1 class="text-white text-center">All of our past programs</h1>

	<div style="text-align: center">
	@foreach ($programs as $program)
		<a href='/{{$program}}'>{{ ucwords(join(' ', explode('-', $program))) }}</a>
	@endforeach
	</div>
@endsection