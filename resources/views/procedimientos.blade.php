@extends('layout')

@section('title')
  <title>procedimientos</title>
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
              <i class="fa fa-list" style="margin-right: 9px;"></i>Lista de Procedimientos

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
                  <th width="8%" style="text-align:center;">Ver - Editar</th>
                  <th width="8%" style="text-align:center;">Control Cambios</th>
                  <th width="8%" style="text-align:center;">PDF</th>
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
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="{{ route('procedimientos.vereditar',$dato->id_procedimiento) }}"><i class="fa fa-eye"></i></a></td>
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="{{ route('procedimientos.control_cambios',$dato->id_procedimiento) }}"><i class="fa fa-folder-open-o"></i></a></td>
                <td  width="8%" style="text-align:center; font-size: 14px;"><a href="#"><i class="fa fa-file-pdf-o"></i></a></td>
            </tr>
         @endforeach

              
              </tbody>
            </table>


              @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>


                @endif

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



<script>

$(document).ready(function(){
   


  var form = $('#formulario');
      form.on("submit",function(e) {

       e.preventDefault();



      
          $.ajaxSetup({
                headers: { 'X-XSRF-Token': $('meta[name="csrf-token"]').attr('content') }
            });

          $.ajax({
              type: 'POST',
              url: form.attr('action'),
              data: form.serialize(),
               dataType: "json",
              beforeSend: function(){
                
              },
              complete: function(data){
                
              },
              success: function (data) 
              {
              
                console.log(data);

            
    var appendTxt = 
    '<tr>'+
    '<th style="text-align: center;" scope="row"></th>'+
    '<td>'+data.resultado['actividad']+'</td>'+
    '<td style="text-align: center;"><a href="#" class="btn btn-link" style="width: 40px;"><i class="fa fa-plus"></i></a></td>'+
    '<td style="text-align: center;"><button type="button" onclick="#" class="btn btn-link" style="width: 40px;"><i class="fa fa-times"></i></button></td>'+
    '<td style="text-align: center;"><button type="button" onclick="#" class="btn btn-link" style="width: 40px;"><i class="fa fa-exclamation-triangle"></i></button></td>'+
    '<td style="text-align: center;"><button type="button" onclick="#" class="btn btn-link" style="width: 40px;"><i class="fa fa-tree"></i></button></td>'+
    '</tr>';


$("#tableId").last().append(appendTxt);

$("#pruebass").val('');

              
               
              
  
              },
              error: function(errors){
                console.log(errors);
              
              }
          });

 


});

});

</script>

@endsection