<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobileno'];
    $password = md5($_POST['password']);
    $user_type = 'admin';
    $sql = "INSERT INTO  users (user_type, user_name, password, email, phone) VALUES(:utype, :fname,:email,:mobile,:password)";
    $query = $pdo->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':utype', $user_type, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $pdo->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert('Registration successfull. Now you can login');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}