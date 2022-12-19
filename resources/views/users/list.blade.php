@extends('layout.page_template', [ 'page' => 'List' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/users/list.css") }}" />
@endsection

@section('main-content')
	<script type="text/javascript">
		function confirmation(e) {
			// Retrieve the button that submitted the event
			let btn = e.submitter;

			// Check if the btn submitted is the delete button (will have the faculty's name apart of its dataset)
			if (btn.dataset['name']) {
				// Confirm that the user wants to remove the selected faculty member
				let confirmedDelete = confirm(`Are you sure you want to remove the user ${btn.dataset['name']}?`);

				// If the user cancels, do nothing/do not submit the form
				if (!confirmedDelete){
					e.preventDefault();
				}
			}
		}
	</script>
	<h1>List Users</h1>
	<form onsubmit="confirmation(event)">
		{{ csrf_field() }}
		<div class="flex-wrapper add-btn-cont">
			<button class="add-btn" formaction="/pm/users/add" formmethod="get">
				<fa class="fa-solid fa-plus" />
			</button>
		</div>
		@foreach($users as $user)
			<div class="flex-wrapper user-row">
				<h3>{{$user->name}}</h3>
				<p>{{$user->email}}</p>
				<div class="user-controls">
					<button class="edit-btn" formaction="/pm/users/update/{{$user->id}}" formmethod="get">
						<fa class="fa-solid fa-pen-to-square" />
					</button>
					<button type="submit" class="delete-btn" formmethod="post" formaction="/pm/users/delete/{{$user->id}}" data-name="{{ $user->name }}">
						<fa class="fa-solid fa-trash-can" />
					</button>
				</div>
			</div>
		@endforeach
	</form>
@endsection