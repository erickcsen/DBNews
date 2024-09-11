<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard DB News</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	{{-- css --}}
	@include('admin.layouts.css')

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body data-background-color="blue">
	<div class="wrapper">

		{{-- header --}}
		@include('admin.layouts.header')		
		
		{{-- Sidebar based on role --}}
		@if(auth()->check())
			@if(auth()->user()->isSuperAdmin())
				{{-- sidebar for super admin --}}
				@include('admin.layouts.sidebarSA')
			@endif
			@if(auth()->user()->isAdmin())
				{{-- sidebar for admin --}}
				@include('admin.layouts.sidebar')
			@endif
		@endif

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>

			{{-- footer --}}
			@include('admin.layouts.footer')

		</div>
		
		{{-- js --}}
		@include('admin.layouts.js')
		
	</div>
	
</body>
</html>
