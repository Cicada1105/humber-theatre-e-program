@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty/edit.css") }}">
@endsection

@section('main-content')
	<h1>Edit Faculty</h1>
	<form action="/pm/faculty/update/{{$faculty->id}}" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper faculty-row">
			<label for="faculty-first-name">First Name:</label>
			<input id="faculty-first-name" type="text" name="firstName" value="{{$faculty->first_name}}" required>
		</div>
		<div class="flex-wrapper faculty-row">
			<label for="faculty-last-name">Last Name:</label>
			<input id="faculty-last-name" type="text" name="lastName" value="{{$faculty->last_name}}" required>
		</div>
		<input class="btn" type="submit" value="Update">
	</form>
@endsection