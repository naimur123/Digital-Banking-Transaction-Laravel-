<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

  
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<ul class="navbar-nav ml-auto" >
	<li class="nav-item">
	     @yield('navbar')
    </li>
	
	<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">SEE ALL LIST</a>
	<div class="dropdown-menu">
	       @yield('dropdown')
	</div>
	</li>
	<li class="nav-item">
	     @yield('logout')
    </li>

	
	</ul>
	</nav>

	<div id="main-content">
		@yield('content')
	</div>
	<br>
    

	
	<div id="main-content">
		@yield('search')
	</div>
	<div id="main-content">
		@yield('adminlist')
	</div>
	<div id="main-content">
		@yield('userlist')
	</div>
    
	<div id="main-content">
		@yield('managerlist')
	</div>
	<div id="main-content">
		@yield('edit')
	</div>
	<div id="main-content">
		@yield('createadmin')
	</div>
	<div id="main-content">
		@yield('createmanager')
	</div>
    <br>
    <br>
	<div id="footer">
		<p>copyright@2020</p>
	</div>
</body>
</html>