<?php
include("../Database.php");

if (isset($_POST["edit_id"])){
    $movie_id = $_POST['edit_id'];
    $movie_name = !empty($_POST["edit_movie_name"]) ? $_POST["edit_movie_name"] : null;
    $movie_director = !empty($_POST['edit_director']) ? $_POST["edit_director"] : null;
    $movie_category = !empty($_POST['edit_category']) ? $_POST['edit_category'] : null;
    $movie_language = !empty($_POST['edit_language']) ? $_POST['edit_language'] : null;
    $movie_show = !empty($_POST['edit_show']) ? $_POST['edit_show'] : null;
    $movie_image = !empty($_FILES['edit_poster']) ? $_FILES['edit_poster'] : null;
    $movie_action = !empty($_POST['edit_action']) ? $_POST['edit_action'] : null;
    $movie_released = !empty($_POST['edit_release_date']) ? $_POST['edit_release_date'] : null;
    $utube = !empty($_POST['edit_utube']) ? $_POST['edit_utube'] : null;
    $description = !empty($_POST['edit_description']) ? $_POST['edit_description'] : null;
    $status = !empty($_POST['edit_status']) ? $_POST['edit_status'] : null;

    $query = "UPDATE add_movie SET ";

    if ($movie_name !== null) {
        $query = $query . "`movie_name` = '$movie_name', ";
    }
    if ($movie_director !== null) {
        $query = $query . "`directer` = '$movie_director', ";
    }
    if ($movie_category !== null) {
        $query = $query . "`categroy` = '$movie_category', ";
    }
    if ($movie_language !== null) {
        $query = $query . "`language` = '$movie_language', ";
    }
    if ($movie_show !== '--select one--') {
        $query = $query . "`show` = '$movie_show', ";
    }
    if ($_FILES['edit_poster']['error']==0) {

        echo $_FILES['edit_poster']['error'];
        
        $img_name = $_FILES['edit_poster']['name'];
        $img_name = str_replace(' ', '', $img_name);
        $tmp_name = $_FILES['edit_poster']['tmp_name'];
        $error = $_FILES['edit_poster']['error'];

        $query = $query . "`image` = '$img_name', ";

        if ($error == 0) {
            $upload_path = '../image/' . $img_name;
            move_uploaded_file($tmp_name, $upload_path);
        }
    }
    if ($movie_action !== null) {
        $query = $query . "`action` = '$movie_action', ";
    }
    if ($movie_released !== null) {
        $query = $query . "`release_date` = '$movie_released', ";
    }
    if ($utube !== null) {
        if (strpos($utube, 'watch?v=') !== false) {
            $utube = str_replace('watch?v=', 'embed/', $utube);
        }
        $query = $query . "`you_tube_link` = '$utube', ";
    }
    if ($description !== null) {
        $query = $query . "`description` = '$description', ";
    }
    if ($status !== null) {
        $query = $query . "`status` = '$status', ";
    }

    $query = substr($query, 0, -2);

    $query = $query . " where id = $movie_id";

    // echo $query;

    if(mysqli_query($conn, $query)){
        echo "<script>
        alert('Successfully updated');
        sessionStorage.removeItem('selectedBtnId');
        window.location.href = 'http://localhost/theator%20booking/theater/admin/add-movie.php';
        </script>";
    }else{
        echo "<script>
        alert('Error Occured');
        sessionStorage.removeItem('selectedBtnId');
        </script>";
        echo mysqli_error($conn);
    }
    
}