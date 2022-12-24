@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/users/edit.css") }}">
@endsection

@section('main-content')
	<h1>Edit User</h1>
	<form action="{{ url("/pm/users/update/{$user->id}") }}" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper user-info">
			<label for="userName">User Name:</label>
			<input id="userName" type="text" name="name" value="{{$user->name}}" required>
		</div>
		<div class="flex-wrapper user-info">
			<label for="userEmail">Email:</label>
			<input id="userEmail" type="email" name="email" value="{{$user->email}}" required>
		</div>
		<div class="flex-wrapper user-info">
			<label for="userPass">Password</label>
			<input id="userPass" type="password" name="password" required>
		</div>
		<input class="btn" type="submit" value="Update">
	</form>
@endsection