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
  
  
       {!! Form::open(['route' => 'procedimientos.vereditarajax','method' => 'POST','id'=>'formularioeditar']) !!}

       


              <div class="form-group">
            <!--label id=nombre el primero-->
      
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
 
                  

</div>


        {!! Form::hidden('id_procedimiento', $id_procedimiento) !!}


  {!! Form::close() !!}


	  	 	<table id="tableId" class="table table-bordered">
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
	  	 		<button class="btn btn-info btn-ms" type="submit">H.H.</button>
	  	 		<button class="btn btn-info btn-ms" type="submit">Materiales</button>
	  	 		<button class="btn btn-info btn-ms" type="submit">Insumos</button>
	  	 		<button class="btn btn-info btn-ms" type="submit">Herramientas</button>
	  	 		<button class="btn btn-info btn-ms" type="submit">Repuestos</button>

	



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
          '<tr>'+
          '<td>'+data['actividad']+'</td>'+
          '<td  style="text-align: center;"><button  type="button"  id="'+data['detalle']+'" onclick="detalle(this)" data-toggle="modal" class="btn btn-link"  data-target="#Edit"><i class="fa fa-plus"></i></button></td>'+
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


 

});


</script>



<script >
  
  function detalle(value) 
  {
   
        console.log(value.getAttribute("id"));
        var detalles = value.getAttribute("id")
        document.getElementById("actividadss").value = detalles;
      
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