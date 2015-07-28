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
              <i class="fa fa-list" style="margin-right: 9px;"></i> Validacion de Procedimientos

            </div>
            <div id="box_sw_content">

       <!-- ========================= LISTADO DE ACTIVOS ============================================================  -->
       <table id="lista" class="table-striped row-border hover cell-border" cellspacing="0" width="100%">

             <thead class="brand" style="background-color: #EFEFEF;">
                <tr>
                  <th style="text-align:center;" width="12%">N°</th>
                  <th style="text-align:center;">Nombre</th>
                  <th width="8%" style="text-align:center;">PDF</th>
                  <th width="8%" style="text-align:center;">Validar</th>
                  <th width="8%" style="text-align:center;">Rechazar</th>
                </tr>
              </thead>

              <tbody>
               
                 @foreach($procedimientos as $procedimiento)
            <tr>
              
                 <td>{{$procedimiento->cod_procedimiento}}</td>
                <td>{{$procedimiento->procedimiento}}</td>
                   <td  width="8%" style="text-align:center; font-size: 14px;"><a href="#"><i class="fa fa-file-pdf-o"></i></a></td>
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="#"><button type="button" class="btn btn-success btn-xs">Validar</button></a></td>
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="#"><button type="button" class="btn btn-danger btn-xs">Rechazar</button></a></td>
            
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