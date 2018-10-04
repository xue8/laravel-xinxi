<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>
		<meta name="description" content="@yield('description')" />
    	<meta name="keywords" content="@yield('keyword')" />
    	@yield('css')		
	</head>
	<body>
		@yield('main')
	</body>
	@yield('js')
</html>
