@extends('layouts/app')
@section('content')
<div ng-app="clinica" ng-controller="servicio">

    <h1>Registrar Servicio</h1>


     <div>Especialidad:
        <SELECT ng-model="servicio.medico" ng-options="item as ('Dr. '+item.nombre + ' ' + item.ape_pat + ' ' + item.ape_mat +' ESPECIALIDAD '+ item.nombre_especialidad ) for item in lista track by item.id" >
        </SELECT>
    </div>
    
    <label>Medico</label> 
    <div class='form'>


<form action="/clinica/apicrearservicio" method='post'>
    {{csrf_field()}}
    <div class="form">
        <label for="">Nombre del servicio: </label>
        <input class="form-control" type="text" name="nombre_servicio" ng-model="servicio.nombre_servicio">
    </div>
    <div class="form">
        <label for="">Descripcion del servicio: </label>
        <input class="form-control" type="text" name="descripcion" ng-model="servicio.descripcion">
    </div>
    <div class="form">
        <label for="">Costo: </label>
        <input class="form-control" type="number" name="costo" ng-model="servicio.costo">
    </div>

    <input type="button" ng-click="onclickEnviarServicio()" value="Enviar" class="btn success">
</form>

 <table class="table">
    <tr>
    <th>Servicio:</th>
    <th>Descripcion:</th>
    <th>Costo:</th>
    <th>Nombre:</th>
    <th>Apellido Paterno:</th>
    <th>Apellido Materono:</th>
    </tr>

    <tr ng-repeat="item in servicio">
        <td>@{{item.nombre_servicio}}</td>
        <td>@{{item.descripcion}}</td>
        <td>@{{item.costo}}</td>
        <td>@{{item.nombre}}</td>
        <td>@{{item.ape_pat}}</td>
        <td>@{{item.ape_mat}}</td>
    </tr>

</table>
</div>


@endsection