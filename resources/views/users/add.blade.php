@extends('layout.page_template', [ 'page' => 'Add', 'title' => 'Users' ])

@section('styles')
	<link rel='stylesheet' href='{{ url("/css/users/add.css") }}'>
@endsection

@section('main-content')
	<h1>Add User</h1>
	<form action="/pm/users/add" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper user-info">
			<label for="userName">User Name:</label>
			<input id="userName" type="text" name="name" required>
		</div>
		<div class="flex-wrapper user-info">
			<label for="userEmail">Email:</label>
			<input id="userEmail" type="email" name="email" required>
		</div>
		<div class="flex-wrapper user-info">
			<label for="userPass">Password</label>
			<input id="userPass" type="password" name="password" required>
		</div>
		<input class="btn" type="submit" value="Add">
	</form>
@endsection