@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="/css/contributors/edit.css" />
@endsection

@section('main-content')
	<script type="text/javascript">
		function handleFileChange(e) {
			console.log(e);
			const img = document.getElementById("contributor-photo-preview");
			const input = document.getElementById('contributor-photo');
			// Retrieve the file associated with the newly added image
			const imageFile = input.files[0];
			const imageObj = URL.createObjectURL(imageFile);

			img.src = imageObj;
		}
	</script>
	<h1>Edit Contributor</h1>
	<img id="contributor-photo-preview" src="{{$contributor->photo ? asset('storage/'.$contributor->photo) : "/imgs/default_img.png"}}" width="200" />
	<form action="/pm/contributors/contributor/update/{{$contributor->id}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex-wrapper contributor-info">
			<label for="contributor-first-name">First Name:</label>
			<input id="contributor-first-name" type="text" name="firstName" value="{{$contributor->first_name}}" placeholder="Enter..."/>
		</div>
		<div class="flex-wrapper contributor-info">
			<label for="contributor-last-name">Last Name:</label>
			<input id="contributor-last-name" type="text" name="lastName" value="{{$contributor->last_name}}" placeholder="Enter..." />
		</div>
		<div class="flex-wrapper contributor-info">
			<label for="contributor-bio">Bio:</label>
			<textarea id="contributor-bio" name="bio" cols="" rows="bio">{{$contributor->bio}}</textarea>
		</div>
		<div class="flex-wrapper contributor-info">
			<label for="contributor-photo">Profile Image:</label>
			<input id="contributor-photo" type="file" accept="image/*" name="photo" oninput="handleFileChange(event)" />
		</div>
		<input class="btn" type="submit" />
	</form>
@endsection