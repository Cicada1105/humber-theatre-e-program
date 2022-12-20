@extends('layout.page_template', [ 'page' => 'Add' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/contributors/add.css") }}">
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
	<h1>Add Contributor</h1>
	<img id="contributor-photo-preview" src="/imgs/default_img.png" alt="" width="200">
	<form action="/pm/contributors/contributor/add" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex-wrapper contributor-info">
			<label for="contributor-first-name">First Name:</label>
			<input id="contributor-first-name" type="text" name="firstName" placeholder="Enter..." required>
		</div>
		<div class="flex-wrapper contributor-info">
			<label for="contributor-last-name">Last Name:</label>
			<input id="contributor-last-name" type="text" name="lastName" placeholder="Enter..." required>
		</div>
		<div class="flex-wrapper contributor-info">
			<label for="contributor-bio">Bio:</label>
			<textarea id="contributor-bio" name="bio" cols="" rows="bio" required></textarea>
		</div>
		<div class="flex-wrapper contributor-info">
			<label for="contributor-photo">Profile Image:</label>
			<input id="contributor-photo" type="file" accept="image/*" name="photo" oninput="handleFileChange(event)">
		</div>
		<input class="btn" type="submit" value="Submit">
	</form>
@endsection