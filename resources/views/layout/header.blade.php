@php ($path = Str::of(Request::path())->explode("/"))
<header class="flex-container p1">
    {{-- @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}
    <a href="/">
    	<img id="page-header-logo" src="/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png" alt="Humber College Faculty of Media and Creative Arts Logo" />
    </a>
	<nav>
		<ul class="flex-container nav-list">
			{{--This if statement needs to be reworked to prevent appending useless if checks--}}
			@if ($path[0] !== "humber-theatre" and $path[0] !== "" and $path[0] !== "programs")
				<li class="nav-list__item">
					<a href="/{{$path[0]}}">About</a>
				</li>
				<li class="nav-list__item">
					<a href="/{{$path[0]}}/contributors">Contributors</a>
				</li>
			@endif
			<li class="nav-list__item">
				<a href="/programs">View Programs</a>
			</li>
			<li class="nav-list__item">
				<a href="/humber-theatre">Humber Theatre</a>
			</li>
		</ul>
	</nav>
</header>