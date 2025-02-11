<?php
include '../includes/config.php';
include '../includes/session.php';
include '../includes/header.php';
?>

<?php
if(isset($_POST['pay'])){
    $paid = $_POST['paid'];
    $sql = "SELECT SUM(Total) AS total_sum
    FROM medicine";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
    $sum = $row['total_sum'];
    $totall = $sum - $paid;
}

?>
<body>

	<div class="mobile-menu-overlay"></div>


    <div class="container" style="margin-left: 30%;margin-bottom:20px">
        <div class="navigation">
            <ul>
                <li class="list ">
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text">Home</span>
                        <span class="circle"></span>
                    </a>

                <li class="list active ">
                    <a href="purchase.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="text">Sales</span>
                        <span class="circle" style="transform: translateY(-32px) scale(1)"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="stock_entry.php">
                        <span class="icon">
                            <ion-icon name="bag-remove-outline"></ion-icon>
                        </span>
                        <span class="text">Stock</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="purchase.php">
                        <span class="icon">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </span>
                        <span class="text">Add</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="enter_medicine.php">
                        <span class="icon">
                        <i class="bi bi-prescription2"></i>
                        </span>
                        <span class="text">Enter Medicine</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list">
                    <a href="../includes/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>                        </span>
                        <span class="text">Logout</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <div class="indicator"></div>
            </ul>
        </div>
    </div>
    

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<div class="main-container" style="margin-top: 0px;padding-top:0px;margin-left:-10%">

		<div class="card-box mb-30">
			<div class="pb-20">
            <table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus">Medicine</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th class="datatable-nosort">Total Price</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM medicine WHERE MedicineID = $id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        $Price = $row['Price'];
        $quantity = $row['Quantity'];
        $total = $quantity * $Price;
        $sql = "UPDATE medicine SET Total = $total WHERE MedicineID = $id";
        $query = mysqli_query($conn, $sql);

        $sql1 = "SELECT * FROM medicine WHERE Status = 1";
        $stmt = $conn->prepare($sql1);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="table-plus">';
            echo '<div class="name-avatar d-flex align-items-center">';
            echo '<div class="txt">';
            echo '<div class="weight-600">' . $row['MedicineName'] . '</div>';
            echo '</div>';
            echo '</div>';
            echo '</td>';
            echo '<td>' . $row['Manufacturer'] . '</td>';
            echo '<td><input readonly type="number" name="quantity" value="' . $row['Quantity'] . '" readonly></td>';
            echo '<td><input readonly type="number" name="id" value="' . $row["Price"] . '"></td>';
            echo '<td>' . $row['Total'] . '</td>';
            echo '<td><a href="remove.php?id=' . $row['MedicineID'] . '"><i class="bi bi-trash-fill"></i></a></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

			</div>
		</div>

        <form action="" method="post" name="payment">
            <div class="container" style="margin-left:-15%;margin-top:15%;display: grid;grid-template-columns:20% 20% 20% 20% 20% 20%">
                <div style="background-color: green;">
                    <h3 style="margin-left:15px;">Sub Total</h3>
                    <?php
                    $sql = "SELECT SUM(Total) AS total_sum
                    FROM medicine";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($query);
                    echo '<h3 style="margin-left:15px;">' . $row['total_sum'] . '</h3>';
                    ?>
                </div>
                <div style="background-color: skyblue;">
                    <h3>Paying Amount</h3>
                    <input type="text" name="paid" style="background-color: transparent;border:0px solid skyblue;padding:10px;font-size:15px;font-weight:600;">
                </div>

                <div style="background-color: orange;">
                    <h3>Remaining Amount</h3>
                    <input type="text" name="remain" value="<?php echo isset($totall) ? $totall : 0; ?>" style="background-color: transparent;border:0px solid skyblue;padding:10px;font-size:15px;font-weight:600;">
                </div>
                <div style="background-color: red;text-align:center;">
                    <button type="submit" name="pay" style="background-color: transparent;border:0px;padding:10px"><h3>Pay</h3></button>
                </div>
                <div style="background-color: Blue;">
                <button type="submit" name="refresh" style="background-color: transparent;border:0px;padding:10px">
                <h3>Refresh</h3>
                </button>
                </div>

            </div>
        </form>
        <form action="" method="post" name="refresh">

</form>
    </div>

<style>
    .transparent-input {
  background-color: transparent;
  border: none;
  outline: none;
  color: transparent;
}
</style>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
        var checkbox = document.querySelector('input[name="checkbox_name"]');
        if (checkbox.checked) {
            checkbox.value = 1;
        }
        });
    </script>


<?php
if (isset($_POST['refresh'])) {
    $sql = "SELECT * FROM users WHERE UserID = $session_id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $shopID = $row["shop_ID"];
    $curr = date("Y-m-d");


    $sql = "SELECT * FROM medicine WHERE Status = 1";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $ID = $row['MedicineID'];
        $Quantity = $row['Quantity'];
        $Total = $row['Total'];
        $sql1 = "select * from stock where MedicineID = $ID ";
        $query = mysqli_query($conn,$sql1);
        $result = mysqli_fetch_assoc($query);
        $rooooow = $result['Quantity'];
        $total_quantity = $rooooow - $Quantity;
    
    $sql4 = "update stock set Quantity = $total_quantity where MedicineID = $ID";
    $query4 = mysqli_query($conn,$sql4);

    $sql2 = "INSERT INTO `sales`(`ShopID`, `MedicineID`, `SaleDate`, `Quantity`, `TotalAmount`) VALUES ($shopID, $ID, '$curr', $Quantity, '$Total');";
    $query2 = mysqli_query($conn, $sql2);
}
    $sql3 = "UPDATE `medicine` SET `Status` = 0, `Quantity` = 0, `Total` = 0 WHERE Status = 1";
    $query3 = mysqli_query($conn,$sql3);

    $sql5 = "select stock.Quantity,MedicineName from stock join medicine on medicine.MedicineID = stock.MedicineID";
    $query5 = mysqli_query($conn,$sql5);
    $result1 = mysqli_fetch_assoc($query5);
    $ttt=$result1['MedicineName'];
    if($ttt<10){
        echo '<script>alert("Total sum is less than 10 for ' . $row['MedicineName'] . '");</script>';
    }
}
?>
    
</body>


