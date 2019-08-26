<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="icon" type="image/png" href="{{URL::asset('/sekil/imageedit_5_2742361295.png')}}">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
		<link rel="stylesheet" href="{{ '/css/app.css' }}">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css"/>
		<link rel="stylesheet" href="{{ '/fontawesome/css/all.css' }}">
        <script src="{{ '/fontawesome/js/all.js' }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ '/css/admin.css' }}">
		<style type="text/css">
			.modalxx{
				position: fixed;
				top: 0;
				left: 0;
				z-index: 1050;
				display: block;
				width: 100%;
				height: 100%;
				overflow: hidden;
				outline: 0;
			}
		</style>
	</head>
	<body style="font-family: 'Nunito', sans-serif;">
		<div class="modal" tabindex="-1" role="dialog" style="display: block;">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="width: 100%;">
						<h5 class="modal-title ml-auto mr-auto">{{ $lang->lang1 }}</h5>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning ml-2 mr-2"><p style="text-align: center; margin-top: auto; margin-bottom: auto;">{{ $lang->lang2 }}</p></div>
						<form method="post" action="{{ route('login') }}">
							@csrf
							<div class="md-form">
								<i class="fas fa-envelope prefix" id="eml-img"></i>
								<input type="Email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off">
								<label for="email" id="emaillb" class="animasiya">E-mail:</label>
							</div>
							<div class="md-form">
								<i class="fas fa-lock prefix" id="psw-img"></i>
								<input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
								<label for="password" id="passwordlb" class="animasiya">{{ $lang->lang4 }}</label>
							</div>
							<div class="form-group">
	                            <div class="col-md-6 offset-md-4">
	                                <div class="form-check">
	                                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	                                    <label class="form-check-label" for="remember">
	                                        {{ $lang->lang3 }}
	                                    </label>
	                                </div>
	                            </div>
	                        </div>
							<div style="position: relative; float: right; margin-right: 10px;">
								<button type="submit" class="btn btn-primary ml-auto">{{ $lang->lang5 }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#email").on('focus', function(){
					$("#emaillb").addClass("anime2 turuncu-lbl");
					$(this).addClass("turuncu");
					$("#eml-img").addClass("svg-color");
				});
				$("#email").on('blur', function(){
					if ($(this).val()=="") {
						$("#emaillb").removeClass("anime2 turuncu-lbl");
					}
					else{
						$("#emaillb").removeClass("turuncu-lbl");
					}
					$(this).removeClass("turuncu");
					$("#eml-img").removeClass("svg-color");
				});
				$("#password").on('focus', function(){
					$("#passwordlb").addClass("anime turuncu-lbl");
					$(this).addClass("turuncu");
					$("#psw-img").addClass("svg-color");
				});
				$("#password").on('blur', function(){
					if ($(this).val()=="") {
						$("#passwordlb").removeClass("anime turuncu-lbl");
					}
					else{
						$("#passwordlb").removeClass("turuncu-lbl");
					}
					$(this).removeClass("turuncu");
					$("#psw-img").removeClass("svg-color");
				});
		});
			var inputs = document.querySelectorAll( '.inputfile' );
			Array.prototype.forEach.call( inputs, function( input )
			{
				var label	 = input.nextElementSibling,
					labelVal = label.innerHTML;
				input.addEventListener( 'change', function( e )
				{
					var fileName = '';
					if( this.files && this.files.length > 1 )
						fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
					else
						fileName = e.target.value.split( '/' ).pop();
					if( fileName )
						label.querySelector( 'span' ).innerHTML = fileName;
					else
						label.innerHTML = labelVal;
				});
			});
		</script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
	</body>
</html>