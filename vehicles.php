<?php
//session_start();

include_once 'header.php';
include_once 'nav.php';


$pdo = require_once '../server/connection.php';
$cat_id =$_GET['catid'];



?>
    <div class="container-fluid mt-5">


        <div class="container mt-2 mb-5">
            <!-- Center alignment -->
            <div class="card text-center mb-5">
                <div class="card-body">
                        <form method="post">
                            <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Search vehicle by reg number" >
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            if (!empty($_POST['keyword'])) {
                $keyword = $_POST['keyword'];

                $statement = $pdo->prepare("SELECT * FROM vehicle_information WHERE  vehicle_reg_number = $keyword");
                $statement->execute();
                $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($vehicles)) {

                    foreach ($vehicles as $i => $vehicle){
                        $vehicleid = $vehicle['id'];
                        $maxmileage = $vehicle['vehicle_max_mileage'];
                        ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card  mb-4 card-hover">
                                <a href="" class="card-img-top"><img src="<?php echo $vehicle['vehicle_picture'] ?>" alt="" class="rounded-top-md card-img-top"></a>
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
                    Max Mileage <?php echo $maxmileage ?>
                  </span>
                                        <br/><br/>
                                        <span>
                    Reg No. <?php echo $vehicle['vehicle_reg_number'] ?>
                  </span>
                                    </div>
                                    <!-- Price -->
                                    <div class="lh-1 mt-3">
                                        <span class="text-dark fw-bold mr-5">NGN<?php echo $vehicle['amount'] ?></span>
                                        <a href='bookings.php?vid=<?php echo $vehicleid;?>&catid=<?php echo $cat_id;?>' class="badge bg-warning mb-3 ml-5">bookings</a>
                                        <a href='delete_vehicle.php?vid=<?php echo $vehicleid;?>' class="badge bg-danger mb-3 ml-5">delete</a>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        if($vehicle['vehicle_status']=='booked'){
                                            echo 'vehicle has been booked by customer';
                                            ?>
                                            <a href='return.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                                                returned
                                            </a>
                                            <?php
                                        }else if($vehicle['vehicle_status']=='maintain'){
                                            echo 'vehicle is due for maintainance';
                                            ?>
                                            <a href='maintain.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                                                Maintain this vehicle
                                            </a>
                                            <?php
                                        }else{
                                            echo 'vehicle is out for booking ';
                                            //echo $vehicle['vehicle_status'];
                                        }?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php }

                }else{?>

            <div class="card text-center mb-5" style="margin-top: 5%;">
                <div class="card-body">
                    <h5 class="card-title">The vehicle you searched for was not found</h5>
                    <a href="vehicles.php?catid=<?php echo $cat_id;?>" class="btn btn-primary">View All</a>
                </div>
            </div>
        </div>
            <?php }
            }else{
                $statement = $pdo->prepare("SELECT * FROM vehicle_information WHERE category_category_id = $cat_id");
                $statement->execute();
                $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($vehicles)) {

                    foreach ($vehicles as $i => $vehicle){
                        $vehicleid = $vehicle['id'];
                        $maxmileage = $vehicle['vehicle_max_mileage'];
                        ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card  mb-4 card-hover">
                                <a href="" class="card-img-top"><img src="<?php echo $vehicle['vehicle_picture'] ?>" alt="" class="rounded-top-md card-img-top"></a>
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
                    Max Mileage <?php echo $maxmileage ?>
                  </span>
                                        <br/><br/>
                                        <span>
                    Reg No. <?php echo $vehicle['vehicle_reg_number'] ?>
                  </span>
                                    </div>
                                    <!-- Price -->
                                    <div class="lh-1 mt-3">
                                        <span class="text-dark fw-bold mr-5">NGN<?php echo $vehicle['amount'] ?></span>
                                        <a href='bookings.php?vid=<?php echo $vehicleid;?>&catid=<?php echo $cat_id;?>' class="badge bg-warning mb-3 ml-5">bookings</a>
                                        <a href='delete_vehicle.php?vid=<?php echo $vehicleid;?>' class="badge bg-danger mb-3 ml-5">delete</a>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        if($vehicle['vehicle_status']=='booked'){
                                            echo 'vehicle has been booked by customer';
                                            ?>
                                            <a href='return.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                                                returned
                                            </a>
                                            <?php
                                        }else if($vehicle['vehicle_status']=='maintain'){
                                            echo 'vehicle is due for maintainance';
                                            ?>
                                            <a href='maintain.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                                                Maintain this vehicle
                                            </a>
                                            <?php
                                        }else{
                                            echo 'vehicle is out for booking ';
                                            //echo $vehicle['vehicle_status'];
                                        }?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php }

                }
            }


                ?>


        </div>
        </div>
<?php
include_once 'footer.php';