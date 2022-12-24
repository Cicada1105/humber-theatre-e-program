@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty-roles/edit.css") }}">
@endsection

@section('main-content')
	<h1>Edit Faculty Role</h1>
	<form action="{{ url("/pm/faculty-roles/update/{$faculty_role->id}") }}" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper role-row">
			<label for="role-name">Role Name:</label>
			<input id="role-name" type="text" name="roleName" value="{{ $faculty_role->role }}" required>
		</div>
		<input class="btn" type="submit" value="Update">
	</form>
@endsection