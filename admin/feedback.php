<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Feedback Page</title>


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
          <h2>Feedback</h2>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>subject</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM feedback");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                $id = $row['id']; ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['massage']; ?></td>


                  <td>
                    <button id="<?php echo $row['id']; ?>" class="edit-feedback-btns btn btn-primary btn-sm" data-toggle="modal"
                      data-target="#update_show<?php echo $row['id']; ?>">Edit Feedback</button>
                    <a href="app/delete_feedback.php?id=<?php echo $row['id'] ?>"> <button data-toggle="modal"
                        data-target="#delete_show<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete
                        Feedback</button></a>
                  </td>
                </tr>

                <div class="modal fade" id="delete_feedback_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
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
                          <input type="submit" name="deletefeedback" id="deletefeedback" value="OK" class="btn btn-primary">
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="edit_feedback_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">
                                <input class="form-control" name="edit_feedback_name" id="edit_name"
                                  value="<?php echo $row['name']; ?>">
                                <small></small>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="edit_feedback_email" id="edit_email"
                                  value="<?php echo $row['email']; ?>">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>Massage</label>
                                <input class="form-control" name="edit_feedback_massage" id="edit_massage"
                                  value="<?php echo $row['massage']; ?>">
                              </div>
                            </div>
                            <div class="col-12">

                              <input type="submit" name="updatefeedback" id="updatefeedback" value="update"
                                class="btn btn-primary">
                            </div>
                          </div>

                        </form>
                        <div id="preview"></div>
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


  <!-- Edit feedback -->

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

  <div id="popupForm20" class="popup-form-container">
    <div class="popup-form">
      <h2>Edit Feedback</h2>
      <form id="send-edit-feedback-form" method="post" action="app/edit_feedback.php">
        <label for="add-show">Name</label>
        <input type="text" id="add-show" name="edit_name">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">

        <label for="add-theater">Message</label>
        <input type="text" id="add-theater" name="message">

        <button id="send-edit-feedback-form-btn" type="submit">Submit</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

      var openFormBtns = document.getElementsByClassName('edit-feedback-btns');
      var popupForm = document.getElementById('popupForm20');

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

      document.getElementById('send-edit-feedback-form-btn').addEventListener('click', createHiddenInput);

      function createHiddenInput() {
        var hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'edit_id';
        hiddenField.value = sessionStorage.getItem('selectedBtnId');

        var form = document.getElementById('send-edit-feedback-form').appendChild(hiddenField);

      }
    });

  </script>




  <?php include_once ("./templates/footer.php"); ?>