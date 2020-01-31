
<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link rel="icon" type="image/png" href="{{URL::asset('/sekil/imageedit_5_2742361295.png')}}">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
		<link rel="stylesheet" href="{{ '/css/app.css' }}">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
		<link href="{{ '/css/style.css' }}" rel="stylesheet">
		<link href="{{ '/css/style2.css' }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css"/>
		@yield('css')
	</head>
	<body background="{{URL::asset('/sekil/pul.jpg')}}" style="font-family: 'Nunito', sans-serif;">
		<div class="boyuk">
			<div class="navbar navbar-expand-lg">
				<div class="nav-item mr-auto">
					<h2 style="color:white;" id="lang-1">{{ $lang->lang1 }}</h2>
				</div>
				<div class="nav-item input-group lang-grup">
					<div class="ml-auto mr-auto dil-flex">
						<form method="get" action="@yield('az')">
							<button type="submit" class="lang-btn" id="azbtn" value="az" name="lang">
								<img src="{{URL::asset('/sekil/aze.svg')}}" class="lang-img"><span>Az</span>
							</button>
						</form>
						<form method="get" action="@yield('en')">
							<button type="submit" class="lang-btn" id="engbtn" value="en" name="lang">
							<img src="{{URL::asset('/sekil/uke.png')}}" class="lang-img"><span>Eng</span>
							</button>
						</form>
						<form method="get" action="@yield('ru')">
							<button type="submit" class="lang-btn" id="rubtn" value="ru" name="lang">
							<img src="{{URL::asset('/sekil/rus.svg')}}" class="lang-img"><span>Ru</span>
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="navbar navbar-expand-lg nav2bar">
				<div class="nav-item">
					<div class="logo-Div">
						<img src="{{URL::asset('/sekil/imageedit_5_2742361295.png')}}" class="logo-img">
					</div>
				</div>
				<div class="nav-item" style="height: 45px;">
					<a href="" class="nav-link">
						<h3 style="color:white;" id="lang-2">{{ $lang->lang2 }}</h3>
					</a>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#togl-item" aria-controls="togl-item" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-tog-iconu" style="z-index: 1; background-image: url({{URL::asset('/sekil/menu.svg')}});"></span>
				</button>
				<div class="collapse navbar-collapse" id="togl-item">
					<div class="navbar-nav ml-auto mr-auto">
						<div class="nav-item">
							<a href="/" class="nav-link linkler @yield('inclass')" id="lang-3">{{$lang->lang3}}</a>
						</div>
						<div class="nav-item">
							<a href="/exchange" class="nav-link linkler @yield('exclass')" id="lang-4">{{ $lang->lang4 }}</a>
						</div>
						<div class="nav-item">
							<a href="/news" class="nav-link linkler @yield('newclass')" id="lang-5">{{ $lang->lang5 }}</a>
						</div>
					</div>
				</div>
			</div>
			<div class="jumbotron konverter">
				@yield('content')
			</div>
		</div>
		@yield('javascript')
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
	</body>
</html>
			

	