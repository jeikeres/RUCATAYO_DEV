
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />



{!! Html::style('css/estilos.css') !!}
{!! Html::style('css/menu.css') !!}
{!! Html::style('bootstrap/css/bootstrap.css') !!}
{!! Html::style('bootstrap/css/bootstrap-responsive.css') !!}
{!! Html::style('css/font-awesome.css') !!}
{!! Html::style('css/jquery-ui-1.10.0.custom.css') !!}



  @yield('additional_plugins')


<title>Inicio</title>

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

</head>
<body>

<!-- ENCABEZADO ================================================================== -->
<script src="date_now.js"></script>
<div id="header" class="box_shadow">
  <div id="tool-menu"><a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars" style="color:#fff; margin-right:8px;"></i></a></div>
    <div id="logo"><img src="../images/titulo2.png"></div>
    <div id="cont_head">
    <div id="date"><i class="fa fa-calendar" style="margin-right:5px;"></i> <script language="JavaScript" type="text/javascript">
    document.write(TODAY);
    </script> | <a href="{{route('auth.logout')}}" style="color:#fff; text-decoration:none;"><i class="fa fa-power-off"></i> Cerrar Sesión</a></div>
    </div>

</div>
<!-- FIN ENCABEZADO ============================================================== -->

<div id="wrapper">

<!-- BARRA MENU IZQUIERDA ========================================================= -->
<div id="sidebar-wrapper">

  <!-- MENU PRINCIPAL -->

          <div id="menu_home">
            <a href="desktop.php" style="padding: 12px 0px 12px 10px;"><i class="fa fa-home fa-lg"></i> Inicio</a>
          </div>

<div>


<!-- GROUP PANEL DESPLEGABLE ====================================== -->
    <div class="panel-group" role="tablist">

    <!-- PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->
    <div class="menu_box">

      <!-- HEADING TITULO DESPLEGABLE ================================================ -->
      <div role="tab" id="collapseListGroupHeading1"
           style="padding: 0px;">

          <a data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1" style="text-decoration:none;">
            <i class="fa fa-cubes"></i> Activos <i class="fa fa-caret-down" style="margin-left: 5px;"></i>
          </a>

      </div>

      <!-- CONTENIDO DESPLEGABLE ================================================ -->
      <div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="false">
        <ul class="menu_cont">
          <li class="menu_cont" data-toggle="modal" data-target="#myModal"> <a href="activos.php">Ingreso</a></li>
          <li class="menu_cont"> <a href="activos_list.php">Ver - Editar</a></li>

        </ul>

      </div>
      <!-- FIN CONTENIDO DESPLEGABLE ================================================ -->

    </div>
    <!-- FIN PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->

  </div>
<!-- FIN GROUP PANEL DESPLEGABLE ====================================== -->


<!-- PLANIFICACION GROUP PANEL DESPLEGABLE ====================================== -->
    <div class="panel-group" role="tablist">

    <!-- PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->
    <div class="menu_box">

      <!-- HEADING TITULO DESPLEGABLE ================================================ -->
      <div role="tab" id="collapseListGroupHeading4"
           style="padding: 0px;">

          <a data-toggle="collapse" href="#collapseListGroup4" aria-expanded="false" aria-controls="collapseListGroup4" style="text-decoration:none;">
            <i class="fa fa-tasks"></i> Planificacion <i class="fa fa-caret-down" style="margin-left: 5px;"></i>
          </a>

      </div>

      <!-- CONTENIDO DESPLEGABLE ================================================ -->
      <div id="collapseListGroup4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading4" aria-expanded="false">
        <ul class="menu_cont">
          <li class="menu_cont"> <a href="{{route('planificacion.pruebas')}}">Ingreso</a></li>
          <li class="menu_cont"> <a href="plan_list.php">Ver - Editar</a></li>
        </ul>
      </div>
      <!-- FIN CONTENIDO DESPLEGABLE ================================================ -->

    </div>
    <!-- FIN PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->

  </div>
<!-- FIN GROUP PANEL DESPLEGABLE ====================================== -->


<!-- PROGRAMACION GROUP PANEL DESPLEGABLE ====================================== -->
    <div class="panel-group" role="tablist">

    <!-- PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->
    <div class="menu_box">

      <!-- HEADING TITULO DESPLEGABLE ================================================ -->
      <div role="tab" id="collapseListGroupHeading5"
           style="padding: 0px;">

          <a data-toggle="collapse" href="#collapseListGroup5" aria-expanded="false" aria-controls="collapseListGroup5" style="text-decoration:none;">
            <i class="fa fa-calendar"></i> Programacion <i class="fa fa-caret-down" style="margin-left: 5px;"></i>
          </a>

      </div>

      <!-- CONTENIDO DESPLEGABLE ================================================ -->
      <div id="collapseListGroup5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading5" aria-expanded="false">
        <ul class="menu_cont">
          <li class="menu_cont"> <a href="proy_filtro.php">Gantt Mantenimiento</a></li>
          <li class="menu_cont"> <a href="proy_filtro_calendar.php">Calendario OT</a></li>
        </ul>
      </div>
      <!-- FIN CONTENIDO DESPLEGABLE ================================================ -->

    </div>
    <!-- FIN PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->

  </div>
<!-- FIN GROUP PANEL DESPLEGABLE ====================================== -->



    <div class="panel-group" role="tablist">

    <!-- PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->
    <div class="menu_box">

      <!-- HEADING TITULO DESPLEGABLE ================================================ -->
      <div role="tab" id="collapseListGroupHeading5"
           style="padding: 0px;">

          <a data-toggle="collapse" href="#collapseListGroup6" aria-expanded="false" aria-controls="collapseListGroup6" style="text-decoration:none;">
            <i class="fa fa-calendar"></i> Procedimientos <i class="fa fa-caret-down" style="margin-left: 5px;"></i>
          </a>

      </div>

      <!-- CONTENIDO DESPLEGABLE ================================================ -->
      <div id="collapseListGroup6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading5" aria-expanded="false">
        <ul class="menu_cont">
          <li class="menu_cont"> <a href="{{ url('procedimientos') }}">Ver - Editar</a></li>
          <li class="menu_cont"> <a href="{{ route('procedimientos.validacion') }}">Validar </a></li>
             <li class="menu_cont"> <a href="{{ route('procedimientos.estado_validacion') }}">Estado Validacion </a></li>
        </ul>
      </div>
      <!-- FIN CONTENIDO DESPLEGABLE ================================================ -->

    </div>
    <!-- FIN PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->

  </div>




<!-- GROUP PANEL DESPLEGABLE ====================================== -->
    <div class="panel-group" role="tablist">

    <!-- PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->
    <div class="menu_box">

      <!-- HEADING TITULO DESPLEGABLE ================================================ -->
      <div role="tab" id="collapseListGroupHeading2" style="padding: 0px">

          <a class="" data-toggle="collapse" href="#collapseListGroup2" aria-expanded="false" aria-controls="collapseListGroup2" style="text-decoration:none;">
            <i class="fa fa-users"></i> Recursos <i class="fa fa-caret-down" style="margin-left: 5px;"></i>
          </a>

      </div>

      <!-- CONTENIDO DESPLEGABLE ================================================ -->
      <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2" aria-expanded="false">
        <ul class="menu_cont">
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Insumos</a></li>
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Repuestos</a></li>
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Herramientas</a></li>
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Equipos Apoyo</a></li>
          <li class="menu_cont"> <a href="risk_actividad.php"><i class="fa fa-angle-right"></i>Seguridad</a></li>
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Horas Personas</a></li>
        </ul>
      </div>
      <!-- FIN CONTENIDO DESPLEGABLE ================================================ -->

    </div>
    <!-- FIN PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->

  </div>
<!-- FIN GROUP PANEL DESPLEGABLE ====================================== -->


<div id="menu_list">
<ul>
               <li style="line-height: 0px;">
                    <a href="#"><i class="fa fa-cogs"></i> Orden Trabajo</a>
                </li>

                <li style="line-height: 0px;">
                    <a href="#"><i class="fa fa-exclamation-triangle"></i> Avisos Incidentes</a>
                </li>

                <li style="line-height: 0px;">
                    <a href="#"><i class="fa fa-tachometer"></i> Confiabilidad</a>
                </li>

</ul>
</div>

<!-- GROUP PANEL DESPLEGABLE ====================================== -->
    <div class="panel-group" role="tablist">

    <!-- PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->
    <div class="menu_box">

      <!-- HEADING TITULO DESPLEGABLE ================================================ -->
      <div role="tab" id="collapseListGroupHeading3" style="padding: 0px">

          <a class="" data-toggle="collapse" href="#collapseListGroup3" aria-expanded="false" aria-controls="collapseListGroup3" style="text-decoration:none;">
            <i class="fa fa-pencil-square-o"></i> Operación <i class="fa fa-caret-down" style="margin-left: 5px;"></i>
          </a>

      </div>

      <!-- CONTENIDO DESPLEGABLE ================================================ -->
      <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3" aria-expanded="false">
        <ul class="menu_cont">
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Indisponibilidad</a></li>
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Registro Operación</a></li>
          <li class="menu_cont"> <a href="#"><i class="fa fa-angle-right"></i>Estadistica Operación</a></li>
        </ul>
      </div>
      <!-- FIN CONTENIDO DESPLEGABLE ================================================ -->

    </div>
    <!-- FIN PANEL DESPLEGABLE //////////////////////////////////////////////////////////// -->

  </div>
<!-- FIN GROUP PANEL DESPLEGABLE ====================================== -->




</div>
<!-- FIN MENU PRINCIPAL -->

</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingreso de Activo</h4>
      </div>
      <div class="modal-body">

<form method="POST" action="activos.php">
<div class="radio">
  <label>
    <input type="radio" name="id_clas" id="optionsRadios1" value="1" checked>
    Ingresar Unidad productiva
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="id_clas" id="optionsRadios2" value="2">
Ingresar Equipo
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="id_clas" id="optionsRadios3" value="3">
  Ingresar Componente
  </label>
</div>
 <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
      </div>

    </div>
  </div>
</div>
<!-- FIN BARRA MENU IZQUIERDA ===================================================== -->


<div id="page-content-wrapper">
<div id="task-page-content-wrapper">


    @yield('titulo')

    <!--<div id="titulo-task-page-content-wrapper"><i class="fa fa-bar-chart" style="color:#1ab394; margin-right:8px;"></i> Titulo de la Página - CSS : #titulo-task-page-content-wrapper

      <div id="titulo-task-derecha"> box CSS id="titulo-task-derecha"</div>

    </div>-->




     @yield('contenido')
    <!--<div id="contenedor-default">
      CSS id="contenedor-default"
      <div class="container">
      <div class="row">
        <div class="col-xs-6 col-md-4" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-6 .col-md-4</div>
        <div class="col-xs-6 col-md-4" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-6 .col-md-4</div>
        <div class="col-xs-6 col-md-4" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-6 .col-md-4</div>
      </div>
      </div>
    </div>

    <div id="contenedor-blanco" class="border-t">
      <div id="contenedor-titulo">
        <i class="fa fa-line-chart" style="color:#1ab394; margin-right:8px;"></i> Titulo Contenedor - CSS id="contenedor-titulo"
        <div id="box_derecha"> <button type="button" class="btn btn-success btn-xs">button success titulo</button></div>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-8" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-12 .col-md-8</div>
        <div class="col-xs-6 col-md-4" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-6 .col-md-4</div>
      </div>
      </div>
      CSS id="contenedor-blanco"<br>
      para Bordes : class="border-t"<br>

      para los iconos propiedades <strong>style="color:#1ab394; margin-right:8px;"</strong>
    </div>

    <div id="contenedor-celestino" class="border-b">
      CSS id="contenedor-celestino
      <div class="container">
      <div class="row">
        <div class="col-xs-6" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-6</div>
        <div class="col-xs-6" style="background-color:rgba(206, 206, 249, 0.52); border: 1px solid #666;">.col-xs-6</div>
      </div>
      </div>

      CSS  class="border-b"
    </div>


  <div id="contenedor-default">

    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-md-4">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw" <div id="mini_box_derecha"> <button type="button" class="btn btn-primary btn-xs">primary</button></div>
            </div>
            <div id="box_sw_content">
              <strong>id="box_sw_content"</strong> Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw"<div id="mini_box_derecha"> <button type="button" class="btn btn-info btn-xs">info</button></div>
            </div>
            <div id="box_sw_content">
              <div class="text_bajada">Prueba de texto de bajada de color verde con Css class="text_bajada"</div>
              <strong>id="box_sw_content"</strong> Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw_title" <div id="mini_box_derecha"> <button type="button" class="btn btn-warning btn-xs">warning</button></div>
            </div>
            <div id="box_sw_content">
              <strong>id="box_sw_content"</strong> Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="container">

      <div class="row">
        <div class="col-xs-6">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw" - id="box_sw_title" <div id="mini_box_derecha"> <button type="button" class="btn btn-danger btn-xs">button danger</button></div>
            </div>
            <div id="box_sw_content">
              <strong>id="box_sw_content"</strong> Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>

        <div class="col-xs-6">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw" - id="box_sw_title" <div id="mini_box_derecha"> <button type="button" class="btn btn-default btn-xs">default</button></div>
            </div>
            <div id="box_sw_content">
              <div class="text_bajada">Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.</div>
              <strong>id="box_sw_content"</strong> Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-md-8">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw"
              <div id="mini_box_derecha"> <button type="button" class="btn btn-primary btn-xs">button primary</button></div>
            </div>
            <div id="box_sw_content">
              <strong>id="box_sw_content"</strong> Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4">
          <div id="box_sw">
            <div id="box_sw_title">
              CSS id="box_sw"
              <div id="mini_box_derecha"> <button type="button" class="btn btn-success btn-xs">button success</button></div>
            </div>
            <div id="box_sw_content">
              Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat.
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div id="contenedor-verde" style="padding: 20px 30px;">
      CSS id="contenedor-verde"
      <h1>Titulo Textos H1</h1>
      <h2>Titulo Textos H2</h2>
      <h3>Titulo Textos H3</h3>
      <p>Formato de parrafo texto css p : p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat. Nunc pretium luctus imperdiet. Proin ornare augue erat, sed scelerisque lorem porttitor mollis. Donec a nisl in ligula elementum pharetra nec eget dui. Maecenas sit amet lacus vitae sapien malesuada finibus. Nunc quis dolor in purus rhoncus venenatis in eget lectus. Maecenas sagittis metus sed ligula rutrum pellentesque. Quisque rhoncus mattis luctus. Donec tempus risus sed libero fermentum luctus. Cras vestibulum ante eleifend, tristique risus sodales, faucibus lacus. Morbi ut aliquet dui, vitae egestas diam. Nulla rutrum ligula at egestas blandit. Cras cursus metus non magna imperdiet, non congue leo vulputate. Praesent sodales efficitur nisl, et varius ipsum hendrerit vel. Mauris sit amet laoreet justo, sed tempor odio. Suspendisse eget turpis nisi. Donec feugiat placerat leo id molestie. Suspendisse sit amet finibus libero. Phasellus ornare est ac cursus euismod. Etiam nec tempor lectus. Cras convallis enim sed felis imperdiet, et pretium ligula interdum. Nam sagittis elementum iaculis. Vivamus facilisis augue a accumsan ullamcorper. Praesent feugiat quam sed ante aliquam, vel sodales lectus eleifend. Praesent rutrum non lectus vitae facilisis. Morbi dapibus orci sed orci hendrerit faucibus. Sed scelerisque nisl eu fermentum imperdiet. Mauris mattis augue gravida purus pulvinar, at convallis lorem pharetra.</p>

      <div id="box" style="border: 1px solid #666;">
         <strong>CSS id="box" - SIN BORDES PUESTOS SOLO LOCAL PARA ESTA MUESTRA </strong> p Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor tortor, hendrerit a urna vitae, iaculis dapibus nisl. Sed laoreet vehicula augue, quis tristique ante consequat posuere. Quisque eu risus ut ante semper accumsan sed sed erat. Nunc pretium luctus imperdiet. Proin ornare augue erat, sed scelerisque lorem porttitor mollis. Donec a nisl in ligula elementum pharetra nec eget dui. Maecenas sit amet lacus vitae sapien malesuada finibus. Nunc quis dolor in purus rhoncus venenatis in eget lectus.
      </div>

  </div>-->

</div>




<div id="fondo"></div>
</div>
</div>

</div>
<!-- javascript
================================================== -->
<!-- Ubicar al final del documento para una carga mas rapida -->
  {!! Html::script('//code.jquery.com/jquery-1.11.3.min.js'); !!}
 {!! Html::script('bootstrap/js/jquery.min.js'); !!}
 {!! Html::script('bootstrap/js/bootstrap.js'); !!}
 {!! Html::script('bootstrap/js/bootstrap.min.js'); !!}




    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    </script>



  @yield('bottom_js')
</body>

</html>
