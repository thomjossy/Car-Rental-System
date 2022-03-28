<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-default shadow-lg">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="#"
        ><img src="assets/images/brand/logo/logo.svg" alt=""
            /></a>
        <!-- Mobile view nav wrap -->
        <ul
            class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap"
        >
            <?php

            if(!empty($_SESSION)){?>

                    <li class="dropdown d-inline-block stopevent">
                        <?php echo $_SESSION['fname']?>
                    </li>
            <?php } ?>
        </ul>
        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a
                            class="nav-link"
                            href="index.php"
                    >
                        Home
                    </a>

                </li>

                <li class="nav-item dropdown">
                    <a
                        class="nav-link"
                        href="categories.php"
                    >
                        Vehicle Categories
                    </a>

                </li>
               <?php if(!empty($_SESSION)){?>
                <li class="nav-item">
                    <a
                        class="nav-link "
                        href="mybookings.php"
                    >
                        My Bookings
                    </a>
                </li>
               <?php
               }
               ?>
                <li class="nav-item">
                    <a
                            class="nav-link "
                            href="mybookings.php"
                    >
                        customer dashboard
                    </a>
                </li>
            </ul>

            <?php
            if(!empty($_SESSION)){?>
                <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
                    <li class="dropdown d-inline-block stopevent">
                     <?php echo $_SESSION['fname']?>
                    </li>

                    <li class="dropdown ms-2 d-inline-block">
                        <a
                                class="btn btn-sm btn-danger"
                                href="logout.php"
                                data-bs-toggle=""
                                data-bs-display="static"
                                aria-expanded="false"
                        >
                            Logout
                        </a>
                    </li>
                </ul>
           <?php }else{?>
                <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
                    <li class="dropdown d-inline-block stopevent">
                        <a
                                class="btn btn-sm btn-primary"
                                href="login.php"
                        >
                            Login
                        </a>

                    </li>

                    <li class="dropdown ms-2 d-inline-block">
                        <a
                                class="btn btn-sm btn-primary"
                                href="register.php"
                        >
                            Register
                        </a>
                    </li>
                </ul>
           <?php } ?>
        </div>
    </div>
</nav>
