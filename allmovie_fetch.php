<?php

//fetch_data.php

include('database_connection.php');

if (isset($_POST["action"])) {
	echo '<script>alert("HI");</script>';

	$query = "
		SELECT * FROM add_movie WHERE status = '1'
	";
	
	if(isset($_POST["categroy"]))
	{
		$categroy_filter = implode("','", $_POST["categroy"]);
		$query .= "
		 AND categroy IN('".$categroy_filter."')
		";
	}
	if(isset($_POST["language"]))
	{
		$language_filter = implode("','", $_POST["language"]);
		$query .= "
		 AND language IN('".$language_filter."')
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
	
}

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