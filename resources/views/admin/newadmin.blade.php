<form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
	@csrf
	<div>
		<h2 style="text-align: center;">{{ $lang->lang41 }}</h2>
	</div>
	<div class="md-form">
		<input type="text" id="nameInput" name="name" class="form-control" autocomplete="off" required>
		<label for="nameInput" id="nameInputlbl" class="animasiya">{{ $lang->lang37 }}</label>
	</div>
	<br>
	<div class="md-form">
		<input type="email" id="emailInput" name="email" class="form-control" autocomplete="off" required>
		<label for="emailInput" id="emailInputlbl" class="animasiya">{{ $lang->lang38 }}</label>
	</div>
	<br>
	<div class="md-form">
		<input type="password" id="passwordInput" name="password" class="form-control" autocomplete="off" required>
		<label for="passwordInput" id="passwordInputlbl" class="animasiya">{{ $lang->lang39 }}</label>
	</div>
	<br>
	<div class="md-form">
		<input type="password" id="password2Input" name="password_confirmation" class="form-control" autocomplete="off" required>
		<label for="password2Input" id="password2Inputlbl" class="animasiya">{{ $lang->lang40 }}</label>
	</div>
	<input type="hidden" name="image" id="newAdminImg">
	<div class="setir">
			<div class="ml-auto mr-auto mt-3">
				<img src="" alt="" class="preview--rounded" id="newAdminPreview">
			</div>
		</div>
	<div class="row en100">
		<div class="setir m-3">
			<div>
				<button type="button" id="newAdminPreviewBtn" class="btn btn-primary" data-toggle="modal" data-target="#newAdminModal">{{ $lang->lang47 }}</button>
			</div>
			<div class="ml-auto">
				<button type="submit" class="btn btn-primary" id="submitAdmin"> {{ $lang->lang35 }}</button>
			</div>
		</div>
	</div>
</form>