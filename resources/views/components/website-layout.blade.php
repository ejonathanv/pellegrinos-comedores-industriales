<!DOCTYPE html>
<head>
	<title>{{ env('APP_NAME') }}</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<script src="js/modernizr-2.6.2.min.js"></script>
    <script src="https://kit.fontawesome.com/133291f590.js" crossorigin="anonymous"></script>
	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="preloader">
		<div class="preloader_image pulse"></div>
	</div>
	<div id="canvas">
		<div id="box_wrapper">
			<x-website-header />
			{{ $slot }}
			<x-website-footer />
		</div>
	</div>
	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
</body></html>