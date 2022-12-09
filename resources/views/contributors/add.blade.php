@extends('layout.page_template', [ 'page' => 'Add' ])

@section('styles')
	<link rel="stylesheet" href="/css/contributors/add.css" />
@endsection

@section('main-content')
	<h1>Add Contributor</h1>
	<form action="/pm/contributors/contributor/add" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex-wrapper contributor-row">
			<label for="contributor-first-name">First Name:</label>
			<input id="contributor-first-name" type="text" name="firstName" placeholder="Enter..." />
		</div>
		<div class="flex-wrapper contributor-row">
			<label for="contributor-last-name">Last Name:</label>
			<input id="contributor-last-name" type="text" name="lastName" placeholder="Enter..." />
		</div>
		<div class="flex-wrapper contributor-row">
			<label for="contributor-bio">Bio:</label>
			<textarea id="contributor-bio" name="bio" cols="" rows="bio"></textarea>
		</div>
		<div class="flex-wrapper contributor-row">
			<label for="contributor-last-name">Profile Image:</label>
			<input id="contributor-last-name" type="file" accept="image/*" name="photo" />
		</div>
		<input class="btn" type="submit" />
	</form>
@endsection