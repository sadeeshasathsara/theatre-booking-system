<?php
include("../Database.php");

if (isset($_POST["add_movie_name"])) {
    $movie_name = mysqli_real_escape_string($conn, $_POST["add_movie_name"]);
    $movie_director = mysqli_real_escape_string($conn, $_POST["add_director"]);
    $movie_category = mysqli_real_escape_string($conn, $_POST["add_category"]);
    $movie_language = mysqli_real_escape_string($conn, $_POST["add_language"]);
    $movie_show = mysqli_real_escape_string($conn, $_POST["add_show"]);
    $movie_action = mysqli_real_escape_string($conn, $_POST["add_action"]);
    $movie_released = mysqli_real_escape_string($conn, $_POST["add_release_date"]);
    $utube = mysqli_real_escape_string($conn, $_POST["add_utube"]);
    $description = mysqli_real_escape_string($conn, $_POST["add_description"]);
    $status = mysqli_real_escape_string($conn, $_POST["add_status"]);

    $img_name = mysqli_real_escape_string($conn, $_FILES['add_poster']['name']);
    $img_name = str_replace(' ', '', $img_name);
    $tmp_name = $_FILES['add_poster']['tmp_name'];
    $error = $_FILES['add_poster']['error'];

    if ($error == 0) {
        $upload_path = '../image/' . $img_name;
        move_uploaded_file($tmp_name, $upload_path);
    }

    if (strpos($utube, 'watch?v=') !== false) {
        $utube = str_replace('watch?v=', 'embed/', $utube);
    }

    $add_movie = "INSERT INTO add_movie 
    (`movie_name`, `directer`, `release_date`, `categroy`, `you_tube_link`, `show`, `action`, `decription`, `image`, `status`) 
    VALUES 
    ('$movie_name', '$movie_director', '$movie_released', '$movie_category', '$utube', '$movie_show', '$movie_action', '$description', '$img_name', '$status')";

    if (mysqli_query($conn, $add_movie)) {
        echo "<script>alert('Successfully Added');</script>";
        echo "<script>window.location.href = 'http://localhost/theator%20booking/theater/admin/add-movie.php'</script>";
    } else {
        echo "<script>alert('Error Occurred');</script>";
        echo mysqli_error($conn);
    }
}
?>
