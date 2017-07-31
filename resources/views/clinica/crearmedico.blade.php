<div class='form'>
<form action="/clinica/apicrearespecialidad" method='post'>
    {{csrf_field()}}
    {{csrf_token()}}
    <div class="form">
        <label for="">CI</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad.nombre">
    </div>
    <div class="form">
        <label for="">Nombre</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad.nombre">
    </div>
    <div class="form">
        <label for="">Apellido Paterno</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad.nombre">
    </div>
    <div class="form">
        <label for="">Apellido Materno</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad.nombre">
    </div>
    <div class="form">
        <label for="">Fecha de Nacimiento</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad.nombre">
    </div>
    <div class="form">
        <label for="">Direccion</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad.nombre">
    </div>

    <input type="button" ng-click="onclickEnviarMedico()" value="Enviar" class="btn success">
</form>
</div>