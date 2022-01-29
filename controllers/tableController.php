<?php

include_once("./conexion.php");

class tableController {


    public function getTable() {
        $controller = new conexion();
        $getData = $controller->getData("SELECT name, points_primary, points_secondary FROM users_st ORDER BY points_primary DESC,
        points_secondary ASC;");

        return $getData;
    }

}