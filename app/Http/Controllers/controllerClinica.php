<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Especialidad;
use App\Persona;
use App\Medico;
use App\Servicio;
use App\Turno;
use App\Ficha;
use App\Paciente;
class controllerClinica extends Controller
{
    public function inicio(){
        return view("clinica.index");
    }
     public function servicio(){
        return view("clinica.servicio");
    }
     public function ficha(){
        return view("clinica.ficha");
    }
    public function getespecialidad(){
        $es= Especialidad::All();
        return['lista'=>$es,'estado'=>1];
    }
    public function listarturno(){
        $es= Turno::All();
        return['lista'=>$es,'estado'=>1];
    }
    public function listarmedico(){
        $es= Persona::select('persona.nombre','medico.id','persona.ape_pat','persona.ape_mat','persona.ci','persona.fecha_nac','medico.direccion_ofi', 'especialidad.nombre_especialidad')
        ->join('medico','medico.id','=','persona.id')
        ->join('especialidad','especialidad.id','=','medico.id_especialidad')
        ->get();
        return['lista'=>$es,'estado'=>1];
    }
    public function listarservicio(){
        $es= Servicio::select('servicio.id','servicio.nombre_servicio','servicio.descripcion','servicio.costo','persona.nombre','persona.ape_pat','persona.ape_mat')
        ->join('medico','medico.id','=','servicio.id_medico')
        ->join('persona','medico.id','=','persona.id')
        ->get();
        return['lista'=>$es,'estado'=>1];
    }
    public function crearEspecialidad(){
         return view('clinica/crearespe');
    }
        public function post(Request $reque){
        try{

            $nueva=new Especialidad;
            $nueva->nombre=$reque->input('nombre');
            $nueva->save();
            return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0];
        }

        return "mala";
    }
    public function apicrearespecialidad(Request $re){
        try{
            $nueva=new Especialidad;
            $nueva->nombre_especialidad=$re->input('nombre');
            $nueva->save();
            return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0];
        }

        return "mala";
    }
    public function apicrearmedico(Request $re){
        try{
            $pers=new Persona;
            $med=new Medico;
            $dd=$re->all();
            $pers->ci=$re->input('ci');
            $pers->nombre=$re->input('nombre');
            $pers->ape_pat=$re->input('ape_pat');
            $pers->ape_mat=$re->input('ape_mat');
            $pers->fecha_nac=$re->input('fecha_nac');
            $pers->save();
            $med->id=$pers->id;
            $med->direccion_ofi=$re->input('direccion');
            $med->id_especialidad=$dd['especialidad']['id'];
            $med->save();
            return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0];
        }

        return "mala";
    }
    public function apicrearficha(Request $re){
        try{
            $pers=new Persona;
            $med=new Paciente;
            $ficha=new Ficha;
            $dd=$re->all();
            $pers->ci=$re->input('ci');
            $pers->nombre=$re->input('nombre');
            $pers->ape_pat=$re->input('ape_pat');
            $pers->ape_mat=$re->input('ape_mat');
            $pers->fecha_nac=$re->input('fecha_nac');
            $pers->save();
            $med->id=$pers->id;
            $med->direccion=$re->input('direccion');
            $med->sexo=$re->input('sexo');
            $med->grupo_sanguinio=$re->input('grupo_sanguinio');
            $med->save();
            $ficha->id_paciente=$pers->id;
            $ficha->id_servicio=$dd['servicio']['id'];
            $ficha->fecha_atencion==$re->input('fecha_atencion');
           // $ficha->id_turno=$dd['turno']['id'];
            $ficha->estado_ficha="1";
             $ficha->save();
            return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0];
        }

        return "mala";
    }
    public function apicrearservicio(Request $re){
        try{
        $serv=new Servicio;
         $dd=$re->all();
         $serv->nombre_servicio=$re->input('nombre_servicio');
         $serv->descripcion=$re->input('descripcion');
         $serv->costo=$re->input('costo');
         $serv->id_medico=$dd['medico']['id'];
         $serv->save();
          return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0];
        }

        return "mala";
         
    }


}
