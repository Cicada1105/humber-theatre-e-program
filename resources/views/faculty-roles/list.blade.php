@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty-roles/list.css") }}">
@endsection

@section('main-content')
	<script type="text/javascript">
		function confirmation(e) {
			// Retrieve the button that submitted the event
			let btn = e.submitter;

			// Check if the btn submitted is the delete button (will have the faculty's name apart of its dataset)
			if (btn.dataset['name']) {
				// Confirm that the user wants to remove the selected faculty member
				let confirmedDelete = confirm(`Are you sure you want to remove ${btn.dataset['name']} faculty role?`);

				// If the user cancels, do nothing/do not submit the form
				if (!confirmedDelete){
					e.preventDefault();
				}	
			}
		}
	</script>
	<h1>List Faculty Role</h1>
	@if ($errors->any())
		{{$errors->first()}}
	@endif
	<form onsubmit="confirmation(event)">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button aria-label="Add New Faculty" class="add-btn" formaction="/pm/faculty-roles/add" formmethod="get">
				<fa class="fa-solid fa-plus">
			</button>
		</div>
		@foreach ($faculty_roles as $role)
			<div class="flex-wrapper role-row">
				<h3 class="role-row__title">{{ $role->role }}</h3>
				<div class="role-row-controls">
					<button aria-label="Edit {{ $role->role }} faculty role" class="edit-btn" formaction="/pm/faculty-roles/update/{{$role->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square">
					</button>
					<button aria-label="Delete {{ $role->role }} faculty role" onclick="confirmation" type="submit" class="delete-btn" formmethod="post" formaction="/pm/faculty-roles/delete/{{$role->id}}" data-name="{{ $role->role }}">
						<fa class="fa-solid fa-trash-can">
					</button>
				</div>
			</div>
		@endforeach
	</form>
@endsection