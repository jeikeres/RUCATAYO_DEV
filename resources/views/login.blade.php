<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

{!! Html::style('css/login_estilos.css') !!}
{!! Html::style('bootstrap/css/bootstrap.css') !!}
{!! Html::style('bootstrap/css/bootstrap-responsive.css') !!}
{!! Html::style('css/font-awesome.css') !!}

<style media="screen">
	.profile-img-card{
	border-radius: 0;
	height: 100px;
	width: 200px;
	}
</style>

<title>Rucatayo</title>

<!-- Funcion Javascript Fecha Actual -->
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
<!-- Fin funcion fecha actual -->

</head>
<body>


		<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
						{!! Html::image('images/logo.png','a picture',array('class' => 'profile-img-card')); !!}
            <p id="profile-name" class="profile-name-card"></p>
						{!! Form::open(['route' => 'auth.doLogin','method' => 'POST','class' => 'form-signin']) !!}
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre de Usuario" required autofocus>
                <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>
            {!! Form::close() !!}
            <!--<a href="#" class="forgot-password">
                Olvidó su contraseña?
            </a>-->
						<div id="date" style="margin-top:15px;margin-left:40px;font-size:15px;">
							<i class="fa fa-calendar"></i>
							<script language="JavaScript" type="text/javascript">document.write(TODAY);</script>
						</div>
        </div><!-- /card-container -->
    </div><!-- /container -->

<!-- javascript
================================================== -->
<!-- Ubicar al final del documento para una carga mas rapida -->
 {!! Html::script('bootstrap/js/jquery.min.js'); !!}
 {!! Html::script('bootstrap/js/bootstrap.js'); !!}
 {!! Html::script('bootstrap/js/bootstrap.min.js'); !!}

<!-- ======================================================= -->
</body>

</html>
