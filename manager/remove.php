<?php
include '../includes/config.php';
$ID = $_GET['id'];
$sql = "update medicine set Status = 0,Quantity = 0,Total = 0 where MedicineID = $ID";
$query = mysqli_query($conn,$sql);
echo "<script type='text/javascript'> document.location = 'purchase.php'; </script>";
?>