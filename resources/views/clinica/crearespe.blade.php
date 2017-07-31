<div class='form'>
<form action="/clinica/apicrearespecialidad" method='post'>
    {{csrf_field()}}
    {{csrf_token()}}
    <div class="form">
        <label for="">Nombre de Especialidad</label>
        <input class="form-control" type="text" name="nombre" ng-model="especialidad1.nombre">
    </div>
    <input type="button" ng-click="onclickEnviar()" value="Enviar" class="btn success">
</form>
</div>