<?php
$vehicleid = $_GET['vid'];
$pdo = require_once '../server/connection.php';

$statement = $pdo->prepare("UPDATE vehicle_information SET vehicle_status = :v_status WHERE id = :id");
$statement->bindValue(':v_status', 'notbooked');
$statement->bindValue(':id', $vehicleid);


if($statement->execute()){
    header('location: cats.php');

}