<?php
session_start();
//require_once 'server/functions/migration.php';
$pdo = require_once './server/connection.php';

//$errors = [];

//$account_no= '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM users WHERE email=:email and user_password=:password";
    $statement= $pdo -> prepare($sql);
    $statement-> bindParam(':email', $email, PDO::PARAM_STR);
    $statement-> bindParam(':password', $password, PDO::PARAM_STR);
    $statement-> execute();
    $results=$statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($results);
    if($statement->rowCount() > 0)
    {
foreach ($results as $i => $result){

    $_SESSION['email']=$result['email'];
    $_SESSION['user_id']=$result['id'];
    $_SESSION['fname']=$result['user_name'];
    $_SESSION['user_type']=$result['user_type'];
    $_SESSION['phone']=$result['phone_number'];
}

       // $currentpage=$_SERVER['REQUEST_URI'];

        if($_SESSION['user_type']==0){
            //echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
        header('location: index.php');
        }

    } else{

        header('location: unsuccessfullogin.php');

    }
}
include_once 'component/header.php';
include_once 'component/loginform.php';
include_once 'component/footer.php';