<?php

include_once("./conexion.php");

class tableController {


    public function getTable() {
        $controller = new conexion();
        $getData = $controller->getData("SELECT * FROM users_st");

        return $getData;
    }

}