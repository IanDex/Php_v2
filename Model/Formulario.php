<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 31/08/2018
 * Time: 18:12
 */
require_once('Conexion.php');

class Formulario extends Conexion
{

    private $id;
    private $num_pro;
    private $descripcion;
    private $sede;
    private $presupuesto;
    private $fecha;

    public function __construct($Form_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Form_data)>1){ //
            foreach ($Form_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->id = "";
            $this->num_pro = "";
            $this->descripcion = "";
            $this->sede = "";
            $this->presupuesto = "";
            $this->fecha = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {

    }

    public static function buscar($query)
    {
        $Form = array();
        $tmp = new Formulario();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $pdatos = new Formulario();
            $pdatos->id = $valor['id'];
            $pdatos->num_pro = $valor['num_proceso'];
            $pdatos->descripcion = $valor['descripcion'];

            $pdatos->sede = $valor['sede'];
            $pdatos->presupuesto = $valor['presupuesto'];
            $pdatos->fecha = $valor['fecha'];
            array_push($Form, $pdatos);
        }
        $tmp->Disconnect();
        return $Form;
    }


    public static function buscar_pro($query)
    {
        $Form = array();
        $tmp = new Formulario();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $pdatos = new Formulario();
            $pdatos->num_pro = $valor['num_proceso'];
            array_push($Form, $pdatos);
        }
        $tmp->Disconnect();
        return $Form;
    }


    public static function getAll()
    {

        return Formulario::buscar("SELECT * FROM formulario");
    }

    public static function getNum_Proceso()
    {

        return Formulario::buscar_pro("SELECT num_proceso FROM formulario ORDER BY id DESC LIMIT 1");

    }

    public function numero(){
        $Form = Formulario::getNum_Proceso();
        $var = 0;
        foreach ($Form as $datosp) {
            if ($Form!=0){
            $var = intval($datosp->getNumPro());
            }else{
                $var = 10000000;
            }
        }
        return $var + 1;
    }
    public function insert()
    {
        $this->insertRow("INSERT INTO db_php.formulario VALUES (NULL, ?, ?, ? , ? ,now())", array(
                $this->num_pro,
                $this->descripcion,
                $this->sede,
                $this->presupuesto,
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE db_php.formulario SET descripcion = ?, sede = ?, presupuesto = ?, fecha = ? WHERE id = ?", array(
            $this->descripcion,
            $this->sede,
            $this->presupuesto,
            $this->fecha,
            $this->id,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumPro()
    {
        return $this->num_pro;
    }

    /**
     * @param mixed $num_pro
     */
    public function setNumPro($num_pro)
    {
        $this->num_pro = $num_pro;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * @param mixed $sede
     */
    public function setSede($sede)
    {
        $this->sede = $sede;
    }

    /**
     * @return mixed
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }

    /**
     * @param mixed $presupuesto
     */
    public function setPresupuesto($presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    /**
     * @return mixed
     */



}

