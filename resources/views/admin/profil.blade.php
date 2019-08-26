<div class="m-3">
	<div class="setir mt-3">
		<div class="ml-3" data-toggle="modal" data-target="#profilModal">
			<img src="{{ URL::asset('/profil/'.$user->avatar) }}" class="profil--rounded" id="profil_sekil">
		</div>
		<div class="m-auto">
			<h3>{{ $user->name }}</h3>
		</div>
		<input type="hidden" name="image" id="profilPicImg">
	</div>
	<div class="setir">
		<h5 class="ml-3 mt-auto mb-auto">{{ $user->email }}</h5>
		<button class="btn bg-turuncu btn-sm ml-auto mr-5" id="editName" data-toggle="modal" data-target="#tesdiqModal">{{ $lang->lang50 }}</button>
	</div>
	<div class="md-form gorunus">
		<input type="email" id="newEmailInput" name="email" class="form-control" value="{{ $user->email }}" autocomplete="off" required>
		<label for="newEmailInput" id="newEmailInputlbl" class="animasiya">{{ $lang->lang39 }}</label>
	</div>
	<div class="md-form gorunus">
		<input type="password" id="newPasswordInput" name="password" class="form-control" value="{{ $user->email }}" autocomplete="off" required>
		<label for="newPasswordInput" id="newPasswordInputlbl" class="animasiya" value = "        ">{{ $lang->lang39 }}</label>
	</div>
	@csrf
	<div class="ml-3 mt-3 gorunus">
		<button class="btn bg-turuncu">
			{{ $lang->lang51 }}
		</button>
	</div>
</div>

<div class="modal fade" id="tesdiqModal" tabindex="-1" role="dialog" aria-labelledby="tesdiqModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tesdiqModalLabel"></h5>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>