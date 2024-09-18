<?php
session_start();
include_once 'Database.php';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Male_Fashion Template">
  <meta name="keywords" content="Male_Fashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Movie Ticket Booking System</title>
</head>

<body>


  <?php

  include ("header.php");

  ?>

  <!-- 
    ------------
    Hero Section
    ------------
  -->

  <div class="hero-section">

    <?php
    $sql_poster = "SELECT add_movie.id id, add_movie.movie_name name, add_movie.decription description, hero_poster.movie_poster poster
    FROM hero_poster
    JOIN add_movie ON hero_poster.id = add_movie.id;
    ";

    echo "<script>
      var movie = [];
      var desc = [];
      var loc = [];
      var url = [];
      </script>";

    if ($result = mysqli_query($conn, $sql_poster)) {
      while ($row = mysqli_fetch_assoc($result)) {
        $movieName = $row['name'];
        $description = $row['description'];
        $location = $row['poster'];
        $id = $row['id'];

        echo "<script>
          movie.push('$movieName');
          desc.push('$description');
          loc.push('$location');
          url.push('$id');
          </script>";
      }
    } else {
      echo mysqli_error($conn);
    }
    ?>



    <div class="slide">

      <img src="img/hero_posters/" alt="poster" class="hero-img" id="hero-img">

      <div class="content-wrapper">
        <h1 class="hero-heading" id="hero-heading"></h1>
        <p class="hero-desc" id="hero-desc"></p>

        <button class="hero-btn" id="hero-btn">
          <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
          </svg>Book Now</button>
      </div>
    </div>



    <svg id="hero-left-arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
      class="bi bi-caret-left-fill" viewBox="0 0 16 16">
      <path
        d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
    </svg>

    <svg id="hero-right-arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
      class="bi bi-caret-right-fill" viewBox="0 0 16 16">
      <path
        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
    </svg>

  </div>

  <!-- 
    ---------------
     Running Movies
    ---------------
    -->
  <div class="track-container" id="running-movies">

    <h2 class="track-header">Running Movies</h2>

    <div class="track">

      <svg id="track-left-arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-caret-left-square" viewBox="0 0 16 16">
        <path
          d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
        <path
          d="M10.205 12.456A.5.5 0 0 0 10.5 12V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4a.5.5 0 0 0 .537.082" />
      </svg>

      <svg id="track-right-arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-caret-right-square" viewBox="0 0 16 16">
        <path
          d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
        <path
          d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082" />
      </svg>

      <?php
      $running_sql = "select * from add_movie where action = 'running'";

      $running_result = mysqli_query($conn, $running_sql);

      while ($running_card = mysqli_fetch_assoc($running_result)) {

        $img_path = "admin/image/" . $running_card['image'];
        $name = $running_card['movie_name'];
        $lang = $running_card['language'];
        $btn_path = "movie_details.php?pass=" . $running_card['id'];

        echo "
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
      ?>
    </div>
  </div>

  <!-- 
    ---------------
     Upcomming Movies
    ---------------
    -->
  <div class="track-container" id="running-movies">

    <h2 class="track-header">Upcomming Movies</h2>

    <div id="track-select" class="track">

      <svg id="track-left-arrow-upcoming" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-caret-left-square" viewBox="0 0 16 16">
        <path
          d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
        <path
          d="M10.205 12.456A.5.5 0 0 0 10.5 12V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4a.5.5 0 0 0 .537.082" />
      </svg>

      <svg id="track-right-arrow-upcoming" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-caret-right-square" viewBox="0 0 16 16">
        <path
          d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
        <path
          d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082" />
      </svg>

      <?php
      $upcoming_sql = "select * from add_movie where action = 'upcoming'";

      $upcoming_result = mysqli_query($conn, $upcoming_sql);

      while ($upcoming_card = mysqli_fetch_assoc($upcoming_result)) {

        $img_path = "admin/image/" . $upcoming_card['image'];
        $name = $upcoming_card['movie_name'];
        $lang = $upcoming_card['language'];
        $btn_path = "movie_details.php?pass=" . $upcoming_card['id'];

        echo "
            <div class='card' style='background-image: url($img_path)'>
              <div class='text-wrapper'> 
                <div class='movie-name'>$name</div>
                <div class='card-row'>
                  <div class='card-lang'>$lang</div>
                  <a href='$btn_path'> <button class='cssbuttons-io-button' class='card-btn' id='up-card-btn'>
                    Book Now
                    <div class='icon'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='35' height='35' fill='currentColor' class='bi bi-arrow-right-square' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/>
                      </svg>
                    </div>
                  </button> </a>
                </div>
              </div>
            </div>
          ";
      }
      ?>
    </div>
  </div>

  </div>



  <?php
  include ("footer.php");
  ?>

  <!-- Hero Slider -->

  <script>
    var i = 0;
    var heroSection = document.getElementById('hero-section');
    var heroHeading = document.getElementById('hero-heading');
    var heroImg = document.getElementById('hero-img');
    var heroDesc = document.getElementById('hero-desc');
    var heroLeftArrow = document.getElementById('hero-left-arrow');
    var heroRightArrow = document.getElementById('hero-right-arrow');
    var heroBtn = document.getElementById('hero-btn');
    var heroInterval;

    function updateHeroContent() {
      heroHeading.innerHTML = movie[i];
      heroImg.src = 'img/hero_posters/' + loc[i];
      heroDesc.innerHTML = desc[i];
      heroBtn.onclick = (function(index){
        return function() {
          window.location.href = "http://localhost/theator%20booking/theater/movie_details.php?pass=" + url[index];
        };
      })(i);

      var headingElement = document.getElementById('hero-heading');
      var descElement = document.getElementById('hero-desc');
      var btnElement = document.getElementById('hero-btn');

      headingElement.classList.remove('hero-heading');
      descElement.classList.remove('hero-desc');
      btnElement.classList.remove('hero-btn');

      void headingElement.offsetWidth;
      void descElement.offsetWidth;
      void btnElement.offsetWidth;

      headingElement.classList.add('hero-heading');
      descElement.classList.add('hero-desc');
      btnElement.classList.add('hero-btn');
    }

    function runHero() {
      updateHeroContent();
      i++;
      if (i == movie.length) {
        i = 0;
      }
      heroInterval = setTimeout(runHero, 5000);
    }

    heroLeftArrow.addEventListener('click', function () {
      clearTimeout(heroInterval);
      if (i > 0) {
        i--;
      } else {
        i = movie.length - 1;
      }
      updateHeroContent();
      heroInterval = setTimeout(runHero, 5000); // Restart the interval
    });

    heroRightArrow.addEventListener('click', function () {
      clearTimeout(heroInterval);
      if (i < movie.length - 1) {
        i++;
      } else {
        i = 0;
      }
      updateHeroContent();
      heroInterval = setTimeout(runHero, 5000); // Restart the interval
    });

    runHero();

</script>


</body>

</html>