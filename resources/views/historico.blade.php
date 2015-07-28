@extends('layout')

@section('title')
<title>historico</title>
@endsection

@section('titulo')

<div id="titulo-task-page-content-wrapper"><i class="fa fa-bar-chart" style="color:#1ab394; margin-right:8px;"></i> Procedimientos

      <div id="titulo-task-derecha"><i class="fa fa-user" style="margin-right: 3px;"></i> {{Auth::user()->name}}</div>

</div>

@endsection

@section('contenido')

<div class="row">

        <div class="col-xs-6">
          <div id="box_sw">
            <div id="box_sw_title">
              <i class="fa fa-folder-open-o" style="margin-right: 9px;"></i>Control de Cambios

            </div>
            <div id="box_sw_content">

       <!-- ========================= LISTADO DE ACTIVOS ============================================================  -->
       <table id="lista" class="table-striped row-border hover cell-border" cellspacing="0" width="100%">

             <thead class="brand" style="background-color: #EFEFEF;">
                <tr>
                  <th style="text-align:center;" width="12%">Fecha</th>
                  <th style="text-align:center;"  width="12%">N° Revision</th>
                    <th style="text-align:center;" width="12%">Modificaciones Realizadas</th>
                  <th width="8%" style="text-align:center;">Descargar</th>
                  <th width="8%" style="text-align:center;">PDF</th>
                </tr>
              </thead>

              <tbody>

                @foreach($detalle as $registro)
                <tr>

                <td style="text-align:center;">{{$registro->created_at}}</td>
                <td style="text-align:center;">{{$registro->nombre}}</td>
                <td></td>
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="http://localhost/rucatayo_dev/public/storage/{{$registro->nombre}}" download="{{$registro->nombre}}"><i class="fa fa-download"></i></a></td>
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="http://localhost/rucatayo_dev/public/storage/{{$registro->nombre}}"><i class="fa fa-file-pdf-o"></i></a></td>

                </tr>
                @endforeach

              </tbody>
            </table>

            </div>
          </div>
        </div>

@endsection

@section('bottom-js')

{!! Html::script('js/jquery.dataTables.js'); !!}
{!! Html::script('js/resources/syntax/shCore.js'); !!}
{!! Html::script('js/resources/demo.js'); !!}

<!-- SCRIPT LISTA DINAMICA JQUERY =========== -->
    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
      $('#lista').dataTable({
        ordering: false
    } );

    } );
    </script>


        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>

@endsection