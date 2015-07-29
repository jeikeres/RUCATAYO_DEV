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
 
	  </div>




	  <div id="box_sw_content">

      <div class="form-group">
                <label for="exampleInputEmail1">Nombre Procedimiento</label>
                <input class="form-control" id="exampleInputEmail1" name="name_proced" style="width: 50%;" maxlength="40" value="{{$proced_base }}" disabled>
                

        </div>

            <div class="form-group ">
              {!! Form::select('id_grupo', $grupo_trabajo , $seleccionado, ['class' => 'form-control' , "style" => "width:50%;" ,  'disabled' => 'disabled']) !!}
            </div>  




<!-- Modal -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">


    <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h5 class="modal-title" id="myModalLabel">Editar Actividad</h5>
        </div>
      
        <div class="modal-body">
  
  
  {!! Form::open(['route' => 'procedimientos.vereditarajax','method' => 'POST','id'=>'formularioeditar']) !!}

        {!! Form::hidden('id_actividad', 'secret', array('id' => 'id_actividad')) !!}

          {!! Form::hidden('id_procedimiento', $id_procedimiento) !!}


  

                <div class="form-group">
        <!--label id=nombre el primero-->
        {!! Form::label('actividad', 'Actividad') !!}
        {!! Form::text('actividad',null,['class' =>'form-control']) !!}
        </div>


                <div class="form-group">
        <!--label id=nombre el primero-->
        {!! Form::label('detalle', 'Detalle') !!}
        {!! Form::text('detalle',null,['class' =>'form-control']) !!}
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
<!-- FIN DE Modal -->







	  	 	<table id="tableId" class="table table-bordered">
      <thead>
        <tr>
          <th style="text-align:center;" width="12%">Orden</th>
          <th>Actividad</th>
            <th>Detalle</th>
               <th style="text-align: center; width: 8%;">Editar</th>
          <th style="text-align: center; width: 8%;">Eliminar</th>

       
        
        </tr>
      </thead>
      <tbody>     
           @foreach($acti as $a)
            <tr>
             <td><input class="form-control gener" id="genera"  value="{{$a->item}}"></td>
              <td>{{$a->name_actividad}}</td>
              <td>{{$a->detalle }}</td>
        






<td  style="text-align: center;">  <button  class="btn btn-link" id="{{$a->id_actividad}}"  name="{{$a->name_actividad}}" detalle="{{ $a->detalle }}" orden="{{ $a->item }}" rel="abrir" data-toggle="modal" data-target="#Edit"
><i class="fa fa-plus"></i></button></td>




<td   style="text-align: center;"><button  onclick="deleteUser({{$a->id_actividad}},this)" type="button" class="btn btn-link"
><i class="fa fa-times"></i></button>
</td>


                 
            </tr>
          @endforeach
    

      </tbody>
    </table>
  
 <td>  <button class="btn btn-sm btn-success" id="generar" >Generar Orden</a></button>   



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
  $(document).ready(function(e) {                                        
        $('button[rel="abrir"]').click(function(e) {
                            e.preventDefault();
                            alert("hola");
                 

                var id = $(this).attr('id');
              
                var actividad = $(this).attr('name');
                var detalle = $(this).attr('detalle');
     
 
                //y si queres podes enviarla de vuelta a la pagina, hacia la ventana modal:
                document.getElementById("id_actividad").value = id;
               
                document.getElementById("actividad").value = actividad;
                document.getElementById("detalle").value = detalle;
                
            });

    });



  $(document).ready(function(e) {    

    
      $('#formularioeditar').on('submit', function(e) 
      {

               e.preventDefault();
    var id_campus=2;
    console.log(id_campus);

    
     

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
                    location.reload();
                 
                
                  },
                  error: function(errors){
                    console.log(errors);
                  
                  }
              });



    });


    $("#guardarcambios").on('click', function() {


      
        $('#Edit').modal('hide');
    }); 






    $("#generar").on('click', function() {

       var ids = [];
       
      $(".gener").each(function() {
               ids.push($(this).val());
        });

        console.log(ids);
    

              var CSRF_TOKENS = $('meta[name="csrf-token"]').attr('content');
           
              $.ajax({
                  type: 'POST',
                  url: '{{ route('procedimientos.vereditarajax2') }}',
                  data :{_token: CSRF_TOKENS, id_procedimiento:{{$id_procedimiento}}, id:ids},
                  dataType: "json",
                  beforeSend: function(){
                    
                  },
                  complete: function(data){
                    
                  },
                  success: function (data) 
                  {
                  
                   // console.log(data);
                    location.reload();
                 
                
                  },
                  error: function(errors){
                    console.log(errors);
                  
                  }
              });
    
   
     });



    }); 



 
</script>

<script>
  
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
                                 
                }
            });
      }
      
 }  

 function deleteRow(t)
{console.log("entra");

    var row = t.parentNode.parentNode;
    document.getElementById("tableId").deleteRow(row.rowIndex);
    console.log(row); 
}      

</script>

@endsection