@extends('layout')

@section('title')
  <title>Estado Validacion</title>
@endsection

  @section('additional_plugins')
    {!! Html::style('css/jquery.dataTables.css') !!}
  @endsection



@section('titulo')

<div id="titulo-task-page-content-wrapper"><i class="fa fa-list" style="color:#1ab394; margin-right:8px;"></i> Procedimientos

  <div id="titulo-task-derecha"> <i class="fa fa-user" style="margin-right: 3px;"></i> {{Auth::user()->name}}</div>

</div>

@endsection

@section('contenido')

  <div id="contenedor-default">

      <div class="container">


      <div class="row">

        <div class="col-xs-6">
          <div id="box_sw">
            <div id="box_sw_title">
              <i class="fa fa-list" style="margin-right: 9px;"></i>Estado Validación Procedimientos

            </div>
            <div id="box_sw_content">

       <!-- ========================= LISTADO DE ACTIVOS ============================================================  -->
       <table id="lista" class="table-striped row-border hover cell-border" cellspacing="0" width="100%">

             <thead class="brand" style="background-color: #EFEFEF;">
                <tr>
                  <th style="text-align:center;" width="12%">N° Activo</th>
                  <th style="text-align:center;">Descripción de Activo</th>
                    <th style="text-align:center;" width="12%">Cod. Proced.</th>
                     <th style="text-align:center;" width="12%">Descripción Proced.</th>
                         <th style="text-align:center;" width="12%">Estado</th>
             
                </tr>
              </thead>

              <tbody>

                @foreach($join as $dato)
            <tr>
              <?php $var=1; ?>
                 <td>{{$dato->n_equipo}}</td>
                <td>{{$dato->descripcion_s}}</td>
                <td>{{$dato->cod_procedimiento}}</td>
                   <td>{{$dato->procedimiento}}</td>
                       <td>{{$dato->nombre}}</td>

            </tr>
         @endforeach
                        
              </tbody>
            </table>

            </div>
          </div>
        </div>




      </div>



      </div>


    </div>

    <div id="fondo"></div>
</div>
</div>

@endsection


@section('bottom_js')

 {!! Html::script('js/jquery.dataTables.js'); !!}
  {!! Html::script('resources/syntax/shCore.js'); !!}
    {!! Html::script('resources/demo.js'); !!}


<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  $('#lista').dataTable({
    ordering: false
} );

} );
</script>




@endsection