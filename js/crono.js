$(document).ready(function(){
		let inicio = null;
		$(document).keyup(teclaIn);
		$(document).keydown(teclaOut);
	});
	function teclaIn(e){
		fclick = true;
		switch(e.keyCode){
			case 32:
			startTime(e);
			break;
		}
	}
	function teclaOut(e){
		switch(e.keyCode){
			case 32:
			break;
			default:
			clearInterval(inicio);
			break;
		}
	}
	function startTime(e){
		let tiempo = {
			minutos:0,
			segundos:0,
			milisegundos:0
		};
		inicio = setInterval(function(){
			tiempo.milisegundos++;
			if (tiempo.milisegundos>=100) {
				tiempo.milisegundos = 0;
				tiempo.segundos++;
			}
			if (tiempo.segundos>=60) {
				tiempo.segundos=0;
				tiempo.minutos++;
			}
			$("#minutos").text(tiempo.minutos<10?'0'+tiempo.minutos:tiempo.minutos);
			$("#segundos").text(tiempo.segundos<10?'0'+tiempo.segundos:tiempo.segundos);
			$("#milisegundos").text(tiempo.milisegundos<10?'0'+tiempo.milisegundos:tiempo.milisegundos);
		},10);
	}