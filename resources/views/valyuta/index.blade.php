@extends('layout.valyuta')

@section('title', 'Valyuta')

@section('az', '/home/az')

@section('en', '/home/en')

@section('ru', '/home/ru')

@section('inclass', 'activeBtn')

@section('content')
<div class="jumbotron konverter">
	<div class="con-verter"><h1 id="lang-6" style="text-align: center;">{{ $lang->lang6 }}</h1></div>
	<div class="row ml-auto mr-auto" style="margin-top: 20px;">
		<div class="col-lg mebleg-lg-4 ml-auto">
			<span for="#mebleg" id="lang-7" class="forSpan">{{ $lang->lang7 }}</span>
			<input type="text" name="mebleg" class="form-control inp-mebleg" id="mebleg" placeholder="{{   $lang->mebleg }}" style="text-align: right; font-size: 1.2em;">
		</div>
		<div class="col-lg-4 from-lg-4 mx-auto" style="display: block; position: relative;">
			<span for="#inputFrom" style="display: block; " id="lang-8" class="forSpan">{{ $lang->lang8 }}</span>
			<div class="btn-group">
				<div class="dropdown">
					<button type="button" id="drpMenuBtn" onclick="dropisdown();" class="drpMenuBtn valyuta-btn">
					<div class="fromto" id="forinput" style="width: 10px;">
						<input type="text" name="axtar1" class="curaxtar" id="input1" style="width: 0;" placeholder="{{ $lang->input1 }}">
					</div>
					<div id="fromVal" class="fromVal">
						<img src="{{ URL::asset($flag[8]) }}" class="btn-img" id="fromSekil">
						<div class="btn-txt">
							<span class="btn-txt-by" id="fromCurrency">{{ $pul[8]['targetCurrency'] }}</span>
							<span class="btn-txt-kc" id="fromCurName">{{ $pul[8]['targetName']}}</span>
						</div>
					</div>
					<span class="drp-span"><img src="{{  URL::asset('/sekil/expand-button.svg') }}" class="drp-img" id="tgl-img"></span>
					</button>
					<div class="dropdown-menu dropdown-menu-right drp-menyu" id="drop-menyu" style="max-height: 280px;overflow-y : auto; overflow-x: hidden;">
						@for($i=0; $i < count($pul); $i++)
						<label style="display: inline;" class="labelity">
							<button class="dropdown-item drpsel" value="{{ $pul[$i]['targetName'] }},{{ $pul[$i]['targetCurrency'] }},{{ $flag[$i] }},{{ $pul[$i]['inverseRate'] }}" onclick="fromSelect(this.value);">
							<img src="{{ URL::asset($flag[$i]) }}" class="drp-sel-img">
							<span class="drp-sel">{{ $pul[$i]['targetCurrency'] }}</span>
							<p class="drp-sel">{{ $pul[$i]['targetName'] }}</p>
							</button>
							<div class="dropdown-divider"></div>
						</label>
						@endfor
						
						<span class="dropdown-item drp-sel" style="display: none;" id="sehv">{{ $lang->sehv }}</span>
					</div>
					<input type="hidden" id="fromHidden" value="{{ $pul[8]['inverseRate'] }}">
				</div>
				<div class="div-buton-deyis" style="display: inline-block;">
					<button class="deyis-btn" id="deyisBtn">
					<img src="{{  URL::asset('/sekil/left-right.png') }}" class="img-sol-sag">
					</button>
				</div>
			</div>
			
		</div>
		<div class="form-group col-lg to-lg mr-auto">
			<div class="dropdown">
				<span for="#drpduyme" style="display: block;" id="lang-9" class="forSpan">{{ $lang->lang9 }}</span>
				<div class="btn-group">
					
					<button type="button" id="drpduyme" onclick="asagiDus();" class="drpMenuBtn valyuta-btn">
					<div class="fromto" id="fordaxil" style="width: 10px;">
						<input type="text" name="axtartap" class="curaxtar" id="daxil" style="width: 0;" placeholder="{{ $lang->daxil }}">
					</div>
					<div id="valDan" class="fromVal">
						<img src="{{  URL::asset($flag[140]) }}" class="btn-img" id="toSekil">
						<div class="btn-txt">
							<span class="btn-txt-by" id="toCurrency"><?php echo $pul[140]['targetCurrency'];?></span>
							<span class="btn-txt-kc" id="toCurName"><?php echo $pul[140]['targetName'];?></span>
						</div>
					</div>
					<span class="drp-span"><img src="{{  URL::asset('/sekil/expand-button.svg') }}" class="drp-img" id="asagi-img"></span>
					</button>
					<div class="dropdown-menu dropdown-menu-right drp-menyu" id="dus-menyu" style="max-height: 280px;overflow-y : auto; overflow-x: hidden;">
						<?php
							for ($i=0; $i < count($pul); $i++) {
								echo '<label style="display: inline;" class="labelity"><button class="dropdown-item drpsel" value="'.$pul[$i]['targetName'].','.$pul[$i]['targetCurrency'].','.$flag[$i].','.$pul[$i]['inverseRate'].'" onclick="toSelect(this.value);"><img src="'.URL::asset($flag[$i]).'" class="drp-sel-img"><span class="drp-sel">'.$pul[$i]['targetCurrency'].' </span><p class="drp-sel">'.$pul[$i]['targetName'].'</p></button><div class="dropdown-divider"></div></label>';
								}
						?>
						<span class="dropdown-item drp-sel" style="display: none;" id="false">{{ $lang->false }}</span>
					</div>
					<input type="hidden" id="toHidden" value="<?php echo $pul[140]['inverseRate'];?>">
				</div>
			</div>
		</div>
	</div>
	<div class="div-net">
		<div class="neticeDiv ml-auto mr-auto">
			<div style="display: inline-block;">
				<div class="container">
					<div class="box" >
						<div class="chart" data-percent="100" id="lang-12" title="{{ $lang->lang12 }}">
							<div id="chart"></div>
							<button class="stopBtn" id="stopBtn" onclick="dayan();"></button>
							<button class="stopBtn" id="stopBtn2" style="display: none;"  onclick="davam();">
							<img src="{{  URL::asset('/sekil/play-circle.svg') }}" class="playPause">
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="timer" style="display: none;" id="neticeDiv">
				<h2 id="lang-11">{{ $lang->lang11 }}</h2>
				<h3 id="netice-h3">
				<span id="meblegNet" style="font-weight: bold;"></span>
				<span id="fromNet"></span>
				<span> = </span>
				<span id="netice" style="font-weight: bold;"></span>
				<span id="toNet"></span>
				</h3>
			</div>
			<div id="update-time">
				<div style="display: inline-block;">
					<span id="lang-10" style="display: inline;">{{ $lang->lang10 }}</span>
					<span style="display: inline;">: <?php echo $pubdate; ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	yukleme();
$(document).ready(function(){
	
	$("#input1").on('focus', function (){
		$("#drpMenuBtn").addClass("valyuta-btn-focus");
	});
	$("#input1").on('blur', function (){
		$("#drpMenuBtn").removeClass("valyuta-btn-focus");
	});
	$("#daxil").on('focus', function (){
		$("#drpduyme").addClass("valyuta-btn-focus");
	});
	$("#daxil").on('blur', function (){
		$("#drpduyme").removeClass("valyuta-btn-focus");
	});
	$("#drpMenuBtn").on('click', function() {
		if ($("#forinput").width() == 10) {
			if ($(window).width() > 576) {
				$("#forinput").width(250);
				$("#input1").width(240);
				$("#fromVal").hide();
				$("#input1").focus();
				$("#tgl-img").attr("src","{{  URL::asset('/sekil/close-button.svg') }}");
			}else{
				document.getElementById('forinput').style.width = "80%";
				document.getElementById('input1').style.width = "100%";
				$("#fromVal").hide();
				$("#input1").focus();
				$("#tgl-img").attr("src","{{  URL::asset('/sekil/close-button.svg') }}");
			}
		}else{
			$("#forinput").width(10);
			$("#input1").width(0);
			$("#input1").blur();
			$("#input1").val("");
			$("#fromVal").show();
			$("#tgl-img").attr("src","{{  URL::asset('/sekil/expand-button.svg') }}");
		}
	});
	$("#drpduyme").on('click', function() {
	if ($("#fordaxil").width() == 10) {
		if ($(window).width() > 576) {
			$("#fordaxil").width(250);
			$("#daxil").width(240);
			$("#valDan").hide();
			$("#daxil").focus();
			$("#asagi-img").attr("src","{{  URL::asset('/sekil/close-button.svg') }}");
		}else{
			document.getElementById('fordaxil').style.width = "80%";
			document.getElementById('daxil').style.width = "90%";
			$("#valDan").hide();
			$("#daxil").focus();
			$("#asagi-img").attr("src","{{  URL::asset('/sekil/close-button.svg') }}");
		}
		
	}else{
		$("#fordaxil").width(10);
		$("#daxil").width(0);
		$("#daxil").blur();
		$("#daxil").val("");
		$("#valDan").show();
		$("#asagi-img").attr("src","{{  URL::asset('/sekil/expand-button.svg') }}");
	}
	});
	$(document).click(function(event) {
	$target = $(event.target);
	if(!$target.closest('#drpMenuBtn').length && !$target.closest('#drop-menyu').length){
	$("#forinput").width(10);
		$("#input1").width(0);
		$("#input1").val("");
		$("#fromVal").show();
		$("#tgl-img").attr("src","{{  URL::asset('/sekil/expand-button.svg') }}");
		$("#drop-menyu").removeClass("show-bat");
	}
	if(!$target.closest('#drpduyme').length && !$target.closest('#dus-menyu').length){
	$("#fordaxil").width(10);
		$("#daxil").width(0);
		$("#daxil").val("");
		$("#valDan").show();
		$("#asagi-img").attr("src","{{  URL::asset('/sekil/expand-button.svg') }}");
		$("#dus-menyu").removeClass("show-bat");
	}
	});
	var noResult = $("#sehv");
	$("#input1").on("keyup", function() {
		var uygun = false;
	var value = $(this).val().toLowerCase();
	$("#drop-menyu label").filter(function() {
	$(this).toggle($(this).find("p").text().toLowerCase().indexOf(value) > -1);
	var net = ($(this).find("p").text().toLowerCase().indexOf(value) > -1);
			if(net == true){
			uygun = true;
			}
	});
	noResult.toggle(!uygun);
	});
	var nResult = $("#false");
	$("#daxil").on("keyup", function() {
		var uygunx = false;
	var valuex = $(this).val().toLowerCase();
	$("#dus-menyu label").filter(function() {
	$(this).toggle($(this).find("p").text().toLowerCase().indexOf(valuex) > -1);
	var netx = ($(this).find("p").text().toLowerCase().indexOf(valuex) > -1);
		if(netx == true){
			uygunx = true;
		}
	});
	nResult.toggle(!uygunx);
	});
	$("#mebleg").on("keyup", function() {
		var frommeb = $("#fromHidden").val();
		var tomeb = $("#toHidden").val();
		var mebleg = $("#mebleg").val().split(",").join("");
		if(mebleg !== NaN && mebleg != ""){
			$("#neticeDiv").show();
			var neticMeb = Math.round(mebleg * frommeb / tomeb * 10000) /10000;
			$("#netice").html(vergul(neticMeb));
			$("#meblegNet").html(vergul(mebleg));
			$("#fromNet").html($("#fromCurName").html());
			$("#toNet").html($("#toCurName").html());
		}else{
			$("#neticeDiv").hide();
		}
	});
	$("#deyisBtn").on('click', function() {
		var fromSekil = $("#fromSekil").attr("src");
		var fromCurrency = $("#fromCurrency").html();
		var fromCurName = $("#fromCurName").html();
		var fromHidden = $("#fromHidden").val();
		var toSekil = $("#toSekil").attr("src");
		var toCurrency = $("#toCurrency").html();
		var toCurName = $("#toCurName").html();
		var toHidden = $("#toHidden").val();
		$("#fromSekil").attr("src",toSekil);
		$("#fromCurrency").html(toCurrency);
		$("#fromCurName").html(toCurName);
		$("#fromHidden").val(toHidden);
		$("#toSekil").attr("src",fromSekil);
		$("#toCurrency").html(fromCurrency);
		$("#toCurName").html(fromCurName);
		$("#toHidden").val(fromHidden);
		var mebleg = $("#mebleg").val().split(",").join("");
		if(mebleg !== NaN){
			var neticeMeb = Math.round(mebleg *  $("#fromHidden").val()/$("#toHidden").val() * 10000)/10000;
			$("#netice").html(vergul(neticeMeb));
			$("#meblegNet").html($("#mebleg").val());
			$("#fromNet").html($("#fromCurName").html());
			$("#toNet").html($("#toCurName").html());
		}
	});
	var inp, slc1, slc2, men, i, a, KeyID;
	$("#mebleg").on('keyup',function(event){
		inp = $(this).val();
		KeyID = event.keyCode;
		if(inp.length > 3 && inp.indexOf(".") == -1){
		men = inp.split(",").join("");
		i = Math.floor(men.length/3);
		for(; i>0; i--){
		a = men.length - 3*i;
		if(a != 0){
		slc1 = men.slice(0 ,a);
		slc2 = men.slice(a);
		men = slc1 + ","+ slc2;
		}
		}
		$(this).val(men);
		}if (inp.length <= 3){
		var d = inp.replace(",","");
		$(this).val(d);
		}
		if (KeyID != 8 && KeyID != "46") {
			if(inp == "." || inp == "0"){
			$(this).val(0+".");
			}
		}
	});
});
function dropisdown() {
document.getElementById("drop-menyu").classList.toggle("show-bat");
document.getElementById('input1').focus();
}
function asagiDus() {
document.getElementById("dus-menyu").classList.toggle("show-bat");
document.getElementById('daxil').focus();
}
	var fromSekil = document.getElementById('fromSekil');
	var fromCurrency = document.getElementById('fromCurrency');
	var fromCurName = document.getElementById('fromCurName');
	var fromHidden = document.getElementById('fromHidden');
	var toSekil = document.getElementById('toSekil');
	var toCurrency = document.getElementById('toCurrency');
	var toCurName = document.getElementById('toCurName');
	var toHidden = document.getElementById('toHidden');
	function fromSelect(value){
		var fromVal = value.split(",");
		fromSekil.src = fromVal[2];
		fromCurrency.innerHTML = fromVal[1];
		fromCurName.innerHTML = fromVal[0];
		fromHidden.value = fromVal[3];
		$(document).ready(function(){
		$("#forinput").width(10);
		$("#input1").width(0);
		$("#input1").val("");
		$("#fromVal").show();
		$("#tgl-img").attr("src","{{  URL::asset('/sekil/expand-button.svg') }}");
		$("#drop-menyu").removeClass("show-bat");
		var mebleg = $("#mebleg").val().split(",").join("");
		if(mebleg !== NaN){
			var netMeb = Math.round(mebleg *  $("#fromHidden").val()/$("#toHidden").val() * 10000)/10000;
			$("#netice").html(vergul(netMeb));
			$("#meblegNet").html(vergul(mebleg));
			$("#fromNet").html($("#fromCurName").html());
			$("#toNet").html($("#toCurName").html());
		}
		});
	}
	function toSelect(value){
		var toVal = value.split(",");
		toSekil.src = toVal[2];
		toCurrency.innerHTML = toVal[1];
		toCurName.innerHTML = toVal[0];
		toHidden.value = toVal[3];
		$(document).ready(function(){
		$("#fordaxil").width(10);
		$("#daxil").width(0);
		$("#daxil").val("");
		$("#valDan").show();
		$("#asagi-img").attr("src","{{  URL::asset('/sekil/expand-button.svg') }}");
		$("#dus-menyu").removeClass("show-bat");
		var mebleg = $("#mebleg").val().split(",").join("");
		if(mebleg !== NaN){
			var netiMeb = Math.round(mebleg *  $("#fromHidden").val()/$("#toHidden").val() * 10000)/10000;
			$("#netice").html(vergul(netiMeb));
			$("#meblegNet").html(vergul(mebleg));
			$("#fromNet").html($("#fromCurName").html());
			$("#toNet").html($("#toCurName").html());
		}
		});
	}
	$(function() {
		$('.chart').easyPieChart({
			barColor: '#007bff',
			//trackColor: '#ffc107',
			scaleColor: false,
			//lineCap: 'square',
			lineWidth: 8,
			size: 70,
			animate: 1
		});
	});
		var ara = "";
	var t, a, b;
	var yenile;
	function stopint() {
		clearInterval(yenile);
	}
	function yukleme(){
	yenile = setInterval(saniye, 1000);
	
	}
	function saniye(){
		var vaxt = new Date();
		var saniye = vaxt.getSeconds();
		var san = 59 - saniye;
		if(ara==""){
			ara = san;
		}
		if(ara > san){
			t = san + (60 - ara);
		}else{
			t = san - ara;
		}
		if(t < 10){
			a = "0"+ t;
		}else{
			a = t;
		}
		if( t == 0){
			b = -60;
		}else{
			b = (-t);
		}
		document.getElementById('chart').innerHTML = a;
		$('.chart').data('easyPieChart').update(b*100/60);
		if (t == 1) {
			location.href = '/yenile';
		}
	}
	function davam(){
		yenile = setInterval(saniye, 1000);
		$('#stopBtn').show();
		$('#stopBtn2').hide();
	}
	function dayan(){
		stopint();
		document.getElementById('chart').innerHTML = "";
		$('.chart').data('easyPieChart').update(100);
		$('#stopBtn').hide();
		$('#stopBtn2').show();
		ara = "";
	}
	(function($) {
	$.fn.inputFilter = function(inputFilter) {
	return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
	if (inputFilter(this.value)) {
	this.oldValue = this.value;
	this.oldSelectionStart = this.selectionStart;
	this.oldSelectionEnd = this.selectionEnd;
	} else if (this.hasOwnProperty("oldValue")) {
	this.value = this.oldValue;
	this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
	}
	});
	};
	}(jQuery));
	$(document).ready(function() {
	// Restrict input to digits by using a regular expression filter.
	$("#mebleg").inputFilter(function(value) {
	return /^[0-9,]*[.]?[0-9,]*$/.test(value);
	});
	});
	var men, i, a, slc1, slc2, slc3, slc4, slc5, slc6, valyu;
	function vergul(valma){
	valyu = valma.toString();
	if(valyu.indexOf(".") == -1){
		if(valyu.length > 3){
	i = Math.floor(valyu.length/3);
	for(; i>0; i--){
	a = valyu.length - 3*i;
	if(a != 0){
	slc1 = valyu.slice(0 ,a);
	slc2 = valyu.slice(a);
	valyu = slc1 + ","+ slc2;
	}
	}
		}
		return valyu;
	}
	else{
		slc3 = valyu.slice(0, valyu.indexOf("."));
		slc4 = valyu.slice(valyu.indexOf("."));
		if(slc3.length > 3){
			i = Math.floor(slc3.length/3);
			for(; i>0; i--){
				a = slc3.length - 3*i;
				if(a!=0){
					slc5 = slc3.slice(0, a);
					slc6 = slc3.slice(a);
					slc3 = slc5 + "," + slc6;
				}
			}
		}
		valyu = slc3 + slc4;
		return valyu;
	}
}
</script>
<script src="{{'/js/jquery.easypiechart.js'}}"></script>
@endsection