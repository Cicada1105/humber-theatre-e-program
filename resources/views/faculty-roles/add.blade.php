@extends('layout.page_template', [ 'page' => 'Add' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty-roles/add.css") }}">
@endsection

@section('main-content')
	<h1>Add Faculty Role</h1>
	<form action="/pm/faculty-roles/add" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper role-row">
			<label for="role-name">Role Name:</label>
			<input id="role-name" type="text" name="roleName" required>
		</div>
		<input class="btn" type="submit" value="Submit">
	</form>
@endsection