<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>CookBook</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style-iconmoon.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>

	<div class="container-fluid main">

	@yield('content')
	
	</div>

	<div id="footer" class="col-xs-12 text-center">
		<div class="col-xs-offset-4 col-xs-4">
			<h2 class="footer-text">TheCookBook<sup>&#169;</sup> 2017</h2>
		</div>
		<div class="col-xs-4">
			<h2 id="icon">
				<span class="icon-facebook2"></span>
				<span class="icon-twitter"></span>
				<span class="icon-tumblr2"></span>
			</h2>
		</div>
	</div>

	<script type="text/javascript" src="vendors/jQuery.js"></script>
	<script type="text/javascript" src="vendors/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendors/circle-progress.min.js"></script>
	<script type="text/javascript" src="js/cycler.js"></script>
</body>
</html>