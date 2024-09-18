<?php
session_start();
//index.php

include ('database_connection.php');

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All shows</title>

</head>

<body>

    <?php
    include ("header.php");
    ?>
    <!-- Page Content -->
    <div id="all-movie-main-container" class="container">
        <div id="all-movie-container" class="row">
            <div id="search-movie-container">
                <form method="get" class="searchBox">

                    <input name="search" class="searchInput" type="text" name="" placeholder="Search something">
                    <button class="searchButton" href="#">



                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                            <g clip-path="url(#clip0_2_17)">
                                <g filter="url(#filter0_d_2_17)">
                                    <path
                                        d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z"
                                        stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                                        shape-rendering="crispEdges"></path>
                                </g>
                            </g>
                            <defs>
                                <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha">
                                    </feColorMatrix>
                                    <feOffset dy="4"></feOffset>
                                    <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                    <feComposite in2="hardAlpha" operator="out"></feComposite>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                                    </feColorMatrix>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17">
                                    </feBlend>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17"
                                        result="shape"></feBlend>
                                </filter>
                                <clipPath id="clip0_2_17">
                                    <rect width="28.0702" height="28.0702" fill="white"
                                        transform="translate(0.403503 0.526367)"></rect>
                                </clipPath>
                            </defs>
                        </svg>


                    </button>
                </form>



            </div>
            <div id="all-movies" class="col-md-9">
                <br />
                <div class="row">

                    <?php

                    $query = "
                    SELECT * FROM add_movie WHERE status = '1'
                    ";

                    if (isset($_GET["search"])) {
                        $query .= "
                        AND movie_name like '%" . $_GET['search'] . "%'
                        ";
                    }


                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $total_row = $statement->rowCount();
                    $output = '';
                    echo "<section id='fetch-grid'>";
                    if ($total_row > 0) {

                        foreach ($result as $row) {
                            if ($row['action'] == "running") {
                                $img_path = "admin/image/" . $row['image'];
                                $name = $row['movie_name'];
                                $lang = $row['language'];
                                $btn_path = "movie_details.php?pass=" . $row['id'];

                                $output .= "
                                    <div class='card' style='background-image: url($img_path)'>
                                    <div class='text-wrapper'> 
                                        <div class='movie-name'>$name</div>
                                        <div class='card-row'>
                                        <div class='card-lang'>$lang</div>
                                        <a href='$btn_path'><button class='cssbuttons-io-button' class='card-btn' id='card-btn'>
                                            Book Now
                                            <div class='icon'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-arrow-right-square' viewBox='0 0 16 16'>
                                                <path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
                                            </svg>
                                            </div>
                                        </button></a>
                                        </div>
                                    </div>
                                    </div>
                            ";
                            }

                            if ($row['action'] == "upcoming") {

                                $img_path = "admin/image/" . $row['image'];
                                $name = $row['movie_name'];
                                $lang = $row['language'];
                                $btn_path = "movie_details.php?pass=" . $row['id'];

                                $output .= "
                                <div class='card' style='background-image: url($img_path)'>
                                <div class='text-wrapper'> 
                                    <div class='movie-name'>$name</div>
                                    <div class='card-row'>
                                    <div class='card-lang'>$lang</div>
                                    <a href='$btn_path'><button class='cssbuttons-io-button' class='card-btn' id='card-btn'>
                                        Book Now
                                        <div class='icon'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-arrow-right-square' viewBox='0 0 16 16'>
                                            <path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
                                        </svg>
                                        </div>
                                    </button></a>
                                    </div>
                                </div>
                                </div>
                            ";
                            }
                        }

                    } else {
                        $output = '<h3>No Data Found</h3>';
                    }
                    echo $output;
                    echo "</section>";

                    ?>

                </div>
            </div>
        </div>

    </div>
    <?php

    include ("footer.php");
    ?>

    <script>
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
</script>

</body>

</html>