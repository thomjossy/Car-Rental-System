<?php
ob_start();
session_start();
if(!empty($_SESSION)){


require_once 'component/header.php';
require_once 'component/nav.php';
//function random_num ($len)
//{
//    $ch = "0123456789";
//    $l = strlen ($ch) - 1;
//    $str = "";
//    for ($i=0; $i < $len; $i++)
//    {
//        $x = rand (0, $l);
//        $str .= $ch[$x];
//    }
//    //echo $str;
//    return '000'.$str;
//
//}
$pdo = require_once './server/connection.php';

$fullname = $_SESSION['fname'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$userid = $_SESSION['user_id'];
$vehicleid = $_GET['vehicleid'];
$bookid = $_GET['booking'];
//$reciept = random_num(10);

//$vid = $booking['vehicle_information_id'];
$statement = $pdo->prepare("SELECT * FROM Vehicle_information WHERE id = '$vehicleid'");
$statement->execute();
$vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($vehicles as $i => $vehicle){$amount = $vehicle['amount'];};

$amount;

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $paytype = $_POST['paytype'];
//    $paymentdate = date('Y-M-D h:iS');
//    $amount = $_POST['amount'];
//
//
//        $statement = $pdo->prepare("INSERT INTO payment (payment_type, payment_date, amount, payment_reciept, booking_booking_id)
//                VALUES (:paytype, :paydate, :amount, :payrecpt, :bookingid)");
//        $statement->bindValue(':paytype', $paytype);
//        $statement->bindValue(':paydate', $paymentdate);
//        $statement->bindValue(':amount', $amount);
//        $statement->bindValue(':payrecpt', $reciept);
//        $statement->bindValue(':bookingid', $bookid);
//
//        if ($statement->execute()) {
//            echo 'vehicle inserted successfully';
//
//    }
//
//
//}

?>

<div class="container">
    <!-- Center alignment -->
    <div class="card text-center mb-5" style="margin-top: 15%;">
        <div class="card-body">
            <h1 class="text-success"><i class="fas fa-check-circle"></i></h1>
            <h5 class="card-title">You've Successfully Booked A vehicle</h5>
            <p class="card-text">click the payment button to make your payment</p>
            <form>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                <button type="button" class="btn btn-primary" onClick="payWithPaystack()"> Pay For Your Vehicle </button>
            </form>
        </div>
    </div>
</div>

<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: 'pk_test_f01bd136a68516d2d2c51b3d109e34753776dcbe',
            email: <?php echo $email?>,
            amount: <?php echo $amount?>,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: "+2348012345678"
                    }
                ]
            },
            callback: function(response){
                alert('success. transaction ref is ' + response.reference);
            },
            onClose: function(){
                alert('window closed');
            }
        });
        handler.openIframe();
    }
</script>
<?php
require_once 'component/footer.php';
}else{
    header("location: index.php");
}