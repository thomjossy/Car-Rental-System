<?php

$catid = $_GET['catid'];
$pdo = require_once '../server/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vmake = $_POST['vehicle_make'];
    $vmodel = $_POST['vehicle_model'];
    $vreg_no = $_POST['reg_number'];
    $vcapacity = $_POST['capacity'];
    $vcolor = $_POST['color'];
    $Maxmileage = $_POST['max_mileage'];
    $amount = $_POST['amount'];
    $vhpic = $_FILES['pic'];

    $statement = $pdo->prepare("select * from vehicle_information where vehicle_reg_number = $vreg_no");
    $statement->execute();
    $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);
    $picpath = 'assets/images/'. $vhpic['name'];
    move_uploaded_file($vhpic["tmp_name"],$picpath );

    if(empty($vehicles)){
        $statement = $pdo->prepare("INSERT INTO vehicle_information (vehicle_make, vehicle_model, vehicle_reg_number, vehicle_capacity, vehicle_colour, vehicle_status, vehicle_max_mileage, vehicle_picture, category_category_id, amount)
                VALUES (:vmake, :vmodel, :vreg_no, :capacity, :vcolor, :vstatus, :maxm, :vpic, :catid, :amount)");
        $statement->bindValue(':vmake', $vmake);
        $statement->bindValue(':vmodel', $vmodel);
        $statement->bindValue(':vreg_no', $vreg_no);
        $statement->bindValue(':capacity', $vcapacity);
        $statement->bindValue(':vcolor', $vcolor);
        $statement->bindValue(':vstatus', 'notbooked');
        $statement->bindValue(':maxm', $Maxmileage);
        $statement->bindValue(':vpic', $picpath);
        $statement->bindValue(':catid', $catid);
        $statement->bindValue(':amount', $amount);


        if($statement->execute()){
            header('location: add_success.php');
        };
    }else{
        echo 'this vehicle is already registered';
    }
}

require_once  'header.php';
require_once  'nav.php';
?>
<div class="container">
<!-- Card -->
<div class="card mt-5">
    <!-- Card Header -->
    <div class="card-header">
        <h3 class="mb-0 ">Vehicle Details</h3>
        <p class="mb-0 ">You Need to fill this Form correctly</p>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="d-lg-flex align-items-center justify-content-between">
            <div>
                <!-- Form -->
                <form method='post' enctype="multipart/form-data" class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="profilefname">The vehicle make</label>
                        <input name="vehicle_make" type="text" id="vehicle_make" class="form-control" placeholder="The vehicle make"
                               required>
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="profilelname">The vehicle model</label>
                        <input name="vehicle_model" type="text" id="vehicle_model" class="form-control" placeholder="The vehicle model"
                               required>
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="profilelname">The vehicle Registration Number</label>
                        <input name="reg_number" type="text" id="vehicle_model" class="form-control" placeholder="The vehicle Regiatration Number"
                               required/>
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label  class="form-label" for="birth">The Capacity of the Vehicle</label>
                        <input name="capacity" class="form-control" type="text" placeholder="The capacity of the vehicle"
                               id="capacity" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <label  class="form-label" for="birth">The Color of the Vehicle</label>
                        <input name="color" class="form-control" type="text" placeholder="The color of the Vehicle"
                               id="birth" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <label  class="form-label" for="birth">The Maximum Milgeage of the Vehicle</label>
                        <input name="max_mileage" class="form-control" type="text" placeholder="The Maximum Milgeage of the Vehicle"
                               id="birth" required>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <label  class="form-label" for="birth">The Amount this vehicle should be hired</label>
                        <input name="amount" class="form-control" type="text" placeholder="The Amount for hire of the Vehicle"
                               id="birth" required>
                    </div>

                    <div class="mb-3 col-12 col-md-12 fallback">
                        <label class="form-label" for="profilefname">Vehicle Image</label>
                        <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                            <label class="form-label">
                                <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                   title="Clear Image"></a></label>
                            <label class="custom-file-container__custom-file">
                                <input name="pic" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" />
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <small class="mt-3 d-block">Upload The  Vehicle image here. It must meet
                                our
                                document image quality standards to be accepted.
                                Important guidelines: 750x440 pixels; .jpg, .jpeg,.
                                gif, or .png. no text on the image.</small>
                            <div class="custom-file-container__image-preview"></div>
                        </div>

                    </div>

                    <div class="col-12 col-md-12">
                        <button class="btn btn-primary col-12 col-md-12" type="submit">Register This Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once  'footer.php';