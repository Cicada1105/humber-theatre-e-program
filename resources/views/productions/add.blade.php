@extends('layout.page_template', [ 'page' => 'Add' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/productions/add.css") }}" />
@endsection

@section('main-content')
	<script type="text/javascript">
		function handleFileChange(e) {
			console.log(e);
			const img = document.getElementById("production-photo-preview");
			const input = document.getElementById('production-poster__photo');
			// Retrieve the file associated with the newly added image
			const imageFile = input.files[0];
			const imageObj = URL.createObjectURL(imageFile);

			img.src = imageObj;
		}
	</script>
	<h1>Add Production</h1>
	<img id="production-photo-preview" src="/imgs/default_img.png" alt="" width="200" />
	<form action="/pm/production/add" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex-wrapper production-info">
			<label for="production-poster__photo">Production Poster:</label>
			<input id="production-poster__photo" type="file" accept="image/*" name="posterPhoto" onchange="handleFileChange(event)" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-poster__caption">Production Poster Caption:</label>
			<input id="production-poster__caption" type="text" name="posterCaption" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-title">Title:</label>
			<input id="production-title" type="text" name="title" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-authors">Authors:</label>
			<input id="production-authors" type="text" name="authors" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-blurb">Blurb:</label>
			<textarea id="production-blurb" name="blurb"></textarea>
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-directors">Directors:</label>
			<input id="production-directors" type="text" name="directors" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-choreographers">Choreographers:</label>
			<input id="production-choreographers" type="text" name="choreographers" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-dates">Dates:</label>
			<input id="production-dates" type="text" name="dates" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-location">Location:</label>
			<input id="production-location" type="text" name="location" />
		</div>
		<div class="flex-wrapper production-info">
			<label for="production-content-warning">Content Warning:</label>
			<textarea id="production-content-warning" name="contentWarning"></textarea>
		</div>
		<input class="btn" type="submit" value="Add" />
	</form>
@endsection