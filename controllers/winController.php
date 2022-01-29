<?php

include_once("./conexion.php");

class winController {


    public function setWinner($winner) {
        $controller = new conexion();

        $winnerPlayer = $winner["name"];
        $winnerPoints = $winner["points"];

        $getPoint = json_decode($controller->getData("SELECT points_primary FROM users_st WHERE name='$winnerPlayer'"));

        $getPointSecondary = json_decode($controller->getData("SELECT points_secondary FROM users_st WHERE name='$winnerPlayer'"));
        
        $totalPoints = $winnerPoints + $getPointSecondary[0]->points_secondary;

        if(count($getPoint) === 0) {
            $controller->setDataName("INSERT INTO users_st (`name`, `points_primary`, `points_secondary`) VALUES ('$winnerPlayer', '1', '$winnerPoints')");
            
        } else {
            $points = $getPoint[0]->points_primary + 1;
            $controller->setDataName("UPDATE users_st SET points_primary = $points, points_secondary = $totalPoints WHERE name='$winnerPlayer'");
        }
    }

    public function setLoser($loser) {
        $controller = new conexion();

        $loserPlayer = $loser["name"];
        $loserPoints = $loser["points"];

        $getPoint = json_decode($controller->getData("SELECT points_primary FROM users_st WHERE name='$loserPlayer'"));

        $getPointSecondary = json_decode($controller->getData("SELECT points_secondary FROM users_st WHERE name='$loserPlayer'"));
        
        $totalPoints = $loserPoints + $getPointSecondary[0]->points_secondary;

        if(count($getPoint) === 0) {
            $controller->setDataName("INSERT INTO users_st (`name`, `points_primary`, `points_secondary`) VALUES ('$loserPlayer', '0', '$loserPoints')");
        } else {
            $controller->setDataName("UPDATE users_st SET points_secondary = $totalPoints WHERE name='$loserPlayer'");
        }
    }
}