<header class="flex-container p1">
    <a href="/">
    	<img id="page-header-logo" src="/imgs/Faculty_of_Media_and_Creative_Arts_All-white.png" alt="Humber College Faculty of Media and Creative Arts Logo" />
    </a>
	<nav>
		<ul class="flex-container nav-list">
			<li class="nav-list__item">
				<a href="/">About</a>
			</li>
			<li class="nav-list__item">
				<a href="/contributors">Contributors</a>
			</li>
			<li class="nav-list__item">
				<a href="/humber-theatre">Humber Theatre</a>
			</li>
			@if (Auth::check())
				<li class="nav-list__item">
					<a href="/logout">Logout</a>
				</li>
			@else
				<li class="nav-list__item">
					<a href="/login">Login</a>
				</li>
			@endif
		</ul>
	</nav>
</header>