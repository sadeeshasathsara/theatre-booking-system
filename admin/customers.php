<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Customer Page</title>

  <style>
    #filter-svg {
      cursor: pointer;
      margin-bottom: 2px;
    }
  </style>

  <?php 
  session_start();
  if (!isset($_SESSION['admin'])) {
    header("location:login.php");
  }
  ?>
  <?php include_once ("./templates/top.php"); ?>
  <?php include_once ("./templates/navbar.php"); ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <?php include "./templates/sidebar.php"; ?>
      <div class="row">
        <div class="col-10">
          <h2>Customers</h2>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Movie</th>
              <th>Theater</th>
              <th>Show_time</th>
              <th>Seat</th>
              <th>Total Seat</th>
              <th>Price (Rs.)</th>
              <th>Payment Date</th>
              <th>
                Booking Date
                <svg id="filter-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-funnel" viewBox="0 0 16 16">
                  <path
                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                </svg>
              </th>
              <th>Customer</th>
            </tr>
          </thead>
          <tbody id="customer_list">
            <?php
            include_once 'Database.php';

            if (isset($_GET['filter_action'])) {
              $action = $_GET['filter_action'];
              $date = $_GET['filter_date'];

              $sql = "SELECT c.id,c.movie,c.booking_date,c.show_time,c.seat,c.totalseat,c.price,c.payment_date,c.custemer_id,u.username,t.theater 
                      FROM customers c 
                      INNER JOIN user u on c.uid = u.id 
                      INNER JOIN theater_show t on c.show_time = t.show";

              $result = mysqli_query($conn, $sql);

              while ($row = mysqli_fetch_assoc($result)) {
                $date_format = date('Y-m-d', strtotime($row['booking_date']));
                if ($action == 'before' && new DateTime($date_format) < new DateTime($date)) {
            ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['movie']; ?></td>
                    <td><?php echo $row['theater']; ?></td>
                    <td><?php echo $row['show_time']; ?></td>
                    <td><?php echo $row['seat']; ?></td>
                    <td><?php echo $row['totalseat']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['custemer_id']; ?></td>
                  </tr>
                <?php
                }
                if ($action == 'after' && new DateTime($date_format) > new DateTime($date)) {
                ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['movie']; ?></td>
                    <td><?php echo $row['theater']; ?></td>
                    <td><?php echo $row['show_time']; ?></td>
                    <td><?php echo $row['seat']; ?></td>
                    <td><?php echo $row['totalseat']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['custemer_id']; ?></td>
                  </tr>
                <?php
                }
                if ($action == 'on' && new DateTime($date_format) == new DateTime($date)) {
                ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['movie']; ?></td>
                    <td><?php echo $row['theater']; ?></td>
                    <td><?php echo $row['show_time']; ?></td>
                    <td><?php echo $row['seat']; ?></td>
                    <td><?php echo $row['totalseat']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['custemer_id']; ?></td>
                  </tr>
            <?php
                }
              }
            } else {
              $result = mysqli_query($conn, "SELECT c.id,c.movie,c.booking_date,c.show_time,c.seat,c.totalseat,c.price,c.payment_date,c.custemer_id,u.username,t.theater 
                                              FROM customers c 
                                              INNER JOIN user u on c.uid = u.id 
                                              INNER JOIN theater_show t on c.show_time = t.show");

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['movie']; ?></td>
                    <td><?php echo $row['theater']; ?></td>
                    <td><?php echo $row['show_time']; ?></td>
                    <td><?php echo $row['seat']; ?></td>
                    <td><?php echo $row['totalseat']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['custemer_id']; ?></td>
                  </tr>
            <?php
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <style>
    .popup-form-container {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      justify-content: center;
      align-items: center;
    }

    .popup-form-container::-webkit-scrollbar {
      display: none;
    }

    .popup-form {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      position: relative;
      width: 400px;
      max-width: 100%;
      height: 70vh;
      overflow: scroll;
    }

    .popup-form::-webkit-scrollbar {}

    .popup-form h2 {
      margin-top: 0;
    }

    .popup-form label {
      display: block;
      margin-bottom: 10px;
    }

    .popup-form input,
    .popup-form select {
      width: 90%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .popup-form input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    .popup-form input[type="submit"]:hover {
      background-color: #45a049;
    }

    .popup-form .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }
  </style>

  <div class="popup-form-container" id="popup-form-container">
    <div class="popup-form">
      <span class="close-btn" onclick="closeForm()">&#x2716;</span>
      <h2>Filter Customers</h2>
      <form method="GET" action="">
        <label for="filter_action">Filter Action</label>
        <select id="filter_action" name="filter_action">
          <option value="before">Before</option>
          <option value="after">After</option>
          <option value="on">On</option>
        </select>
        <label for="filter_date">Date</label>
        <input type="date" id="filter_date" name="filter_date">
        <input type="submit" value="Apply">
      </form>
    </div>
  </div>

  <script>
    const filterSvg = document.getElementById('filter-svg');
    const popupFormContainer = document.getElementById('popup-form-container');

    filterSvg.addEventListener('click', function () {
      popupFormContainer.style.display = 'flex';
    });

    function closeForm() {
      popupFormContainer.style.display = 'none';
    }
  </script>
</body>

</html>
