<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">


<!-- Css Styles -->
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="css/nice-select.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css?v=1.3" type="text/css">
<link rel="stylesheet" href="css/index.css?v=1.8" type="text/css">


<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            <a href="login.html">Sign in</a>

        </div>

    </div>

    <div id="mobile-menu-wrap"></div>

</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">

                </div>
                <?php
                include_once "Database.php";
                if (isset($_SESSION['uname'])) {
                    $uname = $_SESSION['uname'];
                    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='" . $uname . "'");

                    ?>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        if ($row['image'] == '') {
                                            echo '<img src="image/img_avatar.png" alt="Avatar" class="avatar">';
                                        } else {
                                            ?> <img src="admin/image/<?php echo $row["image"]; ?>" alt="Avatar" class="avatar">
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <span id="profile">Hii <?php echo $_SESSION['uname']; ?></span>
                                <a id="logout" href="logout.php"> Logout</a>
                            </div>

                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="login_form.php">Sign in</a>
                                <a id="reg" href="login_form.php">Register</a>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <style>
        #nav-bar-container{
            width: 100%;
        }
        #nav-bar{
            width: 100%;
        }
        #logo-txt{
            font-size: 30px;
            color: #ACA700;
            /* border: 1px solid white; */
            font-weight: 600;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
    <div id="nav-bar-container">
        <div class="row" id="nav-bar">
            <div class="col-lg-3 col-md-3">
                <div id="logo-txt" class="header__logo">
                    <label ></label>Savoy Cinema
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a class="link" href="./index.php">Home</a></li>
                        <li><a class="link" href="allmovie.php">Movies</a></li>
                        <li><a class="link" href="about.php">About Us</a></li>
                        <li><a class="link" href="./feedback.php">Feedback</a></li>
                        <li><a class="link" href="./contact.php">Contact</a></li>
                        <li><a class="link" href="./offers.php">Offers</a></li>
                    </ul>
                </nav>
            </div>

        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->

<script>
    document.getElementById('reg').addEventListener('click', function(){
        sessionStorage.setItem("registerClicked", "true");
    });
</script>