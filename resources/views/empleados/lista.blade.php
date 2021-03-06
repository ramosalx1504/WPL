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
                <h2 class="page-header">Lista de Empleados</h2>
            </div>
            <table class="table table-striped" id="tblGrid">
            <thead id="tblHead">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Primer Apellido</th>
                  <th>Departamento</th>
                  <th>Cuenta Bancaria</th>
                  <th>Email</th>
                  <th>Accion</th>
                </tr>
            </thead>
            @foreach($emp as $empleado)
              <tbody>
                      <tr>
                      <td>{{$empleado -> numId}}</td>
                      <td>{{$empleado -> nomb}}</td>
                      <td>{{$empleado -> ape1}}</td>
                      <td>{{$empleado -> dept_id}}</td>
                      <td>{{$empleado -> cBanc}}</td>
                      <td>{{$empleado -> email}}</td>
                      <td><button type="button" class="btn btn-sucess">{!!link_to_route('empleados.edit', $title = 'Editar', $parameters = $empleado->id)!!}</button></td>
                      </tr>
              </tbody>
            @endforeach
            </table>
</div>

  {!!$emp->render()!!}

  
         @stop