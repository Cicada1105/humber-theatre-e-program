@extends('layout.page_template', [ 'page' => 'Edit' ])

@section('styles')
	<link rel="stylesheet" href="/css/humber/edit.css" />
@endsection

@section('main-content')
	<form action="/pm/humber/update" method="post">
		<div class='miscellandeous-section'>
			<label for="land-acknowledgment">Land Acknowledgment</label>
			<textarea id="land-acknowledgment" cols="75" rows="4">{{ $active_program->land_acknowledgment }}</textarea>
		</div>
		<div class='miscellandeous-section'>
			<label for="about-humber">About Humber</label>
			<textarea id="about-humber" cols="75" rows="4">{{ $active_program->about_humber }}</textarea>
		</div>
		<div class='miscellandeous-section'>
			<label for="special-thanks">Special Thanks</label>
			<textarea id="special-thanks" cols="75" rows="4">{{ $active_program->special_thanks }}</textarea>
		</div>
		<input type="Submit" value="Update" />
	</form>
	<form class="involved-faculty-section" action="/pm/humber/update" method="post">
		<div class="flex-wrapper involved-faculty">
			<select id="senior-dean">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['senior_dean'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="senior-dean">Senior Dean, Faculty of Media and Creative Arts</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="associate-dean">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['associate_dean'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="associate-dean">Associate Dean, Faculty of Media and Creative Arts</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_carpentry">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_carpentry'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_carpentry">Faculty Department Head of Carpentry</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="theatre_director">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['theatre_director'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="theatre_director">Director Theatre Production</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_properties">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_properties'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_properties">Faculty Department Head of Properties</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="voice_professor">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['voice_professor'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="voice_professor">Voice Professor, Vocal Research</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="academic_program_manager">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['academic_program_manager'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="academic_program_manager">Academic Program Manager</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_lighting">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_lighting'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_lighting">Faculty Department Head of Lighting</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_wardrobe">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_wardrobe'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_wardrobe">Faculty Department Head of Wardrobe</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_movement">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_movement'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_movement">Head of Movement, Movement Director</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_sound">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_sound'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_sound">Faculty Department Head of Sound</label>
		</div class="flex-wrapper involved-faculty">
		<div class="flex-wrapper involved-faculty">
			<select id="head_of_paint">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['head_of_paint'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="head_of_paint">Faculty Department Head of Paint</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="technical_director">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['technical_director'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="technical_director">Technical Director</label>
		</div>
		<div class="flex-wrapper involved-faculty">
			<select id="pso">
				@foreach($faculty as $member)
					{{Str::of("<option value=${member['id']} " . ($active_program['pso'] == $member['id'] ? "selected" : "") . ">${member['first_name']} ${member['last_name']}</option>")->toHtmlString()}}
				@endforeach
			</select>
			<label for="pso">PSO</label>
		</div>
		<input type="submit" value="Update" />
	</form>
@endsection