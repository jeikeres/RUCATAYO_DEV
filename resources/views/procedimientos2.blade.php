@extends('layout')

@section('title')
  <title>procedimientos</title>
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
        <i class="fa fa-list-alt" style="margin-right: 9px;"></i>Formulario de Procedimientos
      <div id="mini_box_derecha">


          
      </div>
    </div>

    <div id="box_sw_content">

<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!    modal  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow: hidden; width:100%;">
       <div class="modal-dialog">

        <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h5 class="modal-title" id="myModalLabel">Editar Detalle</h5>
        </div>
      
        <div class="modal-body">
  
  
       {!! Form::open(['route' => 'procedimientos.vereditarajaxdetalle','method' => 'POST','id'=>'formularioeditar']) !!}

              
         {!! Form::hidden('invisible', 'null', array('id' => 'idactividads')) !!}

              <div class="form-group">
              {!! Form::label('actividadss', 'Actividad') !!}
              {!! Form::textarea('actividadss',null,['class' =>'form-control']) !!}
            </div>
  

        </div>
        
       <div class="modal-footer">
                     <button id="guardarcambios" type="submit" class="btn btn-success  btn-sm" ><i class="fa fa-floppy-o"></i> Guardar Cambios</button>
                        {!! Form::close() !!}
                    <button type="button" class="btn btn-danger  btn-sm" data-dismiss="modal"> <i class="fa fa-times"></i> Cerrar</button>
          
      </div>
      



 
    </div>
  </div>
</div>
<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!   fin  modal  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->


        
   {!! Form::open(['route' => 'procedimientos.edit_actividad','method' => 'POST','id'=>'formulario']) !!}

          <div class="form-group">
                <label for="exampleInputEmail1">Nombre Procedimiento</label>
                <input class="form-control" id="exampleInputEmail1" name="name_proced" style="width: 50%;" maxlength="40" value="{{ $proced_base }}" disabled>
                

        </div>

        <div class="form-group ">
             <label for="exampleInputEmail1">Grupo Trabajo</label>
               {!! Form::select('id_grupo', $grupo_trabajo , $seleccionado, ['class' => 'form-control' , "style" => "width:50%;" ,  'disabled' => 'disabled']) !!}
        </div>  

        <div class="form-group">
                <label for="exampleInputEmail1">Actividad</label>
                <input class="form-control" id="pruebass" name="actividad" style="width: 50%;"  maxlength="40" placeholder="Ingrese Actividad Para Guardar ( Ej: Coordinación con Operación )" required>
       </div>

        <div class="form-group ">
             <label for="exampleInputEmail1">Detalle</label>
                <textarea class="form-control" name="detalle" id="detalless" style="width: 50%;"  rows="8" required></textarea>
        </div>  

  


        <button type="submit"  value="Enviar" id="agregar" class="btn btn-success btn-ms" style="margin-top: 10px;"><i class="fa fa-list"></i> Agregar Actividad</button>

            {!! Html::linkRoute('planificacion.pruebas','Guardar',$id_procedimiento,[ 'style' => 'margin-top: 9px;' , 'class' => 'btn btn-primary btn-ms', 'id' => 'botonguardar', 'disabled' => 'disabled' ]) !!}
 
                  



        {!! Form::hidden('id_procedimiento', $id_procedimiento) !!}


  {!! Form::close() !!}


        <table id="tableId" class="table table-bordered" style="margin-top:15px;">
      <thead>
        <tr>
         
          <th style="width: 57%;">Actividad</th>
          <th style="text-align: center; width: 8%;">Detalle</th>
          <th style="text-align: center; width: 8%;">Eliminar</th>
          <th style="text-align: center; width: 8%;">Seguridad</th>
          <th style="text-align: center; width: 8%;">M. Ambiente</th>
        </tr>
      </thead>
      <tbody id="tbody">
    

      </tbody>
    </table>

<!--a href=""><i class="fa fa-floppy-o"></i> guardar</a> -->




  <div id="box" style="border: 1px solid #dddddd; padding: 10px; margin-bottom: 10px;">

<!-- Tabs Recursos -->
    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
      <!--Lista de Pestañas -->
    <ul id="myTabs" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#hh" id="hh-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false"><i class="fa fa-clock-o"></i> Horas Personas</a></li>
    <li role="presentation" class=""><a href="#materiales" role="tab" id="materiales-tab" data-toggle="tab" aria-controls="materiales" aria-expanded="true"><i class="fa fa-briefcase"></i> Materiales</a></li>
    <li role="presentation" class=""><a href="#insumos" id="insumos-tab" role="tab" data-toggle="tab" aria-controls="insumos" aria-expanded="false"><i class="fa fa-list-ol"></i> Insumos</a></li>
    <li role="presentation" class=""><a href="#herramientas" role="tab" id="herramientas-tab" data-toggle="tab" aria-controls="herramientas" aria-expanded="true"><i class="fa fa-wrench"></i> Herramientas</a></li>
    <li role="presentation" class=""><a href="#repuestos" id="repuestos-tab" role="tab" data-toggle="tab" aria-controls="repuestos" aria-expanded="false"><i class="fa fa-cog"></i> Repuestos</a></li>
    </ul>
    <!-- Fin Pestañas -->

    <!-- Contenido Tabs Pestañas -->
    <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="hh" aria-labelledby="hh-tab">
      <br><br><br>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="materiales" aria-labelledby="materiales-tab">
        <br><br><br>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="insumos" aria-labelledby="insumos-tab">
        <br><br><br>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="herramientas" aria-labelledby="herramientas-tab">
        <br><br><br>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="repuestos" aria-labelledby="repuestos-tab">
        <br><br><br>
    </div>
    </div>
    </div>
<!-- Fin Tabs Recursos -->

  </div>
</div>

  </div>
  </div>
  </div>
</div>


    </div>



    </div>

@endsection


@section('bottom_js')


<script>

$(document).ready(function(){

               
              $('#formulario').on('submit', function(e) 
              {

                   e.preventDefault();


                      $.ajaxSetup({
                            headers: { 'X-XSRF-Token': $('meta[name="csrf-token"]').attr('content') }
                        });

                      $.ajax({
                          type: 'POST',
                          url: $(this).attr('action'),
                          data: $(this).serialize(),
                           dataType: "json",
                          beforeSend: function(){
                            
                          },
                          complete: function(data){
                            
                          },
                          success: function (data) 
                          {
                          
                            console.log(data);
                    
         var appendTxt = 
          '<tr ides="'+data.id+'">'+
          '<td>'+data['actividad']+'</td>'+
          '<td  style="text-align: center;"><button  type="button"  det="'+data.id+'" detalle="'+data['detalle']+'" onclick="detalle(this)" data-toggle="modal" class="btn btn-link"  data-target="#Edit"><i class="fa fa-plus"></i></button></td>'+
          '<td style="text-align: center;"><button  type="button" id="'+data.id+'"  onclick="deleteUser('+data.id+',this)"class="btn btn-link" style="width: 40px;"><i class="fa fa-times"></i></button></td>'+
          '<td style="text-align: center;"><button type="button"  onclick="#" class="btn btn-link" style="width: 40px;"><i class="fa fa-exclamation-triangle"></i></button></td>'+
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



        $('#agregar').on('click', function(e) 
        {
      
            if($("#pruebass").val().length > 1   &&  $("#detalless").val().length > 1 ) 
            {
              
                $('#botonguardar').removeAttr("disabled")
            }
                  
        });




       $('#formularioeditar').on('submit', function(e) 
      {  

/*
                  var idform = $("#idactividads").val();
                  var textarea = $("#actividadss").val();
                 // console.log(textarea);


                    var ids = [];

$("#tableId > tbody").find("tr").each(function() {

    var id = $(this).attr("ides");
     console.log(id);
          console.log(idform);

     if(id==idform)
     {
      console.log("entra");
       $(this).find("td:first").text(textarea);
     }


});
*/



               e.preventDefault();
              //var CSRF_TOKENS = $('meta[name="csrf-token"]').attr('content');

               $.ajaxSetup({
                headers: { 'X-XSRF-Token': $('meta[name="csrf-token"]').attr('content') }
            });

              $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  data: $(this).serialize(),
                  dataType: "json",
                  beforeSend: function(){
                    
                  },
                  complete: function(data){
                    
                  },
                  success: function (data) 
                  {
                  
                    console.log(data);
                   // location.reload();
                 
                
                  },
                  error: function(errors){
                    console.log(errors);
                  
                  }
              });



    }); 


        $("#guardarcambios").on('click', function() {


      
        $('#Edit').modal('hide');
    }); 
 


 

});


</script>



<script >
  
  function detalle(value) 
  {
   
        console.log(value.getAttribute("detalle"));
           var det = value.getAttribute("det")
        var detalles = value.getAttribute("detalle")
        document.getElementById("actividadss").value = detalles;
            document.getElementById("idactividads").value = det;
      
 }  


  function deleteUser(id,variable) 
  {
   
    console.log(id);
    
      if (confirm("¿ ESTÁ SEGURO QUE DESEA ELIMINAR ESTA ACTIVIDAD ?")) 
      {
     
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

               $.ajax({
                type: "DELETE",
                url: '{{ route('procedimientos.destroy') }}', 
                data: {_token: CSRF_TOKEN, ids:id },
           
                success: function(affectedRows) {
                   console.log(affectedRows);

                    deleteRow(variable);

                      var rowCount = $("#tableId > tbody").children().length;
                      if(rowCount == 0)
                      {
                          $('#botonguardar').attr("disabled","disabled")

                      }

                                 
                }
            });
      }
      
 }  

 function deleteRow(t)
{ 
    
    var row = t.parentNode.parentNode;
    document.getElementById("tableId").deleteRow(row.rowIndex);
    console.log(row); 
 
}      

</script>



@endsection