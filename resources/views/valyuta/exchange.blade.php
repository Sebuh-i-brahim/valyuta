@extends('layout.valyuta')

@section('title', 'Exchange Rate')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ '/css/exchstyle.css' }}">
@endsection

@section('az', '/exchange/az')

@section('en', '/exchange/en')

@section('ru', '/exchange/ru')

@section('exclass', 'activeBtn')

@section('content')
<div class="con-verter"><h1 id="lang-6" style="text-align: center;">{{ $lang->lang13 }}</h1></div>
<div class="tbl-basliq row">
	<div class="col-md-8 ml-auto bg-dark tbl-basliq2">
		<div class="tbl-dizayn">
			<label class="tbl-label ml-auto mr-auto"><label id="codeName"></label>{{ $lang->lang14 }}</label>
			<div class="tbl-form ml-auto">
				<div class="ml-auto mr-5">
					<input type="date" name="table" class="form-control tarix ml-auto" id="today" onchange="aaa();">
					<input type="hidden" id="gizli">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row ex-row">
	<div class="col-md-3">
		<div class="bg-dark xml-list">
			<label class="list-label">{{ $lang->lang15 }}</label>
			<ul class="ul-xml xml-list">
				<li class="xml-li">
					<button class="xml-btn" id="AZN">{{ $lang->lang16 }}</button>
				</li>
				<li class="xml-li">
					<button class="xml-btn" id="USD">{{ $lang->lang17 }}</button>
				</li>
			</ul>
			<label class="list-label">{{ $lang->lang21 }}</label>
			<ul class="ul-xml xml-list">
				<li class="xml-li">
					<button class="xml-btn" id="EUR">{{ $lang->lang18 }}</button>
				</li>
				<li class="xml-li">
					<button class="xml-btn" id="RUB">{{ $lang->lang19 }}</button>
				</li>
				<li class="xml-li">
					<button class="xml-btn" id="TRY">{{ $lang->lang20 }}</button>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div>
			<table class="table table-hover table-primary table-striped table-xml" id="tbl"></table>
		</div>
	</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
	function xmlYaz(newXml, oldXml){
			var i;
			var xmlDoc = newXml.responseXML;
			var oldDoc = oldXml.responseXML;
			var table="<tr><th>{{ $lang->lang22 }}</th><th class='cntr'>{{ $lang->lang23 }}</th><th class='cntr'>{{ $lang->lang24 }}</th><th class='cntr'>{{ $lang->lang25 }}</th><th>{{ $lang->lang26 }}</th></tr>";
			var x = xmlDoc.getElementsByTagName("item");
			var y = oldDoc.getElementsByTagName("item");
			var img;
			for (i = 0; i <x.length; i++) { 
				if (x[i].getElementsByTagName("exchangeRate")[0].innerHTML > y[i].getElementsByTagName("exchangeRate")[0].innerHTML) {
					img = "sekil/up-arrow.svg";
				}
				else if (x[i].getElementsByTagName("exchangeRate")[0].innerHTML < y[i].getElementsByTagName("exchangeRate")[0].innerHTML) {
					img = "sekil/down-arrow.svg";
				}
				else{
					img = "sekil/dotCircle.svg";
				}
				table += "<tr><td>" +
				x[i].getElementsByTagName("targetName")[0].innerHTML +
				"</td><td class='cntr'>" +
				x[i].getElementsByTagName("targetCurrency")[0].innerHTML +
				"</td><td class='cntr'>" +
				x[i].getElementsByTagName("exchangeRate")[0].innerHTML +
				"</td><td class='cntr'>" +
				x[i].getElementsByTagName("inverseRate")[0].innerHTML +
				"</td><td><img src='"+img+"' class='artimImg'></td></tr>";
			}
			document.getElementById("codeName").innerHTML = x[0].getElementsByTagName("baseCurrency")[0].innerHTML;
			document.getElementById("tbl").innerHTML = table;		 
		}
	$(document).ready(function(){
		document.getElementById('gizli').value = "aznxml";
		function xmlyazdir(xml){
			var i;
			var xmlDoc = xml.responseXML;
			var table="<tr><th>{{ $lang->lang22 }}</th><th>{{ $lang->lang23 }}</th><th>{{ $lang->lang24 }}</th><th>{{ $lang->lang25 }}</th></tr>";
			var x = xmlDoc.getElementsByTagName("item");
			for (i = 0; i <x.length; i++) { 
			table += "<tr><td>" +
			x[i].getElementsByTagName("targetName")[0].innerHTML +
			"</td><td>" +
			x[i].getElementsByTagName("targetCurrency")[0].innerHTML +
			"</td><td>" +
			x[i].getElementsByTagName("exchangeRate")[0].innerHTML +
			"</td><td>" +
			x[i].getElementsByTagName("inverseRate")[0].innerHTML +
			"</td></tr>";
			}
			document.getElementById("codeName").innerHTML = x[0].getElementsByTagName("baseCurrency")[0].innerHTML;
			document.getElementById("tbl").innerHTML = table;		 
		}
		$("#AZN").on('click', function(){
			document.getElementById('today').removeAttribute('disabled');
			document.getElementById('gizli').value = "aznxml";
			aaa();
		});
		$("#USD").on('click', function(){
			document.getElementById('today').removeAttribute('disabled');
			document.getElementById('gizli').value = "usdxml";
			aaa();
		});
		$("#EUR").on('click', function(){
			var linkEu = "{{ 'http://www.floatrates.com/daily/EUR.xml' }}";
			clickBtn(linkEu);
		});
		$("#TRY").on('click', function(){
			var linkTr = "{{ 'http://www.floatrates.com/daily/TRY.xml' }}";
			clickBtn(linkTr);
		});
		$("#RUB").on('click', function(){
			var linkRu = "{{ 'http://www.floatrates.com/daily/RUB.xml' }}";
			clickBtn(linkRu);
		});
		function clickBtn(linkBtn){
			document.getElementById('today').disabled = "disabled";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      xmlyazdir(this);
			      document.getElementById('gizli').value = "";
			    }
			};
			xhttp.open("GET", linkBtn, true);
			xhttp.send();
		}
		document.querySelector("#today").valueAsDate = new Date();
		aaa();
	});
	function ddd(strq){
		var a = strq.getDay();
		switch(a){
			case 0:
			return "Sun";
			break;
			case 1:
			return "Mon";
			break;
			case 2:
			return "Tue";
			break;
			case 3:
			return "Wed";
			break;
			case 4:
			return "Thu";
			break;
			case 5:
			return "Fri";
			break;
			case 6:
			return "Sat";
			break;
		}
	}
	function zzz(strq){
		var a = strq.getUTCMonth();
		switch(a){
			case 0:
			return "Jan";
			break;
			case 1:
			return "Feb";
			break;
			case 2:
			return "Mar";
			break;
			case 3:
			return "Apr";
			break;
			case 4:
			return "May";
			break;
			case 5:
			return "Jun";
			break;
			case 6:
			return "Jul";
			break;
			case 7:
			return "Aug";
			break;
			case 8:
			return "Sep";
			break;
			case 9:
			return "Oct";
			break;
			case 10:
			return "Nov";
			break;
			case 11:
			return "Dec";
			break;
		}
	}
	function aaa(){
		ferqDate = new Date();
		todayDate = new Date();
		ferqDate.setUTCFullYear(2019, 7, 12);
		var str = document.querySelector('#today').valueAsDate;
		if(str > ferqDate && str <= todayDate){
			var nameXML = (ddd(str) + str.getDate()+ zzz(str)+str.getFullYear()+'.xml').toLowerCase();
			oldDate = new Date();
			oldDate.setDate(document.querySelector('#today').valueAsDate.getDate() - 1);
			var oldNameXML = (ddd(oldDate) + oldDate.getDate()+ zzz(oldDate)+oldDate.getFullYear()+'.xml').toLowerCase();
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	gotur(this, oldNameXML);
			    }
			};
			xhttp.open("GET", "/"+document.getElementById('gizli').value+"/"+nameXML, true);
			xhttp.send();
		}if(str <= ferqDate){
			alert('{{ $lang->lang27 }}');
		}
		if(str > todayDate){
			alert('{{ $lang->lang28 }}');
		}
		
	}
	function gotur(newXml, oldxml){
		var xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	xmlYaz(newXml, this);
		    }
		};
		xhttp.open("GET", "/"+document.getElementById('gizli').value+"/"+oldxml, true);
		xhttp.send();
	}
</script>


@endsection