<?php
session_start();
require_once (__DIR__ . '/../Model/Login.php');

if(!empty($_GET['action'])){
    LoginCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 01/09/2018
 * Time: 12:00
 */
class LoginCtlr
{

    static function main($action){
        if($action == "Login"){
            LoginCtlr::Login();
        }else if($action == "CerrarSession"){
            LoginCtlr::CerrarSession();
        }
    }

    public function Login (){
        try {
            $User = $_POST['User'];
            $md5 = md5($_POST['Password']);
            $Password = $md5;
            if(!empty($User) && !empty($Password)){
                $respuesta = Login::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['id_users'] = $respuesta['id_users'];
                    echo TRUE;
                }else if($respuesta == "Password Incorrecto"){
                    echo "<script> not('La Contraseña no es incorrecta'); $('#form-login').addClass('js-animating-object animated shake'); $('#_error').addClass('error_'); document.getElementById('btnEnviar').disabled = true;";
                    echo "function quitarclase(){ $('#form-login').removeClass('js-animating-object animated shake'); document.getElementById('btnEnviar').disabled = false; }";
                    echo "setInterval('quitarclase()',3000);";
                    echo  "</script>";
                }else if($respuesta == "No existe el usuario"){
                    echo "<script> not('No existe un usuario con esos datos'); $('#form-login').addClass('js-animating-object animated shake'); $('#_error').addClass('error_'); document.getElementById('btnEnviar').disabled = true;";
                    echo "function quitarclase(){ $('#form-login').removeClass('js-animating-object animated shake'); document.getElementById('btnEnviar').disabled = false; }";
                    echo "setInterval('quitarclase()',3000);";
                    echo  "</script>";
                }
            }else{
                echo "<script> not('Datos Vacios'); $('#form-login').addClass('js-animating-object animated shake'); $('#_error').addClass('error_'); document.getElementById('btnEnviar').disabled = true;";
                echo "function quitarclase(){ $('#form-login').removeClass('js-animating-object animated shake'); document.getElementById('btnEnviar').disabled = false; }";
                echo "setInterval('quitarclase()',3000);";
                echo  "</script>";
            }
        } catch (Exception $e) {
            echo "<script> not('Tenemos problemas'); $('#form-login').addClass('js-animating-object'); $('#_error').addClass('error_'); document.getElementById('btnEnviar').disabled = true;";
            echo "function quitarclase(){ $('#form-login').removeClass('js-animating-object animated shake'); document.getElementById('btnEnviar').disabled = false; }";
            echo "setInterval('quitarclase()',3000);";
            echo  "</script>";
            header("Location: ../View/login.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../View/login.php");
    }





}
