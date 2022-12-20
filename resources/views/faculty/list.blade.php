@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty/list.css") }}">
@endsection

@section('main-content')
	<script type="text/javascript">
		function confirmation(e) {
			// Retrieve the button that submitted the event
			let btn = e.submitter;

			// Check if the btn submitted is the delete button (will have the faculty's name apart of its dataset)
			if (btn.dataset['name']) {
				// Confirm that the user wants to remove the selected faculty member
				let confirmedDelete = confirm(`Are you sure you want to remove ${btn.dataset['name']}?`);

				// If the user cancels, do nothing/do not submit the form
				if (!confirmedDelete){
					e.preventDefault();
				}	
			}
		}
	</script>
	<h1>Humber Theatre Faculty</h1>
	<a id="active-faculty__link" href="/pm/faculty/update">View Active Faculty</a>
	<form action='/pm/faculty/update' method="post" onsubmit="confirmation(event)">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button aria-label="Add New Faculty" class="add-btn" formaction="/pm/faculty/add" formmethod="get">
				<fa class="fa-solid fa-plus">
			</button>
		</div>
		@foreach ($faculty as $member)
			<div class="flex-wrapper member-row">
				<h3 class="member-row__title">{{ $member->first_name }} {{ $member->last_name }}</h3>
				<div class="member-row-controls">
					<button aria-label="Edit {{ $member->first_name }} {{ $member->last_name }} faculty" class="edit-btn" formaction="/pm/faculty/update/{{$member->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square">
					</button>
					<button aria-label="Delete {{ $member->first_name }} {{ $member->last_name }} faculty" onclick="confirmation" type="submit" class="delete-btn" formmethod="post" formaction="/pm/faculty/delete/{{$member->id}}" data-name="{{ $member->first_name }} {{ $member->last_name }}">
						<fa class="fa-solid fa-trash-can">
					</button>
				</div>
			</div>
		@endforeach
		<input class="btn" type="submit" value="Submit">
	</form>
@endsection