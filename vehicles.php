<?php
ob_start();
session_start();

include_once 'component/header.php';
include_once './component/nav.php';


?>
    <div class="container-fluid mt-5">
    <div class="row">
<?php

$pdo = require_once './server/connection.php';

$cat_id =$_GET['catid'];

$statement = $pdo->prepare("SELECT * FROM vehicle_information WHERE category_category_id = $cat_id");
$statement->execute();
$vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);



if (!empty($vehicles)) {

    foreach ($vehicles as $i => $vehicle){
        $vehicleid = $vehicle['id'];
        $maxmileage = $vehicle['vehicle_max_mileage'];

        $statement = $pdo->prepare("SELECT * FROM booking WHERE vehicle_information_id = '$vehicleid'");
        $statement->execute();
        $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($bookings)){
            foreach ($bookings as $i => $booking){ $bookingid = $booking['booking_id'];};
            $bookingid;
            $statement = $pdo->prepare("SELECT sum(mileage) as totalmileage FROM mileage WHERE vehicle_information_id = '$vehicleid'");
            $statement->execute();
            $mileages = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mileages as $i => $mileage){ $totalmileage = $mileage['totalmileage'];};
            
            if($totalmileage >= $maxmileage){

                $statement = $pdo->prepare("UPDATE vehicle_information SET vehicle_status = :v_status WHERE id = :id");
                $statement->bindValue(':v_status', 'maintain');
                $statement->bindValue(':id', $vehicleid);
                $statement->execute();
            }
        }

        ?>
    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <div class="card  mb-4 card-hover">
            <a href="" class="card-img-top"><img src="admin/<?php echo $vehicle['vehicle_picture'] ?>" alt="" class="rounded-top-md card-img-top"></a>
            <!-- Card Body -->
            <div class="card-body">
                <h4 class="mb-2 text-truncate-line-2 "><?php echo $vehicle['vehicle_make'] ?></h4>
                <!-- List -->
                <ul class="mb-3 list-inline">
                    <li class="list-inline-item">
                        <?php echo $vehicle['vehicle_model'] ?>
                    </li>
                    <li class="list-inline-item">
                       <?php echo $vehicle['vehicle_capacity'] ?>
                    </li>
                </ul>
                <div class="lh-1">
                    <span>
                    Reg No: <?php echo $vehicle['vehicle_reg_number'] ?>
                  </span>
                </div>
                <!-- Price -->
                <div class="lh-1 mt-3">
                    <span class="text-dark fw-bold">NGN<?php echo $vehicle['amount'] ?></span>
                </div>
            </div>
            <!-- Card Footer -->
            <div class="card-footer">
                <?php
                if($vehicle['vehicle_status']=='maintain'){

                    echo 'vehicle is under maintainance';

                }elseif($vehicle['vehicle_status']=='booked'){

                    echo 'vehicle has been booked';

                }else{?>
                    <a href='booking.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                        book this vehicle
                    </a>
               <?php
                }
                ?>
            </div>
        </div>
    </div>

        <?php
    }

} else {?>
    <div class="container">
        <!-- Center alignment -->
        <div class="card text-center mb-5" style="margin-top: 15%;">
            <div class="card-body">
                <h5 class="text-success">
                    There is no vehicle for this category yet
                </h5>
            </div>
        </div>
    </div>
<?php
}


?>
    </div>
</div>
<?php
include_once 'component/footer.php';
