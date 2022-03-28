<?php

$vehicle_infoid = $_GET['vehicle_info_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $distance = $_POST['distance_cover'];
    $maintainace_status = $_POST['maintenance_status'];

    $vreg_no = $_POST['reg_number'];
    $vcapacity = $_POST['capacity'];
    $vcolor = $_POST['color'];
    $vtype = $_POST['type'];
    $vstatus = $_POST['status'];

    $statement = $pdo->prepare("select * from vehicle_information where vehicle_reg_number = $vreg_no");
    $statement->execute();
    $vehicles = $statement->fetchAll(PDO::ATTR_DEFAULT_FETCH_MODE);

    if(empty($vehicles)){
        $statement = $pdo->prepare("INSERT INTO vehicle_information (firstname, lastname, dob, sex, marital_status, created_date,contact_id)
                VALUES (:vmake, :vmodel, :vreg_no, :capacity, :vcolor, :vtype, :vstatus)");
        $statement->bindValue(':vmake', $vmake);
        $statement->bindValue(':vmodel', $vmodel);
        $statement->bindValue(':vreg_no', $vreg_no);
        $statement->bindValue(':capacity', $vcapacity);
        $statement->bindValue(':vcolor', $vcolor);
        $statement->bindValue(':vtype', $vtype);
        $statement->bindValue(':vstatus', $vstatus);

        if($statement->execute()){
            echo 'vehicle inserted successfully';
        };
    }






}

