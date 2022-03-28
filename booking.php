<?php

ob_start();
session_start();
if(!empty($_SESSION)) {

//var_dump($_SESSION);
    $userid = $_SESSION['user_id'];

    $vid = $_GET['vid'];

    $pdo = require_once './server/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $distance = $_POST['distance'];
        $mileage = $_POST['mile'];
        $return_date = $_POST['return'];

        $statement = $pdo->prepare("SELECT * FROM vehicle_information WHERE id = $vid");
        $statement->execute();
        $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vehicles as $i => $vehicle) {
            $maxmile = $vehicle['vehicle_max_mileage'];
        }
        if ($mileage <= $maxmile){
            if (!empty($vid)) {
                $statement = $pdo->prepare("INSERT INTO booking (distance_cover, booked_date, returned_date, vehicle_information_id, users_id)
                VALUES (:dcover, :bookdate, :r_date, :vid, :userid)");
                $statement->bindValue(':dcover', $distance);
                $statement->bindValue(':bookdate', date('Y-m-s h:i:s'));
                $statement->bindValue(':r_date', $return_date);
                $statement->bindValue(':vid', $vid);
                $statement->bindValue(':userid', $userid);

                if ($statement->execute()) {
                    $bookingid = $pdo->lastInsertId();

                    $statement = $pdo->prepare("INSERT INTO mileage (mileage, booking_booking_id, vehicle_information_id)
                VALUES (:mileage, :bookid, :vid)");
                    $statement->bindValue(':mileage', $mileage);
                    $statement->bindValue(':bookid', $bookingid);
                    $statement->bindValue(':vid', $vid);
                    if ($statement->execute()) {

                        $statement = $pdo->prepare("UPDATE vehicle_information SET vehicle_status = :status WHERE id = $vid");
                        $statement->bindValue(':status', 'booked');
                        if ($statement->execute()) {
                            header("location:payment.php?vehicleid=" . $vid . "&booking=" . $bookingid);
                        }
                    }

                };
            }
    }else{
            $errors = 'The vehicle cant go that mile for';
        }

    }

    include_once 'component/header.php';
    include_once './component/nav.php';
    include_once 'component/bookingform.php';
    include_once 'component/footer.php';
}else{
    header('location: index.php');
}