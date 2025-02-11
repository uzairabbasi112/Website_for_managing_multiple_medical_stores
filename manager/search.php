<?php
    session_start();
    include_once "../includes/config.php";

    $outgoing_id = $_SESSION['UserID'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM medicine WHERE (MedicineName LIKE '%{$searchTerm}%' OR Manufacturer LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "index.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>