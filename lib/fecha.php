<?php
    date_default_timezone_set("America/Mexico_City");
	function fechaespanol ($fecha) {
  	 $fecha = substr($fecha, 0, 10);
  	 $numeroDia = date('d', strtotime($fecha));
	 $dia = date('l', strtotime($fecha));
	 $mes = date('F', strtotime($fecha));
	 $anio = date('Y', strtotime($fecha));
	 $dias_ES = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
	 $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	 $nombredia = str_replace($dias_EN, $dias_ES, $dia);
	 $mes_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	 $mes_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	 $nombreMes = str_replace($mes_EN, $mes_ES, $mes);
	 return utf8_decode($nombredia)." ".$numeroDia." de ".$nombreMes." de ".$anio;
	}

	function acentos($cadena){
	    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
	    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
	    $cadena = utf8_decode($cadena);
	    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	    $cadena = strtolower($cadena);
	    return utf8_encode($cadena);
	}

	function fnormal($fecha){
		$fecha = str_replace('-', '/', $fecha);
		$nfecha = date('d/m/Y', strtotime($fecha));
		return $nfecha;
	}
?>