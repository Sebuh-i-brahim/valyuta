@extends('admin.layout')
@section('title', 'Valyuta-Admin')
@section('content')

<div class="row">
	<div class="col-md-6 bag-color">
		<div id="xeber" class="m-3">
			@include("admin.xeber")
		</div>
		<div class="modal fade" id="xeberModal" tabindex="-1" role="dialog" aria-labelledby="xeberModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-auto mr-auto" id="xeberModalLabel">{{ $lang->lang34 }}</h5>
					</div>
					<div class="modal-body">
						<div id="xeberProfile" class="profile yuzFaiz">
							<div class="photo yuzFaiz">
								<input type="file" accept="image/*" id="img4">
								<div class="photo__helper yuzFaiz">
									<div class="photo__frame photo__ilk m-auto">
										<canvas class="photo__canvas"></canvas>
										<div class="message is-empty">
											<p class="message--desktop m-auto fontOlcu">{{ $lang->lang42 }}</p>
											<p class="message--mobile m-auto fontOlcu">{{ $lang->lang43 }}</p>
										</div>
										<div class="message is-loading">
											<i class="fa fa-2x fa-spin fa-spinner"></i>
										</div>
										<div class="message is-dragover">
											<i class="fa fa-2x fa-cloud-upload"></i>
											<p class="m-auto fontOlcu">{{ $lang->lang44 }}</p>
										</div>
										<div class="message is-wrong-file-type">
											<p class="m-auto fontOlcu">{{ $lang->lang45 }}</p>
											<p class="message--desktop m-auto fontOlcu">{{ $lang->lang42 }}</p>
											<p class="message--mobile m-auto fontOlcu">{{ $lang->lang43 }}</p>
										</div>
										<div class="message is-wrong-image-size">
											<p class="m-auto fontOlcu">{{ $lang->lang46 }}</p>
										</div>
									</div>
								</div>
								<div class="photo__options range__ilk ml-auto mr-auto">
									<div class="foto__flex">
										<div class="photo__zoom">
											<input type="range" class="zoom-handler">
										</div>
										<a href="javascript:;" class="remove">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $lang->lang48 }}</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveXeberBtn">{{ $lang->lang36 }}</button>
					</div>
				</div>
			</div>
		</div>
		<div id="admin" class="gorunus m-3">
			@include("admin.newadmin")
		</div>
		<div class="modal fade" id="newAdminModal" tabindex="-1" role="dialog" aria-labelledby="newAdminModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-auto mr-auto" id="newAdminModalLabel">{{ $lang->lang49 }}</h5>
					</div>
					<div class="modal-body">
						<div id="newAdminProfile" class="profile yuzFaiz">
							<div class="photo yuzFaiz">
								<input type="file" accept="image/*" id="imgAdmin">
								<div class="photo__helper yuzFaiz">
									<div class="photo__frame foto__profil m-auto">
										<canvas class="photo__canvas"></canvas>
										<div class="message is-empty">
											<p class="message--desktop m-auto fontOlcu">{{ $lang->lang42 }}</p>
											<p class="message--mobile m-auto fontOlcu">{{ $lang->lang43 }}</p>
										</div>
										<div class="message is-loading">
											<i class="fa fa-2x fa-spin fa-spinner"></i>
										</div>
										<div class="message is-dragover">
											<i class="fa fa-2x fa-cloud-upload"></i>
											<p class="m-auto fontOlcu">{{ $lang->lang44 }}</p>
										</div>
										<div class="message is-wrong-file-type">
											<p class="m-auto fontOlcu">{{ $lang->lang45 }}</p>
											<p class="message--desktop m-auto fontOlcu">{{ $lang->lang42 }}</p>
											<p class="message--mobile m-auto fontOlcu">{{ $lang->lang43 }}</p>
										</div>
										<div class="message is-wrong-image-size">
											<p class="m-auto fontOlcu">{{ $lang->lang46 }}</p>
										</div>
									</div>
								</div>
								<div class="photo__options foto__range ml-auto mr-auto">
									<div class="foto__flex">
										<div class="photo__zoom">
											<input type="range" class="zoom-handler">
										</div>
										<a href="javascript:;" class="remove">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $lang->lang48 }}</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveAdminBtn">{{ $lang->lang36 }}</button>
					</div>
				</div>
			</div>
		</div>
		<div id="profil" class="gorunus">
			@include("admin.profil")
		</div>

		<div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="profilModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-auto mr-auto" id="profilModalLabel">{{ $lang->lang49 }}</h5>
					</div>
					<div class="modal-body">
						<div id="profilProfile" class="profile yuzFaiz">
							<div class="photo yuzFaiz">
								<input type="file" accept="image/*" id="imgProfil">
								<div class="photo__helper yuzFaiz">
									<div class="photo__frame foto__profil m-auto">
										<canvas class="photo__canvas"></canvas>
										<div class="message is-empty">
											<p class="message--desktop m-auto fontOlcu">{{ $lang->lang42 }}</p>
											<p class="message--mobile m-auto fontOlcu">{{ $lang->lang43 }}</p>
										</div>
										<div class="message is-loading">
											<i class="fa fa-2x fa-spin fa-spinner"></i>
										</div>
										<div class="message is-dragover">
											<i class="fa fa-2x fa-cloud-upload"></i>
											<p class="m-auto fontOlcu">{{ $lang->lang44 }}</p>
										</div>
										<div class="message is-wrong-file-type">
											<p class="m-auto fontOlcu">{{ $lang->lang45 }}</p>
											<p class="message--desktop m-auto fontOlcu">{{ $lang->lang42 }}</p>
											<p class="message--mobile m-auto fontOlcu">{{ $lang->lang43 }}</p>
										</div>
										<div class="message is-wrong-image-size">
											<p class="m-auto fontOlcu">{{ $lang->lang46 }}</p>
										</div>
									</div>
								</div>
								<div class="photo__options foto__range ml-auto mr-auto">
									<div class="foto__flex">
										<div class="photo__zoom">
											<input type="range" class="zoom-handler">
										</div>
										<a href="javascript:;" class="remove">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $lang->lang48 }}</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" id="saveProfilBtn">{{ $lang->lang36 }}</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-4" class="gorunus">
			{{-- //... --}}
		</div>
	</div>
	@endsection

	@section('javascript')
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script>
	window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
	</script>
	<script src="js/profile-picture.js"></script>
	<script>
		$(document).ready(function(){
			$("#xeberMetn").on('focus', function(){
				$("#txtimg").addClass("svg-color");
				$("#xeberlbl").addClass("anime turuncu-lbl");
			});
			$("#xeberMetn").on('blur', function(){
				if ($(this).val()=="") {
					$("#xeberlbl").removeClass("anime turuncu-lbl");
				}
				else{
					$("#xeberlbl").removeClass("turuncu-lbl");
				}
				$("#txtimg").removeClass("svg-color");
				
			});
			$("#xeberAdi").on('focus', function(){
				$("#xeberAdilbl").addClass("anime turuncu-lbl");
				$(this).addClass("turuncu");
			});
			$("#xeberAdi").on('blur', function(){
				if ($(this).val()=="") {
					$("#xeberAdilbl").removeClass("anime turuncu-lbl");
				}
				else{
					$("#xeberAdilbl").removeClass("turuncu-lbl");
				}
				$(this).removeClass("turuncu");
			});
			$("#profilBtn").on('click',function(){
				$(this).addClass("activeBtn");
				$("#xeber").addClass("gorunus");
				$("#admin").addClass("gorunus");
				$("#profil").removeClass("gorunus");
				$("#profil").addClass("animated fadeIn fast");
				$("#xeberAddBtn").removeClass("activeBtn");
				$("#adminAddBtn").removeClass("activeBtn");
			});
			$("#xeberAddBtn").on('click',function(){
				$(this).addClass("activeBtn");
				$("#profil").addClass("gorunus");
				$("#admin").addClass("gorunus");
				$("#xeber").removeClass("gorunus");
				$("#xeber").addClass("animated fadeIn fast");
				$("#profilBtn").removeClass("activeBtn");
				$("#adminAddBtn").removeClass("activeBtn");
			});
			$("#adminAddBtn").on('click',function(){
				$(this).addClass("activeBtn");
				$("#profil").addClass("gorunus");
				$("#xeber").addClass("gorunus");
				$("#admin").removeClass("gorunus");
				$("#admin").addClass("animated fadeIn fast");
				$("#profilBtn").removeClass("activeBtn");
				$("#xeberAddBtn").removeClass("activeBtn");
			});
			var x, a, p;
			x = new profilePicture('#xeberProfile');
			$("#saveXeberBtn").on('click', function() {
		        $("#xeberPreview").show().attr('src',x.getAsDataURL());
		        $("#submit").removeClass("gorunus");
		        $("#hiddenImg").val(x.getAsDataURL());
		    });
		    a = new profilePicture('#newAdminProfile');
			$("#saveAdminBtn").on('click', function() {
		        $("#newAdminPreview").show().attr('src',a.getAsDataURL());
		        $("#newAdminImg").val(a.getAsDataURL());
		    });
		    p = new profilePicture('#profilProfile','{{ URL::asset('/profil/'.$user->avatar) }}');
			$("#saveProfilBtn").on('click', function() {
		        $("#profil_sekil").attr('src',p.getAsDataURL());
		        $("#profilPicImg").val(p.getAsDataURL());
		    });
		});
	</script>
	@endsection