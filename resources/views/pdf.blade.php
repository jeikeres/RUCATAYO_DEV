@extends('layout')

@section('title')
    <title>pdf</title>

    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
    .tg .tg-4mn7{background-color:#ffffff;color:#ffffff}
    .tg .tg-3bm2{background-color:#ffffff;color:#ffffff}
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@section('titulo')

<div id="titulo-task-page-content-wrapper"><i class="fa fa-list" style="color:#1ab394; margin-right:8px;"></i> Pdf

</div>

@endsection

@section('contenido')

<div class="container" style="margin-top:50px;margin-left:50px;">

<div class="row">

<div class="col-md-12">


<table class="tg" style="undefined;table-layout: fixed; width: 753px">
  <colgroup>
  <col style="width: 251px">
  <col style="width: 301px">
  <col style="width: 201px">
  </colgroup>
    <tr>
      <th class="tg-4mn7" rowspan="2">{!! Html::image('images/logo.png','logo',array('style' => 'height:100px;')); !!}</th>
      <th class="tg-4mn7" rowspan="2" style="color:black;">
        <strong>PAUTA ELABORACIÓN PROCEDIMIENTO DE TRABAJO</strong>
     </th>
      <th class="tg-4mn7" style="color:black;">
          PR-SSO-02
      </th>
    </tr>
    <tr>
      <td class="tg-3bm2" style="color:black;">
      N° Rev.:0
      </td>
    </tr>
    <tr>
      <td class="tg-4mn7" rowspan="2" style="color:black;">
        Elaborado por: <br>
        Fecha:09/06/2015
      </td>
      <td class="tg-4mn7" rowspan="2" style="color:black;">
        Aprobado por: <br>
        Fecha:
      </td>
      <td class="tg-4mn7" style="color:black">
        Fecha:08/06/15
      </td>
    </tr>
    <tr>
      <td class="tg-3bm2" style="color:black;">
       Página <strong>1</strong> de <strong>5</strong>
      </td>
    </tr>
  </table>

<br>

<div class="row" style="font-size:15px;">
<ol type=”1” start=”10”>
<li> Objetivo </li>
<li> Alcance </li>
<li> Responsabilidades </li>
<li> Instructivol </li>
<li> Recursos humanos y materiales </li>
<li> Referencia </li>
<li> Anexos </li>
</ol>
</div>


</div>

</div>

</div>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">

          <form method="POST" action="storage/create" accept-charset="UTF-8" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-md-4 control-label">Nombre archivo</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre_a" >
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" >
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Apellido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" >
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">PROC_BASE </label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="rut" >
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4"><br>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>


          <input type="hidden" name="_token" value="{{ csrf_token() }}">


          </form>
        </div>
      </div>
    </div>
  </div>



@endsection