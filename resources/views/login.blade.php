@extends('layout.page_template', [ 'page' => 'Login' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/login.css") }}">
@endsection

@section('main-content')
	<h1>Login</h1>
	<form action="/login" method="post">
		@csrf
		<div class="flex-wrapper login-row">
			<label for="user_name">Username:</label>
			<input id="user_name" type="text" name='name'>
		</div>
		<div class="flex-wrapper login-row">
			<label for="user_password">Password:</label>
			<input id="user_password" type="password" name="password">
		</div>
		<input class="btn" type="submit" value="Submit">
	</form>
@endsection