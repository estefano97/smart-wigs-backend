<?php

$_POST = json_decode(file_get_contents('php://input'), true);



switch($_SERVER['REQUEST_METHOD']) {
//DOCUMENTAR EL API
    case 'GET':
        echo "Obtener";
    break;

    case 'POST':
        
    break;

    case 'PUT':
        echo "Edit";
    break;

    case 'DELETE':
        echo "Delete";
    break;

    default:
        header("location: http://localhost/smart-twigs/404.php");
    break;
}
