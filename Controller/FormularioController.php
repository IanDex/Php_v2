<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 02/09/2018
 * Time: 10:12
 */

require_once (__DIR__.'/../Model/Formulario.php');

if(!empty($_POST['action'])){
    FormularioController::main($_POST['action']);
}else{
    echo "Ninguna Accion";
}
class FormularioController
{

    static function main($action){
        if ($action == "crear"){
            FormularioController::crear();
        }else if ($action == "num_proceso"){
            FormularioController::num_proceso();
        }else if ($action == "update"){
            FormularioController::update();
        }
    }

    static public function crear (){
        try {
            $Datos = array();
            $Datos['num_pro'] = $_POST['num_proceso'];
            $Datos['descripcion'] = $_POST['descripcion'];
            $Datos['sede'] = $_POST['sede'];
            $Datos['presupuesto'] = $_POST['presupuesto'];
            $Formulario = new Formulario($Datos);
            $Formulario->insert();
            echo "True";
        } catch (Exception $e) {
            echo "False";
        }
    }

    public function buscarAll (){
        try {
            return Formulario::getAll();
        } catch (Exception $e) {
        }
    }

    public function num_proceso(){
        try {

            return Formulario::getNum_Proceso();
        } catch (Exception $e) {
        }
    }

    static public function update (){
        try {
            $Datos = array();

            $Datos['descripcion'] = $_POST['descripcion'];
            $Datos['sede'] = $_POST['sede'];
            $Datos['presupuesto'] = $_POST['presupuesto'];
            $Datos['fecha'] = $_POST['fecha'];
            $Datos['id'] = $_POST['id'];
            $Formulario = new Formulario($Datos);
            $Formulario->editar();
            echo "True";
        } catch (Exception $e) {
            echo "False";
        }
    }

}
?>