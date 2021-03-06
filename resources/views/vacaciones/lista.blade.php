@extends('layouts.principal')

@section('content')
@if(Session::has('message'))
<br>
<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link"></a>
  {{Session::get('message')}}
</div>
@endif
<div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Lista de Vacaciones</h2>
            </div>
            <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
                <tr>
                  <th>ID Empleado</th>
                  <th>Nombre Empleado</th>
                  <th>Tipo de Vacaciones</th>
                  <th>Cantidad de Días</th>
                  <th>Fecha de Solicitud</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Final</th>
                  <th>Monto</th>
                  <th>Accion</th>
                </tr>
            </thead>
            @foreach($vac as $vacacion)
              <tbody>
                      <tr>
                      <td>{{$vacacion -> emp_id}}</td>
                      <td>{{$vacacion -> nomb}}</td>
                      <td>{{$vacacion -> tVacaciones}}</td>
                      <td>{{$vacacion -> num_vac}}</td>
                      <td>{{$vacacion -> fechaS}}</td>
                      <td>{{$vacacion -> fechaIni}}</td>
                      <td>{{$vacacion -> fechaFin}}</td>
                      <td>{{$vacacion -> monto}}</td>
                      <td><button type="button" class="btn btn-sucess">{!!link_to_route('vacaciones.edit', $title = 'Editar', $parameters = $vacacion->id)!!}</button></td>
                      </tr>
              </tbody>
            @endforeach
            </table>
</div>

  {!!$vac->render()!!}

  
         @stop