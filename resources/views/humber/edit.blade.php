@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/humber/edit.css") }}" />
@endsection

@section('main-content')
	<h3>Humber Theatre</h3>
	<form action="/pm/humber/update" method="post">
		{{ csrf_field() }}
		<div class='miscellandeous-section'>
			<label for="land-acknowledgment">Land Acknowledgment</label>
			<textarea id="land-acknowledgment" name="landAcknowledgment" cols="75" rows="4">{{ $active_program->land_acknowledgment }}</textarea>
		</div>
		<div class='miscellandeous-section'>
			<label for="about-humber">About Humber</label>
			<textarea id="about-humber" name="aboutHumber" cols="75" rows="4">{{ $active_program->about_humber }}</textarea>
		</div>
		<div class='miscellandeous-section'>
			<label for="special-thanks">Special Thanks</label>
			<textarea id="special-thanks" name="specialThanks" cols="75" rows="4">{{ $active_program->special_thanks }}</textarea>
		</div>
		<input class="btn" type="Submit" value="Update" />
	</form>
@endsection