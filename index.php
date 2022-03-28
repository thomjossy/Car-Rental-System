<?php
session_start();

//var_dump($_SESSION);

require_once './component/header.php';
include_once './component/nav.php';
?>

    <div class="card mt-2 rounded-0">
        <div class="row g-0">
            <!-- Image -->
            <a href="index.php" class="col-lg-8 col-md-12 col-12 bg-cover" style="background-image: url(admin/assets/images/about-img.jpg);">
                <img src="admin/assets/images/about-img.jpg" class="img-fluid d-lg-none invisible" alt=""></a>
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card Body -->
                <div class="card-body">
                    <a href="#" class="badge bg-warning mb-3"></a>
                    <h1 class="mb-4">
                            Start Booking For Vehicles Without Stress

                    </h1>
                    <p>we offer a more reliable way to hire vehicles to any destination you want. with just an affordable price
                    </p>
                    <!-- Media Content -->


                    <p>we upload a more  vehicles for you preffered choice
                    </p>

                    <h1 class="mb-4">
                        We Deal with more than 200 Brands of vehicle
                    </h1>

                    <p>we are more than just affiliates but we have a relationship with our brands
                    </p>

                </div>
            </div>
        </div>
    </div>

<?php
require_once  './component/footer.php';