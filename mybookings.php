<?php
session_start();

if(!empty($_SESSION)){

include_once 'component/header.php';
include_once './component/nav.php';

$userid = $_SESSION['user_id'];

$pdo = require './server/connection.php';

$statement = $pdo->prepare("SELECT * FROM booking WHERE users_id = '$userid'");
$statement->execute();
$bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($bookings as $i => $booking){
    $bookingid = $booking['booking_id'];
    $vid = $booking['vehicle_information_id'];
    $statement = $pdo->prepare("SELECT * FROM Vehicle_information WHERE id = '$vid'");
    $statement->execute();
    $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare("SELECT * FROM mileage WHERE booking_booking_id = '$bookingid'");
    $statement->execute();
    $miles = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
<div class="container">
    <div class="card mb-4 card-hover mt-5">
        <div class="row">
        <div class="d-flex justify-content-between align-items-center p-4">
            <div class="col-lg-6 col-md-12 col-12">
            <div class="d-flex">

                <div class="ms-3">
                    <h4 class="mb-1">
                        Distance: <?php echo $booking['distance_cover'];?>
                    </h4>



                    <p class="mb-0 fs-6">
                       Mile covered: <span class="text-dark fw-medium"><?php foreach ($miles as $i => $mile){ echo $mile['mileage'];};?>  KM</span>
                    </p>

                    <p class="mb-0 fs-6">
                       Booked Date: <span class="text-dark fw-medium"><?php echo $booking['booked_date'];?> </span>
                    </p>
                    <p class="mb-0 fs-6">
                       Expected Returned Date: <span class="text-dark fw-medium"><?php echo $booking['returned_date'];?> </span>
                    </p>

                </div>
            </div>
            </div>
<?php foreach ($vehicles as $i => $vehicle)?>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="d-flex">

                    <div class="ms-3">
                        <h4 class="mb-1">
                            Vehicle Make:  <?php echo $vehicle['vehicle_make'];?>
                        </h4>



                        <p class="mb-0 fs-6">
                           Vehicle Model: <span class="text-dark fw-medium"><?php echo $vehicle['vehicle_model'];?> </span>
                        </p>


                        <p class="mb-0 fs-6">
                            Vehicle Reg No:  <span class="text-dark fw-medium"><?php echo $vehicle['vehicle_reg_number'];?> </span>
                        </p>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>
<?php }
include_once 'component/footer.php';
}else{
    header('location: index.php');
}