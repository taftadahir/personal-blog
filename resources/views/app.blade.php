<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark transition duration-150 ease-in-out">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title inertia>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="icon" href="/favicon.png">
	<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!-- Scripts -->
	@routes
	@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
	@inertiaHead
</head>

<body class='text-base font-montserrat antialiased bg-white-50 dark:bg-black-500 no-scrollbar selection:text-primary-50 selection:bg-primary-500 line-numbers'>
	@inertia
</body>

</html>
