<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="login-status" content="{{ Auth::check() }}">
	{{-- <meta name="login-status" content="speriamo"> --}}
	<script src="https://unpkg.com/cart-localstorage@1.1.4/dist/cart-localstorage.min.js" type="text/javascript"></script>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' integrity='sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==' crossorigin='anonymous'/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="{{asset('css/front.css')}}">
	<title>Document</title>
</head>
<body>
	<div id="root"></div>
	<script src="{{asset('./js/front.js')}}"></script>
</body>
</html>