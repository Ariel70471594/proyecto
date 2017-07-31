@extends('layouts/app')
@section('content')
<div ng-app="clinica" ng-controller="servicio">

    <h1>Registrar ficha</h1>

<form action="/clinica/apicrearpaciente" method='post'>
    {{csrf_field()}}
    <div class="form">
        <label for="">CI</label>
        <input class="form-control" type="text" name="ci" ng-model="ficha.ci">
    </div>
    <div class="form">
        <label for="">Nombre</label>
        <input class="form-control" type="text" name="nombre" ng-model="ficha.nombre">
    </div>
    <div class="form">
        <label for="">Apellido Paterno</label>
        <input class="form-control" type="text" name="ape_pat" ng-model="ficha.ape_pat">
    </div>
    <div class="form">
        <label for="">Apellido Materno</label>
        <input class="form-control" type="text" name="ape_mat" ng-model="ficha.ape_mat">
    </div>
    <div class="form">
        <label for="">Fecha de Nacimiento</label>
        <input class="form-control" type="date" name="fecha_nac" ng-model="ficha.fecha_nac">
    </div>
    <div class="form">
        <label for="">Sexo</label>
        <input class="form-control" type="text" name="sexo" ng-model="ficha.sexo">
    </div>
    <div class="form">
        <label for="">Grupo Sanguinio</label>
        <input class="form-control" type="text" name="grupo_sanguinio" ng-model="ficha.grupo_sanguinio">
    </div>
    <div class="form">
        <label for="">Direccion</label>
        <input class="form-control" type="text" name="direccion" ng-model="ficha.direccion">
    </div>


    <div class="form">Servicio:
        <SELECT class="form-control" ng-model="ficha.servicio" ng-options="item as item.nombre_servicio for item in servicio track by item.id" >
        </SELECT>
    </div>

    <div class="form">
        <label for="">Fecha de atencion</label>
        <input class="form-control" type="date" name="fecha_atencion" ng-model="medico.fecha_atencion">
    </div>


    <div>turno:
        <SELECT class="form-control" ng-model="turno.servicio" ng-options="item as item.nombre_turno for item in turno track by item.id" >
        </SELECT>
    </div>
    
    <input type="button" ng-click="onclickEnviarficha()" value="Enviar" class="btn success">
</form>


</div>
@endsection