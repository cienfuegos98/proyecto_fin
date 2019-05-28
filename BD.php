<?php

class BD {

//Inicializamos las variables
    private $con; //conexion
    private $error;
    private $host;
    private $user;
    private $pass;
    private $bd;

    //Devuelve un error
    function getError() {
        return $this->error;
    }

//Creamos el constructor con los atributos de la base de datos
    public function __construct($host = "localhost", $user = "root", $pass = "", $bd = "futmatch1") {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->bd = $bd;
        $this->con = $this->conexion();
    }

    //Crea a conexion.
    private function conexion() {
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->bd", $this->user, $this->pass);
            $con->query("SET NAMES 'utf8'");
            return $con;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    //cierra la conexion.
    public function cerrar() {//cerramos la conexion con la bbdd
        $this->con = null;
    }

    //hace una consulta
    public function consulta($c) {
        return $this->con->query($c);
    }

    //Devuelve un array asociativo con el titulo de la columna como index y como valor la tupla.
    public function selection($c) {
        $filas = [];
        if ($this->con == null) {
            $this->con = $this->conexion();
        }
        $resultado = $this->con->query($c);
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $filas[] = $fila;
        }
        return $filas;
    }

    //Devuelve el nombre de la comlumna.
    public function nombres_campos($nombre_tabla): array {
        $campos = [];
        $consulta = "select * from $nombre_tabla";
        $r = $this->con->query($consulta);
        $campos_obj = $r->fetch(PDO::FETCH_ASSOC);
        foreach ($campos_obj as $i => $campo) {
            $campos[] = $i;
        }
        return $campos;
    }

    //ejecuta una sentencia
    public function run($c) {
        try {
            $stmt = $this->con->prepare($c);
            $stmt->execute();
        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    //Funcion que comprueba si el usuario es valido o no
    public function compruebaUsuario($nombre, $pass) {
        $datos = $this->selection('SELECT * FROM `usuarios');
        foreach ($datos as $dato) {
            if (($dato['user'] === $nombre) && ($dato['pass'] === $pass)) {
                return true;
            }
        }
        return false;
    }

    public function compruebaTipo($id) {
        $c1 = "SELECT * FROM `jugadores` WHERE uid = '$id'";

        if (count($this->selection($c1)) > 0) {
            $tipo = "user";
        } else {
            $tipo = "pabellon";
        }

        return $tipo;
    }

    public function eliminarCuenta($id) {
        $q = "DELETE *FROM usuarios WHERE uid = $id";
        $this->run($q);
    }

}
