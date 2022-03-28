<?php

$pdo = require_once './server/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = md5($_POST['password']);
    $user_type = 'customer';

    $sql ="SELECT * FROM users WHERE email=:email";
    $statement= $pdo -> prepare($sql);
    $statement-> bindParam(':email', $email, PDO::PARAM_STR);
    $statement-> execute();
    $results=$statement->fetchAll(PDO::FETCH_OBJ);
    if($statement->rowCount($results) > 0)
    {
        echo 'youve already registered into the system login';
    }else{
        $sql = "INSERT INTO  users (user_type, user_name, user_password, email, phone_number) VALUES(:utype, :fname, :password,:email,:mobile)";
        $query = $pdo->prepare($sql);

        $query->bindvalue(':utype', 0);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $pdo->lastInsertId();
        if ($lastInsertId) {
            header('location: registrationsuccess.php');
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }

    }


}

include_once 'component/header.php';
include_once 'component/registerform.php';
include_once 'component/footer.php';