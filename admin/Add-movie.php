<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Movies Page</title>

<?php session_start();  
if (!isset($_SESSION['admin'])) {
  header("location:login.php");
}
?>

<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Add movie</h2>
      	</div>
      	<div class="col-2">
      		<button id="add-movie-btn" data-toggle="modal" data-target="#add_movie_modal" class="btn btn-primary btn-sm">Add Movie</button>
        </div>
        
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>Movie name</th>
              <th>Directer</th>
              <th>categroy</th>
              <th>language</th>
              <th>Show</th>
              <th>Image</th>
              <th>Action</th>
              
            </tr>
          </thead>
          <tbody id="product_list">
            <?php
include_once 'Database.php';
$result = mysqli_query($conn,"SELECT * FROM add_movie");

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {
    $id=$row['id'];
    ?>
    <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['movie_name'];?></td>
              <td><?php echo $row['directer'];?></td>
              <td><?php echo $row['categroy'];?></td>
              <td><?php echo $row['language'];?></td>
              <?php //echo "<script> alert('');</script>"; ?>
              
              <td><?php echo $row['show'];?></td>
              <td><img src="image/<?php echo $row['image']; ?>" alt="" class="resize"></td>
              <td><button id="<?php echo $id; ?>" data-toggle="modal" type="button" data-target="#edit_movie_modal<?php echo $id;?>" class="edit-movie-btn btn btn-primary btn-sm" >Edit Movie</button></td>
              <td><a href="app/delete_movie.php?id=<?php echo $id ?>"> <button data-toggle="modal" type="button" data-target="#delete_movie_modal<?php echo $id;?>" class="btn btn-danger btn-sm">Delete Movie</button></a></td></td>
            </tr>

 <div class="modal fade" id="delete_movie_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <h4> Yor Sour This id "<?php echo $row['id'];?>" is delete.</h4>
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          <input type="submit" name="deletemovie" id="deletemovie" value="OK" class="btn btn-primary">
          </form>

      </div>
    </div>
  </div>
</div> 

<div class="modal fade" id="edit_movie_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Movie Name</label>
                <input type="hidden" name="e_id" value="<?php echo $row['id'];?>">
                <input class="form-control" name="edit_movie_name" id="edit_movie_name" value="<?php echo $row['movie_name'];?>">
                <small></small>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Directer Name</label>
                <input class="form-control" name="edit_directer_name" id="edit_directer_name" value="<?php echo $row['directer'];?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>category</label>
                <input class="form-control" name="edit_category" id ="edit_category" value="<?php echo $row['categroy']; ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>language</label>
                <input type="text" name="edit_language" id="edit_language" class="form-control" value="<?php echo $row['language'];?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Time</label>
                  <?php
                  $seats = explode(",", $row['show']);
                $sql = mysqli_query($conn,"SELECT * FROM theater_show");
                if (mysqli_num_rows($sql) > 0) {
                  while($fatch = mysqli_fetch_array($sql)) {
                        $checked = $fatch['show'];
                    ?>
                    <font size="2"> <?php echo $fatch['show'];?></font><input type="checkbox" name="show[]" id="show" value="<?php echo $fatch['show'];?>" <?php
                         if(in_array($checked,$seats)){
                                    echo "checked";
                                }
                    ?>>
                
                    <?php
                  }
                }
              ?>
              </div>
            </div>
             <div class="col-12">
              <div class="form-group">
                <label>Tailer</label>
                <input type="text" name="edit_tailer" id="edit_tailer" class="form-control" value="<?php echo $row['you_tube_link'];?>">
              </div>
            </div>
             <div class="col-12">
              <div class="form-group">
                <label>Action</label>
                <select class="form-control" name="edit_action">
                  <option value="<?php echo $row['action'];?>"><?php echo $row['action'];?></option>
                  <option value="upcoming">upcoming</option>
                  <option value="running">running</option>                    
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Decription</label>
                <textarea type="text" name="decription" id="decription" class="form-control" value="<?php echo $row['decription'];?>">
                <?php echo $row['decription'];?></textarea>
              </div>
            </div>       
            <div class="col-12">
              <div class="form-group">
                <label>Set of Time</label>
                <img src="image/<?php echo $row['image'];?>" width="10%">
                <input type="file" name="edit_img" id="edit_img" class="form-control">
                <input type="hidden" name="old_image" value="<?php echo $row['image'];?>" id="old_image" class="form-control">              
              </div>
            </div>
            <input type="hidden" name="add_product" value="1">
            <div class="col-12">
            
              <input type="submit" name="updatemovie" id="updatemovie" value="update" class="btn btn-primary">
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



<!-- Add Product Modal start -->
<div class="modal fade" id="add_movie_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="myform" id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateform()" >
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Movie Name</label>
		        		<input class="form-control" name="movie_name" id="movie_name" placeholder="movie name">
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Directer Name</label>
                <input class="form-control" name="directer_name" id="directer_name" placeholder="Directer name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Release Date</label>
                <input class="form-control" name="release_date" id="release_date" placeholder="Directer name">
              </div>
            </div>
      
        		<div class="col-12">
        			<div class="form-group">
		        		<label>category</label>
		        		<input class="form-control" name="category" id ="category" placeholder="Enter category">
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>language</label>
                <input type="text" name="language" id="language" class="form-control" placeholder="Enter Language">
              </div>
            </div>
            
            <div class="col-12">
              <div class="form-group">
                <label>Theater 1</label>
              <?php
                $result = mysqli_query($conn,"SELECT * FROM theater_show");
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_array($result)) {
                    if($row['theater']==1){
                    
                    ?>
                    <font size="2"> <?php echo $row['show'];?></font><input type="checkbox" name="show[]" id="show" value="<?php echo $row['show'];?>">
                
                    <?php
                  }
                  }
                }
              ?>
                
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Theater 2</label>
              <?php
                $result = mysqli_query($conn,"SELECT * FROM theater_show");
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_array($result)) {
                    if($row['theater']==2){
                    
                    ?>
                    <font size="2"> <?php echo $row['show'];?></font><input type="checkbox" name="show[]" id="show" value="<?php echo $row['show'];?>">
                
                    <?php
                  }
                  }
                }
              ?>
                
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Tailer</label>
                <input type="text" name="tailer" id="tailer" class="form-control" placeholder="Enter Tailer">
              </div>
            </div>
             <div class="col-12">
              <div class="form-group">
                <label>Action</label>
                <select class="form-control" name="action" id="action">
                  <option value="">Action</option>
                  <option value="upcoming">upcoming</option>
                  <option value="running">running</option>                    
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Decription</label>
                <textarea type="text" name="decription" id="decription" class="form-control">
                </textarea>
              </div>
            </div>
        		<div class="col-12">
              <div class="form-group">
                <label>Uplode Poster</label>
                <input type="file" name="img" value="img" id="img" class="form-control">
              </div>
            </div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        		
              <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
        		</div>
        	</div>
        	
        </form>
        <div id="preview"></div>
      </div>
      
    </div>
    
  </div>
  
</div>

<!-- Add Movie -->

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

.popup-form-container::-webkit-scrollbar{
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

.popup-form::-webkit-scrollbar{
  
}

.popup-form h2 {
    margin-top: 0;
}

.popup-form label {
    display: block;
    margin: 10px 0 5px;
}

.popup-form input,
.popup-form textarea, .popup-form select {
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

    <div id="popupForm" class="popup-form-container">
        <div class="popup-form">
            <h2>Add a movie</h2>
            <form method="post" action="app/add_movie.php" enctype="multipart/form-data">
                <label for="movie-name">Movie Name*</label>
                <input type="text" id="movie-name" name="add_movie_name" required>

                <label for="director">Director(s)*</label>
                <input type="text" id="director" name="add_director" required>

                <label for="release-date">Release Date*</label>
                <input type="date" id="release-date" name="add_release_date" required>

                <label for="category">Category(s)*</label>
                <input type="text" id="category" name="add_category" required>

                <label for="language">Language(s)*</label>
                <input type="text" id="language" name="add_language" required>

                <label for="utube">Youtube Link*</label>
                <input type="text" id="utube" name="add_utube" required>

                <label for='show'>Show</label>
                <select id='show' name='add_show' required>
                <option>--select one--</option>

                <?php

                $get_shows_sql = "select * from theater_show";

                $shows = mysqli_query($conn, $get_shows_sql);

                while($show_row = mysqli_fetch_assoc($shows)){
                  echo "
                    <option class='show-options' value='".$show_row['show']."'>".$show_row['show']."</option>
                  ";
                }

                ?>

                </select>

                <label for="action">Action*</label>
                <input type="text" id="action" name="add_action" required>

                <label for="discription">Description*</label>
                <input type="text" id="discription" name="add_description" required>

                <label for="image">Poster*</label>
                <input type="file" accept="image/*" id="director" name="add_poster" required>

                <label for="status">Status*</label>
                <input type="text" id="status" name="add_status" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
    var openFormBtn = document.getElementById('add-movie-btn');
    var popupForm = document.getElementById('popupForm');

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

<!-- edit movie -->

<div id="popupForm1" class="popup-form-container">
        <div class="popup-form">
            <h2>Edit Movie</h2>
            <form id="edit-form" method="post" action="app/edit_movie.php" enctype="multipart/form-data">

                <label for="movie-name">Movie Name</label>
                <input type="text" id="movie-name" name="edit_movie_name">

                <label for="director">Director(s)</label>
                <input type="text" id="director" name="edit_director">

                <label for="release-date">Release Date</label>
                <input type="date" id="release-date" name="edit_release_date">

                <label for="category">Category(s)</label>
                <input type="text" id="category" name="edit_category">

                <label for="language">Language(s)</label>
                <input type="text" id="language" name="edit_language">

                <label for="utube">Youtube Link</label>
                <input type="text" id="utube" name="edit_utube">

                <label for='show'>Show</label>
                <select id='show' name='edit_show' required>
                  <option>--select one--</option>

                <?php

                $get_shows_sql = "select * from theater_show";

                $shows = mysqli_query($conn, $get_shows_sql);

                while($show_row = mysqli_fetch_assoc($shows)){
                  echo "
                    <option class='show-options' value='".$show_row['show']."'>".$show_row['show']."</option>
                  ";
                }

                ?>

                </select>

                <label for="action">Action</label>
                <input type="text" id="action" name="edit_action">

                <label for="discription">Description</label>
                <input type="text" id="discription" name="edit_description">

                <label for="image">Poster</label>
                <input type="file" accept="img/*" id="director" name="edit_poster">

                <label for="status">Status</label>
                <input type="text" id="status" name="edit_status">

                <button id="send-edit-form-btn" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

      var openFormBtns = document.getElementsByClassName('edit-movie-btn');
      var popupForm = document.getElementById('popupForm1');

      for (var i=0; i<openFormBtns.length; i++){
        openFormBtns[i].addEventListener('click', function(){
          popupForm.style.display = 'flex';
          sessionStorage.setItem('selectedBtnId', this.id);
        });
      }

      popupForm.addEventListener('click', function (event) {
        if (event.target === popupForm) {
            popupForm.style.display = 'none';
        }
      });

      document.getElementById('send-edit-form-btn').addEventListener('click', createHiddenInput);

      const form = document.getElementById('edit-form');

      function createHiddenInput(){
        var hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = 'edit_id';
        hiddenField.value = sessionStorage.getItem('selectedBtnId');

        var form = document.getElementById('edit-form').appendChild(hiddenField);

      }

      
    });


    </script>

<!-- Edit movie Modal start -->

<?php include_once("./templates/footer.php"); ?>
<script>  
function validateform(){  
var name=document.myform.movie_name.value;  
var directer=document.myform.directer_name.value;  
  

if (name==""){  
  alert("Requre Movie Name");  
  return false;  
}else if(directer==""){  
  alert("Requre Directer Name");  
  return false;  
  }  
}

</script>

