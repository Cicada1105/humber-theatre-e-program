@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="/css/contributors/edit.css" />
@endsection

@section('main-content')
	<h1>Edit Contributor</h1>
	<img class="contributor-photo" src="{{asset('storage/'.$contributor->photo)}}" width="200" />
	<form action="/pm/contributors/contributor/update/{{$contributor->id}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex-wrapper contributor-row">
			<label for="contributor-first-name">First Name:</label>
			<input id="contributor-first-name" type="text" name="firstName" value="{{$contributor->first_name}}" placeholder="Enter..."/>
		</div>
		<div class="flex-wrapper contributor-row">
			<label for="contributor-last-name">Last Name:</label>
			<input id="contributor-last-name" type="text" name="lastName" value="{{$contributor->last_name}}" placeholder="Enter..." />
		</div>
		<div class="flex-wrapper contributor-row">
			<label for="contributor-bio">Bio:</label>
			<textarea id="contributor-bio" name="bio" cols="" rows="bio">{{$contributor->bio}}</textarea>
		</div>
		<div class="flex-wrapper contributor-row">
			<label for="contributor-last-name">Profile Image:</label>
			<input id="contributor-last-name" type="file" accept="image/*" name="photo" />
		</div>
		<input class="btn" type="submit" />
	</form>
@endsection