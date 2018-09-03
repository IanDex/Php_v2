<?php
require_once('Conexion.php');

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 01/09/2018
 * Time: 01:49
 */
class Login extends Conexion
{

    private $idP;
    private $user;
    private $pass;

    public function __construct($data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($data)>1){ //
            foreach ($data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idP = "";
            $this->user = "";
            $this->pass = "";
        }
    }

    function __destruct() {
        $this->Disconnect();

    }
    /*
     * @return string
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param string $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    public static function Login($User, $Password){
        $arrUsuarios = array();
        $tmp = new Login();
        $getTempUser = $tmp->getRows("SELECT * FROM users WHERE user = '$User'");
        if(count($getTempUser) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM users WHERE user = '$User' AND pass = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }


    protected function insert()
    {
        // TODO: Implement insert() method.
    }

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }

    protected static function buscar($query)
    {
        // TODO: Implement buscar() method.
    }

    protected static function getAll()
    {
        // TODO: Implement getAll() method.
    }

    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}