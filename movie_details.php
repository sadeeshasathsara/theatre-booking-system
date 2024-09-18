<?php
session_start();

include_once 'Database.php';
$id = $_GET['pass'];
$result = mysqli_query($conn, "SELECT * FROM add_movie WHERE id = '" . $id . "'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>

  <!-- Css Styles -->
  <meta charset="UTF-8">
  <meta name="description" content="Male_Fashion Template">
  <meta name="keywords" content="Male_Fashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $row['movie_name']; ?> Movie Deatis</title>



  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="css/nice-select.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
  <link rel="stylesheet" href="css/fonts-googleapis.css" type="  text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
  <?php
  include ("header.php");
  ?>

  <?php
  include_once 'Database.php';
  $id = $_GET['pass'];
  $result = mysqli_query($conn, "SELECT * FROM add_movie WHERE id = '" . $id . "'");


  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $bg_img = $row['image'];
      ?>

      <section id="details-container">
        <div id="bg-blur" <?php echo "style = 'background-image:url(admin/image/" . $bg_img . ");'"; ?>>
          <div id="details-inside-container" class="container">

            <div id="details-img-container" class="row feature design">
              <div id="details-img" class="col-lg-5"> <img id="details-img-tr" src="admin/image/<?php echo $row['image']; ?>"
                  class="resize-detail" alt="" width="100%"> </div>
              <div class="col-lg-7">

                <div id="details-right-box">

                  <table class="content-table">
                    <thead>
                      <tr>
                        <th colspan="2">Movie Deatils</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Movie Name</td>
                        <td class="t-dt"><?php echo $row['movie_name']; ?></td>
                      </tr>
                      <tr>
                        <td>Release Date</td>
                        <td class="t-dt"><?php echo $row['release_date']; ?></td>
                      </tr>
                      <tr>
                        <td>Directer Name</td>
                        <td class="t-dt"><?php echo $row['directer']; ?></td>
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td class="t-dt"><?php echo $row['categroy']; ?></td>
                      </tr>
                      <tr>
                        <td>Language</td>
                        <td class="t-dt"><?php echo $row['language']; ?></td>
                      </tr>

                      <tr>
                        <td>Tailer</td>
                        <td><a class="t-dt" data-toggle="modal" data-target="#tailer_modal<?php echo $row['id']; ?>">Veiw
                            Tailer<svg id="utube-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                              fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                              <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg></a></td>
                        <div class="modal fade" id="tailer_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <embed id="utube-popup" style="width: 820px; height: 450px;"
                                src="<?php echo $row['you_tube_link']; ?>"></embed>
                            </div>
                          </div>
                        </div>
                      </tr>

                    </tbody>


                  </table>
                  <?php if ($row['action'] == "running") { ?>
                    <div class="tiem-link">
                      <h4 id="ticket-header">Show Book Ticket:</h4><br>
                      <?php
                      $time = $row['show'];

                      $movie = $row['movie_name'];
                      $set_time = explode(",", $time);
                      $res = mysqli_query($conn, "SELECT * FROM theater_show");

                      if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_array($res)) {

                          if (in_array($row['show'], $set_time)) {

                            ?><a
                              href="seatbooking.php?movie=<?php echo $movie; ?>&time=<?php echo $row['show']; ?>"><?php echo $row['show']; ?></a><?php

                          }
                        }
                      }
                      ?>

                    </div>
                  </div>
                  <?php
                  }
                  ?>
              </div>
              <!-- <div id="details-desc">
                  <p id="desc">
                    <?php
                    echo $row['decription'];
                    ?>
                  </p>
              <?php
                  }
                }
              ?>
              </div> -->
            </div>
 
            
          </div>
          
    </div>
    
  </section>

 

  <?php
  include ("footer.php");
  ?>
</body>

</html>