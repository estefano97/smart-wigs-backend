<?php

class conexion {
    
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "smart-twigs";

    private $conexion;

    function __construct() {
        $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database);

        if($this->conexion->connect_errno) {
            echo "Error con la conexion a la base de datos!";
            die();
        }
    }

    public function getData($query) {
        $results = $this->conexion->query($query);
        $result = array();
        foreach ($results as $key) {
            $result[] = $key;
        }
        return json_encode($result);
    }

    public function setData($query) {
        $results = $this->conexion->query($query);
        $rows = $this->conexion->affected_rows;
    }

    //INSERT
    public function setDataName($query) {
        $results = $this->conexion->query($query);
        $rows = $this->conexion->affected_rows;

        if($rows >= 1) {
            return $this->conexion->insert_id;
        } else {
            return 0;
        }
    }
}

