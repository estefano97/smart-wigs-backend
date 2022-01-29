<?php

<?php
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once("./controllers/winController.php");

switch($_SERVER['REQUEST_METHOD']) {
    
    case 'GET':
        
    break;

    default:
        header("location: http://localhost/smart-twigs/404.php");
    break;
}
