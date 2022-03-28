


 <!-- Card Footer -->


























<?php



<?php
                if($vehicle['vehicle_status'] !== 'ready'){

                    elseif
                } ($vehicle['vehicle_status'] == 'booked'){
                        echo 'vehicle has been booked';
                    }elseif($vehicle['vehicle_status'] == 'notbooked'){?>

                         <a href='booking.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                            book this vehicle
                        </a>
                    <?php
                }else{
                    echo 'This vehicle is under maintainance';
                } ?>



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

if($vehicle['maintainance_status'] !== 'ready'){
                              if( $vehicle['vehicle_status'] == 'booked') {
                                        echo 'this vehicle is booked by a customer';
                                        ?>
                                        <a href='return.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                                            returned
                                        </a>
                                    <?php
                                }else{
                                      echo 'vehicle is still out for booking';
                                     }
                    }else{?>

                        <a href='maintain.php?vid=<?php echo $vehicleid;?>' class="btn btn-sm btn-primary">
                            Maintain this vehicle
                        </a>
                   <?php
                    }

                    ?>
                            </div>
                        </div>
                    </div>

                    <?php
                }

            } else {

                echo 'youve not add any vehicle for this category category';
            }


            ?>










$vid = $_SESSION['vehicle_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paytype = $_POST['payment_type'];
    //$amount = $_POST['amount'];


    $statement = $pdo->prepare("select * from vehicle where id = $vid");
    $statement->execute();
    $vehicles = $statement->fetchAll(PDO::ATTR_DEFAULT_FETCH_MODE);

    foreach ($vehicles as $i => $vehicle){$vprice = $vehicle['vehicle_price'];};

    if (empty($vehicles)) {
        $statement = $pdo->prepare("INSERT INTO vehicle_information (category_name, category_desc, category_image)
                VALUES (:cname, :cdesc, :cpic)");
        $statement->bindValue(':paytype', $paytype);
        $statement->bindValue(':amount', $vprice);
        $statement->bindValue(':pdate', date('Y-M-D h:i:s'));
        $statement->bindValue(':bid', $bookid);


        if ($statement->execute()) {
            echo 'vehicle inserted successfully';
        };
    }


}
