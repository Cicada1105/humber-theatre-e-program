@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/contributors/list.css") }}">
@endsection

@section('main-content')
	<script type="text/javascript">
		function confirmation(e) {
			// Retrieve the button that submitted the event
			let btn = e.submitter;

			// Check if the btn submitted is the delete button (will have the faculty's name apart of its dataset)
			if (btn.dataset['name']) {
				// Confirm that the user wants to remove the selected faculty member
				let confirmedDelete = confirm(`Are you sure you want to remove ${btn.dataset['name']} and all of the contributions?`);

				// If the user cancels, do nothing/do not submit the form
				if (!confirmedDelete){
					e.preventDefault();
				}
			}
		}
	</script>
	<h1>Contributors of {{ $active_program->title }}</h1>
	@if (isset($photo))
		@if($photo)
			Exists
		@else
			Doesn't exists
		@endif
	@endif
	@if ($errors->any())
		<p class="error">{{$errors->first()}}</p>
	@endif
	<form action='/pm/contributors/update' method="post" onsubmit="confirmation(event)">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button aria-label="Add Contributor" class="add-btn" formaction="/pm/contributors/contributor/add" formmethod="get">
				<fa class="fa-solid fa-plus">
			</button>
		</div>
		<p id="active-contributors__text">Active Contributors</p>
		@foreach ($contributors as $contributor)
			@php
				$contribution = $contributor->contributions->firstWhere("production_id", $active_program->id);
				$isContributor = $contribution !== null;
			@endphp
			<section class="flex-wrapper contributor-row">
				<input aria-label="{{$contributor->first_name}} {{$contributor->last_name}} is active contributor toggle" class="contributor-row__toggle" type="checkbox" name="contributors[{{$contributor->id}}][is_active]" {{ $isContributor ? "checked" : "" }}>
				<h3 class="contributor-row__title">{{ $contributor->first_name }} {{ $contributor->last_name }}</h3>
				<div>
					<label for="{{$contributor->first_name}}-{{$contributor->last_name}}-role">Role:</label>
					<input id="{{$contributor->first_name}}-{{$contributor->last_name}}-role" type="text" name="contributors[{{$contributor->id}}][role]" value="{{ $isContributor ? $contribution->role : ""}}">
				</div>
				<select value="" name="contributors[{{$contributor->id}}][category]">
					@php($categoryName = $isContributor ? $contribution->category : "");
					<option aria-hidden="true" disabled selected>--Category--</option>
					<option value="performance" {{$isContributor && $categoryName=="performance" ? "selected" : ""}}>Performance</option>
					<option value="guest_artist" {{$isContributor && $categoryName=="guest_artist" ? "selected" : ""}}>Guest Artist</option>
					<option value="production" {{$isContributor && $categoryName=="production" ? "selected" : ""}}>Production</option>
				</select>
				<div class="contributor-row-controls">
					<button aria-label="Edit {{ $contributor->first_name }} {{ $contributor->last_name }} contributor" class="edit-btn" formaction="/pm/contributors/contributor/update/{{$contributor->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square">
					</button>
					<button aria-label="Delete {{ $contributor->first_name }} {{ $contributor->last_name }} contributor" type="submit" class="delete-btn" formmethod="post" formaction="/pm/contributors/contributor/delete/{{$contributor->id}}" data-name="{{ $contributor->first_name }} {{ $contributor->last_name }}">
						<fa class="fa-solid fa-trash-can">
					</button>
				</div>
			</section>
		@endforeach
		<input class="btn" type="submit" value="Submit">
	</form>
@endsection