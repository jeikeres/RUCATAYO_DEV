<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css" />
<link rel="stylesheet" href="css/font-awesome.css">

<!-- Funcion Javascript Fecha Actual //////////////////////////////////////////////////////////////////////////////////////////// -->
<script language="JavaScript" type="text/javascript">
var mydate=new Date();
var dayarray = new Array("Domingo,","Lunes,","Martes,","Miercoles,","Jueves,","Viernes,","Sabado,");
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto",
"Septiembre","Octubre","Noviembre","Diciembre");
var year = mydate.getYear()
if (year < 1000)
year= year+1900
var TODAY = dayarray[mydate.getDay()] + " " + mydate.getDate() + " de " + montharray[mydate.getMonth()] + " de " + year;
</script>
<!-- Fin funcion fecha actual /////////////////////////////////////////////////////////////////////////////////////////////////// -->
