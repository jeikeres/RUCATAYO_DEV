@extends('layout')

@section('title')
  <title>procedimientos</title>
@endsection

@section('titulo')

<div id="titulo-task-page-content-wrapper"><i class="fa fa-list" style="color:#1ab394; margin-right:8px;"></i> Modulo de Planificación

  <div id="titulo-task-derecha"> <i class="fa fa-user" style="margin-right: 3px;"></i> {{Auth::user()->name}}</div>

</div>

@endsection


@section('contenido')


		<div id="contenedor-default">
			
			<div class="container">
			<div class="row">

			  <div class="col-xs-12 col-md-8">
			  	<div id="box_sw">
			  	 	<div id="box_sw_title">
			  	 		<i class="fa fa-list-alt" style="margin-right: 8px;"></i> Formulario Planificación de Mantenimiento
			  	 		
			  	 	</div>
			  	 	<div id="box_sw_content">

<!-- FORMULARIO INGRESO ACTIVO =============================================================================== -->
			  	 		
			  	 		{!! Form::open(['route' => 'planificacion.actividad','method' => 'POST','class' => 'form-signin' ,  "id"=>"formulario"]) !!}

							<div class="form-group">
						    <label for="exampleInputEmail1">Codigo de Activo ( Equipo o Componente )</label>
						    <input class="form-control" id="exampleInputEmail1" name="cod_equipo" placeholder="Ej: ABCD0001" style="width: 50%;" maxlength="15" required> 
						</div>

						<div class="form-group">
						    <label for="exampleInputPassword1">Descripción de Mantenimiento</label>
						    <input class="form-control" name="desc_mantt" placeholder="Ej: Cambio de Carcaza" maxlength="50" required>
						</div>
					

			  	 		<div class="form-group">
						<label for="exampleInputEmail1">Tipo de Mantenimiento</label>	
		{!! Form::select('tipomantt', $tipo_mtto , null , ['class' => 'form-control' , "style" => "width:50%;" ]) !!}
		       
						</div>



						<div class="form-group">
						<label for="exampleInputEmail1">Grupo de Trabajo</label>	
			  	
					      {!! Form::select('id_grupo', $grupo_trabajo , null , ['class' => 'form-control' , "style" => "width:50%;" ]) !!}
			   
					</div>

			

						<div class="form-group">
						    <label for="exampleInputEmail1">Frecuencia ( Dias )</label>
						    <input class="form-control" id="exampleInputEmail1" name="frecuencia" placeholder="Ej: 30" style="width: 50%;" maxlength="5" required>
						   
						</div>


								<div class="form-group">
						<label for="exampleInputEmail1">Condicion de Equipo</label>	
			  	 	    {!! Form::select('id_mtto', $operacion_mtto , null , ['class' => 'form-control' , "style" => "width:50%;" ]) !!}
						</div>





						<div class="form-group">
						   <label for="exampleInputEmail1">Fecha Ultimo Mantenimiento Ejecutado</label><br>
						    <div class="input-group">
						   <div class="input-group-addon"><i class="fa fa-calendar"></i></div>

                 
                        <input  style="width: 50%;" type="date" class="form-control" name="mantt_ejec" required>
			
						</div></div>
							
						<input class="hidden" name="proced_trabajo" value="1">

						 <a title="Ingrese Actividad" id="guardar"  class="btn btn-primary" style="  text-decoration: inherit;
  color: antiquewhite;" href="#" >Guardar</a>

						  <button type="submit" class="btn btn-success">Ingresar Actividad</button>
						

 <!--                
 <a  class="btn btn-success" style="  text-decoration: inherit;
  color: antiquewhite;" href="{{ url('procedimientos') }}">Ingresar Procedimiento</a>
  -->

   <a id="limpiar" class="btn btn-danger" style="  text-decoration: inherit;
  color: antiquewhite;" href="#">Limpiar</a>
						
					   {!! Form::close() !!}






<!-- MODAL =============================================================================== -->

  <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>







<!-- FIN MODAL =============================================================================== -->


<!-- FIN FORMULARIO INGRESO ACTIVO =============================================================================== -->

			  	 	</div>
			  	</div>
			  </div>

			  <div class="col-xs-6 col-md-4">
			  	<div id="box_sw">

			  	 	<div id="box_sw_title">
			  	 		<i class="fa fa-sitemap" style="margin-right: 8px;"></i> Unidad Productiva
			  	 		
			  	 	</div>

			  	 	<div id="box_sw_content" style="max-height:500px; overflow-y: scroll;">
			  	 		

			  	 	<!-- TREELIST ============================================================================================================================= -->	
							
					<!-- FIN TREELIST ============================================================================================================================ -->


			  	 	</div>
			  	</div>
			  	<br>
			</div>
		</div>

		</div>


</div>

@endsection




@section('bottom_js')


 {!! Html::script('js/bootstrap-datepicker.js'); !!}
 
<script>
$(function() {
$('#datepicker').datepicker({
  inline: true
});
});
</script>


<script>
	
$(document).ready(function() {


  $('#limpiar').on('click', function(e) 
  {
  

    $('#formulario').find('input').each(function() {
      switch(this.type) {
         case 'password':
         case 'text':
           $(this).val('');
              break;
         case 'hidden':
              $(this).val('');
              break;
         case 'checkbox':
         case 'date':
              $(this).val('');
         case 'radio':
              this.checked = false;
      }
   });
  

  });

});

</script>




@endsection