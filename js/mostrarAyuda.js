$(document).ready(Start);

function Start(){	
	$(".help").click(ClickAyuda);
}

function ClickAyuda() {
	if($(".mapaweb").css("left")=="0px"){
		var mostrado = true;
	}else{
		var mostrado = false;
	}
	if(mostrado == false){
		$(".mapaweb").animate({ left: "0px" }, 500);
		mostrado = true;
	}else{
		$(".mapaweb").animate({ left: "-379px" }, 500);
		mostrado = false;
	}
}