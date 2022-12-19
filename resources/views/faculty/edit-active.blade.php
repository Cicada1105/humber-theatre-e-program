@extends('layout.page_template', [ 'page' => 'Details' ])

@section('styles')
	<link rel="stylesheet" href="{{ url("/css/faculty/edit-active.css") }}" />
@endsection

@section('main-content')
	<h1>Faculty Details</h1>
	<form action="/pm/faculty/update" method="post">
		{{ csrf_field() }}
		<div class="flex-wrapper involved-faculty">
			<select id="senior-dean" name="seniorDean" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['senior_dean'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="senior-dean">Senior Dean, Faculty of Media and Creative Arts</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="associate-dean" name="associateDean" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['associate_dean'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="associate-dean">Associate Dean, Faculty of Media and Creative Arts</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-carpentry" name="headOfCarpentry" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_carpentry'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-carpentry">Faculty Department Head of Carpentry</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="theatre-director" name="theatreDirector" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['theatre_director'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="theatre-director">Director Theatre Production</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-properties" name="headOfProperties" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_properties'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-properties">Faculty Department Head of Properties</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="voice-professor" name="voiceProfessor" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['voice_professor'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="voice-professor">Voice Professor, Vocal Research</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="academic-program-manager" name="academicProgramManager" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['academic_program_manager'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="academic-program-manager">Academic Program Manager</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-lighting" name="headOfLighting" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_lighting'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-lighting">Faculty Department Head of Lighting</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-wardrobe" name="headOfWardrobe" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_wardrobe'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-wardrobe">Faculty Department Head of Wardrobe</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-movement" name="headOfMovement" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_movement'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-movement">Head of Movement, Movement Director</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-sound" name="headOfSound" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_sound'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-sound">Faculty Department Head of Sound</label>
		</div class="flex-wrapper involved-faculty">
		<div class="flex-wrapper involved-faculty">
			<select id="head-of-paint" name="headOfPaint" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_paint'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head-of-paint">Faculty Department Head of Paint</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="technical-director" name="technicalDirector" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['technical_director'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="technical-director">Technical Director</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="pso" name="pso" required>
				<option selected disabled>--Select--</option>
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['pso'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="pso">PSO</label>
		</div>
		<input class="btn" type="submit" value="Update" />
	</form>
@endsection