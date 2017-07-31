@extends('layouts/app')
@section('content')
<div ng-app="clinica" ng-controller="servicio">

    <h1>Registrar Medico</h1>
    <!--<label>Especialidad</label> 
    
    <select ng-model="id_especialidad" class='form-control'>
        <option ng-repeat="item in especialidad" value="@{{item.id}}">
            @{{item.nombre}}</option>
    </select>-->
     <div>Especialidad:
        <SELECT ng-model="medico.especialidad" ng-options="item as item.nombre_especialidad for item in especialidad track by item.id" >
        </SELECT>
    </div>
    <div ui-view="contenido" > <button  class="btn btn-succes" ui-sref="nuevoEspecialidad" >nueva especialidad</button></div>
   <!-- <div ui-view="button" ></div>-->
    <label>Medico</label> 
    <div class='form'>


<form action="/clinica/apicrearficha" method='post'>
    {{csrf_field()}}
    <div class="form">
        <label for="">CI</label>
        <input class="form-control" type="text" name="ci" ng-model="medico.ci">
    </div>
    <div class="form">
        <label for="">Nombre</label>
        <input class="form-control" type="text" name="nombre" ng-model="medico.nombre">
    </div>
    <div class="form">
        <label for="">Apellido Paterno</label>
        <input class="form-control" type="text" name="ape_pat" ng-model="medico.ape_pat">
    </div>
    <div class="form">
        <label for="">Apellido Materno</label>
        <input class="form-control" type="text" name="ape_mat" ng-model="medico.ape_mat">
    </div>
    <div class="form">
        <label for="">Fecha de Nacimiento</label>
        <input class="form-control" type="date" name="fecha_nac" ng-model="medico.fecha_nac">
    </div>
    <div class="form">
        <label for="">Direccion</label>
        <input class="form-control" type="text" name="direccion" ng-model="medico.direccion">
    </div>

    <input type="button" ng-click="onclickEnviarMedico()" value="Enviar" class="btn success">
</form>

 <table class="table">
    <tr>
    <th>CI:</th>
    <th>Nombre:</th>
    <th>Apellido Paterno:</th>
    <th>Apellido Materono:</th>
    <th>Fecha de nacimiento: </th> 
    <th>Direccion: </th> 
    <th>Especialidad: </th>
    </tr>

    <tr ng-repeat="item in lista">
        <td>@{{item.ci}}</td>
        <td>@{{item.nombre}}</td>
        <td>@{{item.ape_pat}}</td>
        <td>@{{item.ape_mat}}</td>
        <td>@{{item.fecha_nac}}</td>
        <td>@{{item.direccion_ofi}}</td>
        <td>@{{item.nombre_especialidad}}</td>
    </tr>

</table>
</div>
@endsection