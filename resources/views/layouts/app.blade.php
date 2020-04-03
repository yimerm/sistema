<!DOCTYPE html>
<html>
<head>
	<title>XIMER - @yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-dark bg-primary">
		<a href="#" class="navbar-brand">ximer</a>
	</nav>
	

	<div class="container"> 
		@yield('content')
	</div>

</body>
</html>