<!DOCTYPE html>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
</head>

<body>

    <?php include_once "header.php"; ?>

    <!-- LOG IN PART -->
    <section id="login-main-container">
        <section id="login-container">
            <div class="box" id="left">
                <!-- image -->
            </div>
            <div class="box" id="right">
                <!-- log in form -->
                <form id="login-frm" action="login.php" method="post">
                    <div class="title-form">
                        <h3 id="login-header">Log In</h3>
                    </div>

                    <div class="svg" id="usn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <input type="text" name="username" placeholder="username" autocomplete="off" required>
                    </div>

                    <br>

                    <div class="svg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-shield-lock" viewBox="0 0 16 16">
                            <path
                                d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                            <path
                                d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415" />
                        </svg>
                        <input type="password" name="password" placeholder="password" autocomplete="off" required>
                    </div>
                    <label onclick="pwdOpenPopup()" id="fgt-pwd">Forgot password?</label>

                    <input id="sign-in-button" type="submit" name="submit" value="LOG IN">
                    <br>
                    <div id="login-error-msg">
                        .
                    </div>


                </form>
                <div id="hr">
                    <span></span>
                    <p id="hr-text">OR</p>
                    <span></span>
                </div>

                <button id="sign-up" onclick="openPopup()">
                    SIGN UP
                </button>

                <label id="terms-conditions">
                    <a href="#"><u>Terms and Conditions</u> | <u>Privacy Policy</u></a>
                </label>



            </div>

        </section>

    </section>

    <!-- SIGN UP PART -->
    <section id="signup-main-container">
        <section id="signup-container">

            <!-- popup box close svg -->
            <div id="signup-close-container">
                <svg onclick="closePopup()" id="close-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>

            <!-- sign up form -->
            <form id="signup-frm" action="register.php" method="post">
                <h3 id="signup-header-text">Sign Up </h3>

                <input type="text" name="usname" placeholder="username" autocomplete="off" required>
                <br>

                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                <br>

                <div id="phone-city">

                    <input type="text" id="phone" name="phone" placeholder="Phone Number" autocomplete="off" required>


                    <input type="text" id="city" name="city" placeholder="City" autocomplete="off" required>

                </div>

                <br>

                <input type="file" name="proPic">
                <br>

                <div id="pwd-flex">

                    <input type="password" name="pwd" placeholder="Password" autocomplete="off" id="pwd" required>


                    <input type="password" name="confirmedPassword" autocomplete="off" placeholder="Confirm Password" id="cPwd" required>


                </div>
                <br>

                <input type="submit" name="submit" value="SIGN UP" id="signup-button">

                <div id="signup-error-msg">
                        
                </div>

            </form>

            <div id="hr">
                <hr>
                <p id="hr-text">OR</p>
                <hr>
            </div>

            <button id="sign-in" onclick="closePopup()">
                SIGN IN
            </button>

            <label id="terms-conditions">
                <a href="#"><u>Terms and Conditions</u> | <u>Privacy Policy</u></a>
            </label>

        </section>
    </section>

    <!-- Forgot Password -->
    <section id="pwd-main-container">
        <section id="pwd-container">

            <!-- popup box close svg -->
            <div id="signup-close-container" >
                <svg onclick="pwdClosePopup()" id="close-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>

            <!-- password change form -->
            <form id="pwd-change-form" action="forget.php" method="post" style="border: none;">
                <h3 id="signup-header-text" style="margin-top: 120px;">Change Password </h3>

                <input type="text" name="change_pwd_email" placeholder="Email ID" required>
                <br>

                <input type="password" id="change_pwd_password" name="pwChange_oldPwd" placeholder="Old Password"
                    required>
                <br>

                <input type="password" id="change_pwd_c_password" name="pwChange_newPwd" placeholder="New Password"
                    required>
                <br>

                <input type="password" name="pwChange_conPwd" placeholder="Confirm Password" id="cpasswordconfirm" required>
                <br>

                <input type="submit" name="submit" value="Change Password" id="pwd-change-button">

                <div id="pwd-error-msg">
                        
                </div>

            </form>

        </section>
    </section>

    <?php
    include ("footer.php");
    ?>
    <script>
        if (sessionStorage.getItem("registerClicked") == "true") {
            openPopup();
            sessionStorage.removeItem("registerClicked");
        }

        // login error msg
        if (sessionStorage.getItem('loginErr') == 'true') {
            document.getElementById('login-error-msg').style.visibility = 'visible';
            document.getElementById('login-error-msg').innerHTML = 'Username and password did not matched';
            sessionStorage.removeItem('loginErr');
        }
        
    </script>
</body>

</html>