@extends('layout.page_template', [ 'page' => 'Add' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty/add.css") }}">
@endsection

@section('main-content')
	<h1>Add Faculty</h1>
	<form action="/pm/faculty/add" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper faculty-row">
			<label for="faculty-first-name">First Name:</label>
			<input id="faculty-first-name" type="text" name="firstName" required>
		</div>
		<div class="flex-wrapper faculty-row">
			<label for="faculty-last-name">Last Name:</label>
			<input id="faculty-last-name" type="text" name="lastName" required>
		</div>
		<input class="btn" type="submit" value="Add">
	</form>
@endsection