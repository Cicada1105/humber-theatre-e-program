@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/productions/add.css") }}">
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
	<h1>Edit Production</h1>
	<img id="production-photo-preview" src="{{ asset('storage/'.$production->poster_img_src) }}" alt="" width="200">
	<form action="{{ url("/pm/production/update/{$production->id}") }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="flex-wrapper production-input-row">
			<label for="production-poster__photo">Production Poster:</label>
			<input id="production-poster__photo" type="file" accept="image/*" value="{{$production->poster_img_src}}" name="posterPhoto" onchange="handleFileChange(event)" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-poster__caption">Production Poster Caption:</label>
			<input id="production-poster__caption" type="text" name="posterCaption" value="{{$production->poster_img_caption}}" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-title">Title:</label>
			<input id="production-title" type="text" name="title" value="{{$production->title}}" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-authors">Authors:</label>
			<input id="production-authors" type="text" name="authors" value="{{$production->authors}}" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-blurb">Blurb:</label>
			<textarea id="production-blurb" name="blurb" required>{{$production->blurb}}</textarea>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-directors">Directors:</label>
			<input id="production-directors" type="text" name="directors" value="{{$production->directors}}" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-choreographers">Choreographers:</label>
			<input id="production-choreographers" type="text" name="choreographers" value="{{$production->choreographers}}">
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-dates">Dates:</label>
			<input id="production-dates" type="text" name="dates" value="{{$production->dates}}" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-location">Location:</label>
			<input id="production-location" type="text" name="location" value="{{$production->location}}" required>
		</div>
		<div class="flex-wrapper production-input-row">
			<label for="production-content-warning">Content Warning:</label>
			<textarea id="production-content-warning" name="contentWarning" required>{{$production->content_warning}}</textarea>
		</div>
		<input class="btn" type="submit" value="Update">
	</form>
@endsection