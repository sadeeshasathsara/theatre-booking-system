
//Home page cards
var cards = document.getElementsByClassName('card');

for (var i = 0; i < cards.length; i++) {
    (function (i) {
        cards[i].addEventListener('mouseover', function () {
            var wrapper = this.querySelector('.text-wrapper');
            if (wrapper) {
                wrapper.style.visibility = 'visible';
            }
        });

        cards[i].addEventListener('mouseout', function () {
            var wrapper = this.querySelector('.text-wrapper');
            if (wrapper) {
                wrapper.style.visibility = 'hidden';
            }
        });
    })(i);
}


// Home page track arrows running
document.getElementById('track-left-arrow').addEventListener('click', function () {
    var track = document.querySelector('.track');
    track.scrollLeft -= 500;
});

document.getElementById('track-right-arrow').addEventListener('click', function () {
    var track = document.querySelector('.track');
    track.scrollLeft += 500;
});

// Home page track arrows upcoming
document.getElementById('track-left-arrow-upcoming').addEventListener('click', function () {
    var track1 = document.getElementById('track-select');
    track1.scrollLeft -= 500;
});

document.getElementById('track-right-arrow-upcoming').addEventListener('click', function () {
    var track1 = document.getElementById('track-select');
    track1.scrollLeft += 500;
});


// Nav bar
let navbar = document.getElementById('nav-bar-container');

window.addEventListener('scroll', function () {
    if (this.window.scrollY > 1) {
        navbar.style.backgroundColor = "#111111";
        navbar.style.boxShadow = "10px 10px 15px rgba(0, 0, 0, 0.15)";
        navbar.style.top = '0px';
        navbar.style.transition = '0.2s ease-in-out'

    } else if (this.window.scrollY < 1) {
        navbar.style.backgroundColor = "transparent";
        navbar.style.boxShadow = "none";
        navbar.style.top = '40px';
    }
});

// password validation

function pwdValidation(input1_id, input2_id, errMsg, btnId) {
    const password1 = document.getElementById(input1_id);
    const password2 = document.getElementById(input2_id);
    const errorMsg = document.getElementById(errMsg);

    function validatePassword() {
        const passwordValue = password1.value;
        const regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).{8,16}$/;

        if (passwordValue.length > 16) {
            password1.value = passwordValue.slice(0, 16);
            errorMsg.style.visibility = "visible";
            errorMsg.innerHTML = "Cannot exceed 16 characters";
            password1.style.border = "2px solid red";
        }

        if (!regex.test(passwordValue)) {
            errorMsg.style.visibility = "visible";
            errorMsg.innerHTML = "Password must be 8-16 characters long, include at least one uppercase letter and one special character.";
            password1.style.border = "2px solid red";
        } else {
            errorMsg.style.visibility = "hidden";
            password1.style.border = "1px solid #fff";
        }

        if (password1.value !== password2.value) {
            errorMsg.style.visibility = "visible";
            errorMsg.innerHTML = "Passwords do not match.";
            password2.style.border = "2px solid red";
        } else if (regex.test(password1.value)) {
            errorMsg.style.visibility = "hidden";
            password2.style.border = "1px solid #fff";
        }
    }

    password1.addEventListener('input', validatePassword);
    password2.addEventListener('input', validatePassword);

    document.getElementById('myForm').addEventListener('submit', (e) => {
        validatePassword();
        if (errorMsg.style.visibility === "visible") {
            btnId.type = "none";
            e.preventDefault();
        }
    });
}

document.getElementById('pwd').addEventListener('click', function () {
    pwdValidation('pwd', 'cPwd', 'signup-error-msg', 'signup-button');
});

document.getElementById('change_pwd_c_password').addEventListener('click', function () {
    pwdValidation('change_pwd_c_password', 'cpasswordconfirm', 'pwd-error-msg');
});


// form field validation (check for empty fields)
function addEventListeners(formId, btnId, errMsg) {
    var form = document.getElementById(formId);

    var fileInputs = form.querySelectorAll('input');

    var signInBtn = document.getElementById(btnId);

    fileInputs.forEach(fileInput => {
        if (formId == "signup-frm" || formId == "pwd-change-form") {

            fileInput.addEventListener('blur', () => {
                if (fileInput.value === '') {
                    document.getElementById(errMsg).style.visibility = "visible";
                    document.getElementById(errMsg).innerHTML = "Please fill all the fields";
                    fileInput.style.border = "2px solid red";
                } else {
                    document.getElementById(errMsg).style.visibility = "hidden";
                    fileInput.style.border = "1px solid #fff";
                }
            });

            fileInput.addEventListener('focus', () => {
                document.getElementById(errMsg).style.visibility = "hidden";
                fileInput.parentElement.style.border = "1px solid #dfff";
            });

        } else {

            fileInput.addEventListener('blur', () => {
                if (fileInput.value === '') {
                    document.getElementById(errMsg).style.visibility = "visible";
                    document.getElementById(errMsg).innerHTML = "Please fill all the fields";
                    fileInput.parentElement.style.border = "2px solid red";
                } else {
                    document.getElementById(errMsg).style.visibility = "hidden";
                    fileInput.parentElement.style.border = "1px solid #fff";
                }
            });

            fileInput.addEventListener('focus', () => {
                document.getElementById(errMsg).style.visibility = "hidden";
                fileInput.parentElement.style.border = "1px solid #dfff";
            });

        }

    });
}

document.addEventListener('DOMContentLoaded', addEventListeners('login-frm', 'sign-in-button', 'login-error-msg'));
document.addEventListener('DOMContentLoaded', addEventListeners('signup-frm', 'signup-button', 'signup-error-msg'));
document.addEventListener('DOMContentLoaded', addEventListeners('pwd-change-form', 'pwd-change-button', 'pwd-error-msg'));

// phone number checkup
const phoneInput = document.getElementById('phone');

phoneInput.addEventListener('input', () => {
    // Remove non-numeric characters
    phoneInput.value = phoneInput.value.replace(/\D/g, '');

    // Limit the length to 10 characters
    if (phoneInput.value.length > 10) {
        phoneInput.value = phoneInput.value.slice(0, 10);
        document.getElementById('signup-error-msg').style.visibility = "visible";
        document.getElementById('signup-error-msg').innerHTML = "Cannot enter more than 10 digits";
        phoneInput.style.border = "2px solid red";
    }else{
        document.getElementById('signup-error-msg').style.visibility = "hidden";
        phoneInput.style.border = "1px solid #fff";
    }

    // Toggle error class based on length
    if (phoneInput.value.length !== 10) {
        phoneInput.style.border = "2px solid red";
    } else {
        phoneInput.style.border = "1px solid #fff";
    }
});

phoneInput.addEventListener('keydown', (e) => {
    // Allow control keys, numbers, and numeric keypad keys
    const allowedKeys = [
        'Backspace', 'Tab', 'ArrowLeft', 'ArrowRight',
        'Delete', 'Home', 'End'
    ];

    // Allow only numbers (48-57 for standard keyboard, 96-105 for numeric keypad)
    if ((e.key >= '0' && e.key <= '9') || allowedKeys.includes(e.key)) {
        return true;
    } else {
        e.preventDefault();
    }
});

// Login page password change popup 
pwdPopup = document.getElementById('pwd-main-container');
var popupVisibility;

// open popup
function pwdOpenPopup() {
    pwdPopup.style.visibility = "visible";
    pwdPopup.style.top = "50%";
    pwdPopup.style.transform = "translate(-50%, -50%) scale(1)";
    popupVisibility = true;
}

// close popup
function pwdClosePopup() {
    pwdPopup.style.visibility = "hidden";
    pwdPopup.style.top = "-50%";
    pwdPopup.style.transform = "translate(-50%, -50%) scale(0.1)";
    popupVisibility = false;
}

// Login page popup 
popup = document.getElementById('signup-main-container');
var popupVisibility;

// open popup
function openPopup() {
    popup.style.visibility = "visible";
    popup.style.top = "50%";
    popup.style.transform = "translate(-50%, -50%) scale(1)";
    popupVisibility = true;
}

// close popup
function closePopup() {
    popup.style.visibility = "hidden";
    popup.style.top = "-50%";
    popup.style.transform = "translate(-50%, -50%) scale(0.1)";
    popupVisibility = false;
}




'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.product__filter').length > 0) {
            var containerEl = document.querySelector('.product__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_left'><span/>", "<span class='arrow_right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
        Radio Btn
    --------------------- */
    $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").on('click', function () {
        $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
        Scroll
    --------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end


    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"));
    });

    /*------------------
        Magnific
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*-------------------
        Quantity change
    --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="fa fa-angle-up dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-down inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    var proQty = $('.pro-qty-2');
    proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    /*------------------
        Achieve Counter
    --------------------*/
    $('.cn_num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);