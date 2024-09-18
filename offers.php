<?php
include "Database.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers</title>

    <style>
        .offers-main-container {
            width: 100%;
            height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url(image/offerbackground.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-container {
            border: 1px solid white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .login-container h3 {
            text-transform: uppercase;
            user-select: none;
        }

        .login-container a {
            position: relative;
            display: inline-block;
            padding: 15px 30px;
            border: 2px solid #fefefe;
            text-transform: uppercase;
            color: #fefefe;
            text-decoration: none;
            font-weight: 600;
            font-size: 20px;
        }

        .login-container a::before {
            content: '';
            position: absolute;
            top: 6px;
            left: -2px;
            width: calc(100% + 4px);
            height: calc(100% - 12px);
            background-color: #212121;
            transition: 0.3s ease-in-out;
            transform: scaleY(1);
        }

        .login-container a:hover::before {
            transform: scaleY(0);
        }

        .login-container a::after {
            content: '';
            position: absolute;
            left: 6px;
            top: -2px;
            height: calc(100% + 4px);
            width: calc(100% - 12px);
            background-color: #212121;
            transition: 0.3s ease-in-out;
            transform: scaleX(1);
            transition-delay: 0.5s;
        }

        .login-container a:hover::after {
            transform: scaleX(0);
        }

        .login-container a span {
            position: relative;
            z-index: 3;
        }

        .login-container button {
            text-decoration: none;
            background-color: #212121;
            border: none;
        }

        .offers-container {
            border: 2px solid white;
            width: 70%;
            padding-top: 30px;
            position: absolute;
            top: 150px;
            border-radius: 20px;
            backdrop-filter: blur(20px);
            background-color: rgba(0, 0, 0, 0.151);
        }

        .offers-container h3 {
            text-transform: uppercase;
            text-align: center;
            padding-bottom: 30px;
            user-select: none;
            border-bottom: 1px solid white;
        }

        .offers-row {
            border: 1px solid white;
            margin: 10px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            background-color: rgba(0, 0, 0, 0.351);
        }

        .offers-title,
        .offers-discount {
            font-size: 18px;
            color: #E5E5E5;
            padding: 10px;
            user-select: none;
        }

        .offers-title {
            width: 80%;
            border-radius: 10px 0px 0px 10px;
            margin: 0;
        }

        .offers-discount {
            border: 1px solid white;
            width: 20%;
            border-radius: 0px 10px 10px 0px;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .offers-discount .bookmarkBtn {
            width: 100px;
            height: 40px;
            border-radius: 40px;
            border: 1px solid rgba(255, 255, 255, 0.349);
            background-color: #ba51ff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
        }

        .offers-discount .IconContainer {
            width: 30px;
            height: 30px;
            background: linear-gradient(to bottom, rgb(255, 136, 255), rgb(172, 70, 255));
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            z-index: 2;
            transition-duration: 0.3s;
        }

        .offers-discount .icon {
            border-radius: 1px;
            fill: #fff;
        }

        .offers-discount .text {
            height: 100%;
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            z-index: 1;
            transition-duration: 0.3s;
            font-size: 12px;
            margin-top: 16px;
            padding-left: 3px;
            text-transform: uppercase;
        }

        .offers-discount .bookmarkBtn:hover .IconContainer {
            width: 90px;
            transition-duration: 0.3s;
        }

        .offers-discount .bookmarkBtn:hover .text {
            transform: translate(10px);
            width: 0;
            font-size: 0;
            transition-duration: 0.3s;
        }

        .offers-discount .bookmarkBtn:active {
            transform: scale(0.95);
            transition-duration: 0.3s;
        }
    </style>
</head>

<body>

    <?php include "header.php"; ?>

    <?php if (isset($_SESSION['uname'])) { ?>

        <div class="offers-main-container">
            <div class="offers-container">
                <h3>Collect your offers</h3>
                <?php
                $userna = $_SESSION['uname'];
                $offers_sql = "SELECT * FROM offer WHERE userId = (SELECT id FROM user WHERE username = '$userna') and collected != -1";
                $result = mysqli_query($conn, $offers_sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="offers-row">
                        <div class="offers-title"><?php echo $row['offerTitle']; ?></div>
                        <div class="offers-discount">
                            <?php echo $row['offerDiscount'] . "%"; ?>
                            <a href="copy_offer.php?id=<?php echo $row['offerId'] ?>">
                            <button id="<?php echo $row['offerId'] ?>" class="bookmarkBtn">
                                <span class="IconContainer">
                                    <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                                        <path
                                            d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z">
                                        </path>
                                    </svg>
                                </span>
                                <p class="text">collect</p>
                            </button>
                            </a>

                        </div>
                    </div>

                    <?php
                }

                ?>
            </div>
        </div>

        <?php
    } else {
        ?>

        <div class="offers-main-container">
            <div class="login-container">
                <h3>Please log in to see offers</h3>
                <button id="login-btn">
                    <a href="login_form.php"><span>LOG IN</span></a>
                </button>
            </div>
        </div>

        <?php
    }
    ?>
    <?php include "footer.php"; ?>

    <script>
        // document.getElementById('login-btn').addEventListener('click', function () {
        //     window.location.href = 'http://localhost/theator%20booking/theater/login_form.php';
        // });
    </script>

</body>

</html>