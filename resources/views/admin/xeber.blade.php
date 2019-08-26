<form method="post" action="{{ '/news/add' }}" enctype="multipart/form-data">
	@csrf
	<div>
		<h2 style="text-align: center;">{{ $lang->lang30 }}</h2>
	</div>
	<div class="md-form">
		<input type="text" id="xeberAdi" name="xeberAdi" class="form-control" autocomplete="off">
		<label for="xeberAdi" id="xeberAdilbl" class="animasiya">{{ $lang->lang32 }}</label>
	</div>
	<br><br>
	<div class="md-form amber-textarea active-amber-textarea">
		<i class="fas fa-pencil-alt prefix" id="txtimg"></i>
		<textarea name="xeberMetn" id="xeberMetn" class="md-textarea form-control" rows="3"></textarea>
		<label for="xeberMetn" id="xeberlbl" class="animasiya">{{ $lang->lang33 }}</label>
	</div>
	<input type="hidden" name="image" id="hiddenImg">
	<div class="row setir">
		<img src="" alt="" class="preview ml-auto mr-auto mt-3" id="xeberPreview">
	</div>
	<div class="row setir">
		<div class="ml-3">
			<button type="button" id="previewBtn" class="btn btn-primary" data-toggle="modal" data-target="#xeberModal">{{ $lang->lang34 }}</button>
		</div>
		<div class="ml-auto mr-3">
			<button type="submit" class="btn btn-primary gorunus" id="submit"> {{ $lang->lang35 }}</button>
		</div>
	</div>
</form>