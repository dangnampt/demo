<?php
function getConnect(){
    $conn = new PDO("mysql:host=127.0.0.1;dbname=project_demo;charset=utf8","root","");
    return $conn;
}

?>