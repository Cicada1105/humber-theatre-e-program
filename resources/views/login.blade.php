@extends('layout.page_template', [ 'page' => 'Login' ])

@section('main-content')
	<h1>Login Page</h1>
	<form action="/login" method="post">
		@csrf
		<div>
			<label for="user_name">Username:</label>
			<input id="user_name" type="text" name='name' />
		</div>
		<div>
			<label for="user_password">Password:</label>
			<input id="user_password" type="password" name="password" />
		</div>
		<input type="submit" />
	</form>
@endsection