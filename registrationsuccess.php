<?php
require 'component/header.php';
require_once 'component/nav.php';
?>
<div class="container">
<!-- Center alignment -->
<div class="card text-center mb-5" style="margin-top: 15%;">
    <div class="card-body">
        <h1 class="text-success"><i class="fas fa-check-circle"></i></h1>
        <h5 class="card-title">You've Successfully registered</h5>
        <p class="card-text">Login for you to book for a vehicle</p>
        <a href="login.php" class="btn btn-primary">Login</a>
    </div>
</div>
</div>
<?php
require 'component/footer.php';
?>