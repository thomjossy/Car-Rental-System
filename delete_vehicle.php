<?php
$vehicleid = $_GET['vid'];
$pdo = require_once '../server/connection.php';


$statement = $pdo->prepare("DELETE From vehicle_information WHERE id = $vehicleid");
if($statement->execute()){
$statement = $pdo->prepare("DELETE From booking WHERE vehicle_information_id = $vehicleid");
    if($statement->execute()){
$statement = $pdo->prepare("DELETE From mileage WHERE vehicle_information_id  = :id");
$statement->bindValue(':id', $vehicleid);

if($statement->execute()){
    header('location: cats.php');

}}}
