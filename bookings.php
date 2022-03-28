<?php
session_start();

$vid = $_GET['vid'];

    include_once 'header.php';
    include_once 'nav.php';


    $pdo = require '../server/connection.php';

    $statement = $pdo->prepare("SELECT * FROM booking WHERE vehicle_information_id	 = '$vid'");
    $statement->execute();
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($bookings)){
    foreach ($bookings as $i => $booking){
        $vid = $booking['vehicle_information_id'];
        $userid = $booking['users_id'];
        $bookingid = $booking['booking_id'];

        $statement = $pdo->prepare("SELECT * FROM Vehicle_information WHERE id = '$vid'");
        $statement->execute();
        $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = $pdo->prepare("SELECT * FROM mileage WHERE booking_booking_id = '$bookingid'");
        $statement->execute();
        $miles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = $pdo->prepare("SELECT * FROM users WHERE id = '$userid'");
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
            <div class="card mb-4 card-hover mt-5">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center p-4">
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
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
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="d-flex">

                                <div class="ms-3">
                                    <h4 class="mb-1">
                                        Vehicle Make:  <?php echo $vehicle['vehicle_make'];?>
                                    </h4>



                                    <p class="mb-0 fs-6">
                                        Vehicle Model: <span class="text-dark fw-medium"><?php echo $vehicle['vehicle_model'];?>  KM</span>
                                    </p>


                                    <p class="mb-0 fs-6">
                                        Vehicle Reg No:  <span class="text-dark fw-medium"><?php echo $vehicle['vehicle_reg_number'];?> </span>
                                    </p>

                                    <p class="mb-0 fs-6">
                                        Max Mileage:  <span class="text-dark fw-medium"><?php echo $vehicle['vehicle_max_mileage'];?>  KM</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <?php foreach ($users as $i => $user)?>
                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                            <div class="d-flex">

                                <div class="ms-3">
                                    <h4 class="mb-1">
                                        Booker:   <?php echo $user['user_name'];?>
                                    </h4>



                                    <p class="mb-0 fs-6">
                                        Email: <span class="text-dark fw-medium"><?php echo $user['email'];?></span>
                                    </p>


                                    <p class="mb-0 fs-6">
                                        Phone No:  <span class="text-dark fw-medium"><?php echo $user['phone_number'];?> </span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }}else{
        ?>
        <div class="container">
            <!-- Center alignment -->
            <div class="card text-center mb-5" style="margin-top: 15%;">
                <div class="card-body">
                    <h5 class="text-success">
                        No one has booked for this vehicle yet
                    </h5>
                    <a href='vehicles.php?vid=<?php echo $vehicleid;?>' class="badge bg-warning mb-3 ml-5">bookings</a>
                </div>
            </div>
        </div>
    <?php
    }
    include_once 'footer.php';