
<?php require_once 'header.php';
require_once 'nav.php';
?>
<div class="container-fluid mt-5">
    <div class="row">

        <?php

        $pdo = require_once '../server/connection.php';
        $statement= $pdo->prepare("SELECT * FROM category");
        $statement->execute();
        $categories =  $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($categories)){

            foreach ($categories as $i => $category){?>


                <div class="col-lg-6 col-md-12 col-12">

                    <div class="px-4">
                        <div class="card mb-4 card-hover ">
                            <div class="row">
                                <a href="" class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover rounded-start"><img src="<?php echo $category['category_picture'] ?>" alt="" class="rounded-top-md card-img-top"></a>
                                <div class="col-lg-9 col-md-12 col-12">
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <h3 class="mb-2 text-truncate-line-2 "><a href="#" class="text-inherit"><?php echo $category['category_name'] ?></a></h3>
                                        <div class="row align-items-center g-0">
                                            <div class="col-auto">
                                                <p><?php echo $category['category_description'] ?></p>
                                            </div>
                                            <div class="col ms-2">

                                            </div>
                                            <div class="col-auto">
                                                <a href="add_vehicle.php?catid=<?php echo $category['category_id'];?>" class="btn btn-sm btn-primary mr-2">
                                                    Add vehicles
                                                </a>

                                                <a href="vehicles.php?catid=<?php echo $category['category_id'];?>" class="btn btn-sm btn-primary">
                                                    view vehicles
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
//        $category['category_name'];
//        $category['category_picture'];
//        $category['category_description'];
//        $catid = $category['category_id'];
                //id should be in link of view vehicle of this category so to pass the id
                // to get  the vehicles in this category at the next page;
            }

        }else{

            // echo 'youve not add any category';
        }
        ?>
    </div>
</div>
<?php include_once 'footer.php';?>

