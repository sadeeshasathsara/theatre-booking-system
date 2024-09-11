<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Theater and Show Page</title>

  <?php session_start();
  if (!isset($_SESSION['admin'])) {
    header("location:login.php");
  }
  ?>
  <?php include_once ("./templates/top.php"); ?>
  <?php include_once ("./templates/navbar.php"); ?>
  <div class="container-fluid">
    <div class="row">

      <?php include "./templates/sidebar.php"; ?>

      <div class="row">
        <div class="col-10">
          <h2>Offers</h2>
        </div>
        <div class="col-2">
          <button id="add-show-btn" data-toggle="modal" data-target="#add_show" class="btn btn-primary btn-sm">Add Offer</button>
        </div>


      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Offer ID</th>
              <th>Offer Title</th>
              <th>Discount</th>
              <th>User ID</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM offer");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td><?php echo $row['offerId']; ?></td>
                  <td><?php echo $row['offerTitle']; ?></td>
                  <td><?php echo $row['offerDiscount'] . "%"; ?></td>
                  <td><?php echo $row['userId']; ?></td>
                  <td><?php echo $row['collected'];?></td>
                  <td>
                    <button id="<?php echo $row['offerId']; ?>" class="edit-show-btn btn btn-primary btn-sm" data-toggle="modal"
                      data-target="#update_show<?php echo $row['offerId']; ?>">Edit Discount</button>
                    <a href="app/delete_offer.php?id=<?php echo $row['offerId'] ?>"> <button data-toggle="modal"
                        data-target="#delete_show<?php echo $row['offerId']; ?>" class="btn btn-danger btn-sm">Delete
                        Offer</button></a>
                  </td>
                </tr>
                <div class="modal fade" id="update_show<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Show</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>Screen</label>
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">

                                <select class="form-control" name="edit_screen" id="edit_screen">
                                  <option value="<?php echo $row['theater']; ?>"><?php echo $row['theater']; ?></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                </select>
                                <small></small>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>show</label>
                                <input type="time" class="form-control" name="edit_time" id="edit_time"
                                  value="<?php echo $row['show']; ?>">
                              </div>
                            </div>

                            <div class="col-12">

                              <input type="submit" name="updatetime" id="updatetime" value="update" class="btn btn-primary">
                            </div>
                          </div>

                        </form>
                        <div id="preview"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="delete_show<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Movie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post">
                          <h4> Yor Sour This id "<?php echo $row['id']; ?>" is delete.</h4>
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="submit" name="deletetime" id="deletetime" value="OK" class="btn btn-primary">
                        </form>

                      </div>
                    </div>
                  </div>
                </div>



                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      </main>
    </div>
  </div>

  <!-- Add offer -->

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
      margin: 10px 0 5px;
    }

    .popup-form input,
    .popup-form textarea, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .popup-form button {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #007BFF;
      color: white;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>

  <div id="popupForm2" class="popup-form-container">
    <div class="popup-form">
      <h2>Add offer</h2>
      <form method="post" action="app/add_offer.php">
        <label for="add-show">Offer Title*</label>
        <input type="text" id="add-show" name="add_offer_title" required>

        <label for="add-theater">Discount(%)*</label>
        <input type="text" id="add-theater" name="add_discount" required>

        <label for="add-theaterr">User*</label>
        <select id="add-theaterr" name="add_user" required>
            <?php
            $sql = "select * from user";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $usId = $row['id'];
                $usn = $row['username'];
                echo "<option value='$usId'>$usn</option>";
            }
            ?>
        </select>

        <input type="hidden" name="status" value="0">

        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var openFormBtn = document.getElementById('add-show-btn');
      var popupForm = document.getElementById('popupForm2');

      openFormBtn.addEventListener('click', function () {
        popupForm.style.display = 'flex';
      });

      popupForm.addEventListener('click', function (event) {
        if (event.target === popupForm) {
          popupForm.style.display = 'none';
        }
      });
    });

  </script>

  <!-- Edit show -->

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
      margin: 10px 0 5px;
    }

    .popup-form input,
    .popup-form textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .popup-form button {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #007BFF;
      color: white;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>

  <div id="popupForm3" class="popup-form-container">
    <div class="popup-form">
      <h2>Edit offer</h2>
      <form id="send-edit-show-form-btn" method="post" action="app/edit_offer.php">
      <label for="add-show">Offer Title</label>
        <input type="text" id="add-show" name="edit_offer_title">

        <label for="add-theater">Discount(%)</label>
        <input type="text" id="add-theater" name="edit_discount">

        <label for="add-theaterr">User</label>
        <select id="add-theaterr" name="edit_user">
            <option>--Select One--</option>
            <?php
            $sql = "select * from user";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $usId = $row['id'];
                $usn = $row['username'];
                echo "<option value='$usId'>$usn</option>";
            }
            ?>
        </select>

        <label for="add-theaterrr">Discount Status</label>
        <select name="status" id="add-theaterrr">
            <option>--Select One--</option>
            <option value="0">ADD</option>
            <option value="1">Remove</option>
        </select>

        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

      var openFormBtns = document.getElementsByClassName('edit-show-btn');
      var popupForm = document.getElementById('popupForm3');

      for (var i = 0; i < openFormBtns.length; i++) {
        openFormBtns[i].addEventListener('click', function () {
          popupForm.style.display = 'flex';
          sessionStorage.setItem('selectedBtnId', this.id);
        });
      }

      popupForm.addEventListener('click', function (event) {
        if (event.target === popupForm) {
          popupForm.style.display = 'none';
        }
      });

      document.getElementById('send-edit-show-form-btn').addEventListener('click', createHiddenInput);

      function createHiddenInput() {
        var hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'edit_id';
        hiddenField.value = sessionStorage.getItem('selectedBtnId');

        var form = document.getElementById('send-edit-show-form-btn').appendChild(hiddenField);

      }
    });

  </script>



  <?php include_once ("./templates/footer.php"); ?>



  <script>
    function validateform() {
      var theater_name = document.myform.theater_name.value;
      var show = document.myform.show.value;


      if (theater_name == "") {
        alert("Reqiure theater name");
        return false;
      }
      else if (show == "") {
        alert("Reqiure Enter show");
        return false;
      }

    }


  </script>

  </script>