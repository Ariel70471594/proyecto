var app=angular.module('clinica',['ui.router']);
app.controller('servicio',function($scope,$http,$state){
     $scope.especialidad1={};
      $scope.ficha={};
      $scope.medico={};
       $scope.servicio={};
    $scope.onclickEnviar=function(){
        console.log($scope.especialidad1);
        re=$scope.especialidad1;
        $http.post('/clinica/apicrearespecialidad',re).then(function(server){
            if(server.data.estado==1){
                cargar_especialidad();
                $state.go('button');
                $scope.especialidad1={};
            }
        });
    }
    $scope.onclickEnviarficha=function(){
       
        $http.post('/clinica/apicrearficha',$scope.ficha).then(function(server){
            if(server.data.estado==1){
                $scope.ficha={};
                 //
               // cargar_especialidad();
            }
        });
    }
    $scope.onclickEnviarMedico=function(){
        console.log($scope.medico.especialidad);
       // re=$scope.especialidad1;
       //$scope.medico.id_especialidad=$scope.especialidad.id;
        $http.post('/clinica/apicrearmedico',$scope.medico).then(function(server){
            if(server.data.estado==1){
                $scope.medico={};
                 cargar_medico();
               // cargar_especialidad();
            }
        });
    }
    $scope.onclickEnviarServicio=function(){
       // console.log($scope.medico.especialidad);
       // re=$scope.especialidad1;
       //$scope.medico.id_especialidad=$scope.especialidad.id;
        $http.post('/clinica/apicrearservicio',$scope.servicio).then(function(server){
            if(server.data.estado==1){
                $scope.servicio={};
                 cargar_servicio();
               // cargar_especialidad();
            }
        });
    }


    function cargar_especialidad(){
        $http.get('/clinica/getespecialidad').then(function(server){
            if(server.data.estado==1)
                $scope.especialidad=server.data.lista;
            else
                alert("Error en el server"+server.data.error);
        });
    }
    function cargar_medico(){
        $http.get('/clinica/listarmedico').then(function(server){
            if(server.data.estado==1)
                $scope.lista=server.data.lista;
            else
                alert("Error en el server"+server.data.error);
        });
    }
    function cargar_servicio(){
        $http.get('/clinica/listarservicio').then(function(server){
            if(server.data.estado==1)
                $scope.servicio=server.data.lista;
            else
                alert("Error en el server"+server.data.error);
        });
    }
    function cargar_turno(){
        $http.get('/clinica/listarturno').then(function(server){
            if(server.data.estado==1)
                $scope.turno=server.data.lista;
            else
                alert("Error en el server"+server.data.error);
        });
    }
    cargar_medico();
    cargar_especialidad();
    cargar_servicio();
    cargar_turno();
});

app.config(function($stateProvider){
    $stateProvider
    .state('nuevoEspecialidad',{
        views:{
            'contenido':{
                templateUrl:'/clinica/crearEspecialidad',
            }
        }
    })
    .state('button',{
        views:{
            'contenido':{
                template:'<button  class="btn btn-succes" ui-sref="nuevoEspecialidad" >nuevo especialidad</button>',
            }
        }
    });

});