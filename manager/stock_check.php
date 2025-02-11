<?php
include '../includes/config.php';
include '../includes/header.php';
session_start();
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
                </li>

                <li class="list ">
                    <a href="purchase.php">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="text">Sales</span>
                        <span class="circle"></span>
                    </a>
                </li>
    
                <li class="list">
                    <a href="stock_entry.php">
                        <span class="icon">
                            <ion-icon name="bag-remove-outline"></ion-icon>
                        </span>
                        <span class="text">Stock</span>
                        <span class="circle" ></span>
                    </a>
                </li>
                <li class="list active">
                    <a href="stock_check.php">
                        <span class="icon">
                        <i class="bi bi-binoculars"></i>
                        </span>
                        <span class="text">Stock Check</span>
                        <span class="circle" style="transform: translateY(-32px) scale(1)"></span>
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
            <h2>Stock Check</h2>
			<div class="pb-20">
            <table class="data-table table stripe hover nowrap">
    <thead>
        <tr>
            <th class="table-plus">Medicine</th>
            <th>Quantity</th>
            <th>Expiry</th>
            <th>Dealer</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
    <?php
$currentDate = date('Y-m-d'); // Get the current date

$sql = "SELECT * FROM stock";
$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['MedicineID'];
    $dealerid = $row['DealerID'];
    $sql4 = "SELECT * from dealer where DealerID = $dealerid";
    $query4 = mysqli_query($conn, $sql4);
    $rorr = mysqli_fetch_assoc($query4);
    $dealername = $rorr['Name'];
    $sql1 = "SELECT * FROM medicine WHERE MedicineID = $id";
    $query1 = mysqli_query($conn, $sql1);
    $result = mysqli_fetch_assoc($query1);
    $name = $result['MedicineName'];

    $expiryDate = $row['Date']; // Expiry date from the database

    echo '<tr>';
    echo '<td class="table-plus">';
    echo '<div class="name-avatar d-flex align-items-center">';
    echo '<div class="txt">';

    // Compare the expiry date with the current date plus 6 months
    $expiryDatePlus6Months = date('Y-m-d', strtotime('+6 months', strtotime($currentDate)));

    if ($expiryDate > $expiryDatePlus6Months) {
        echo '<div class="weight-600" style="color: blue;">' . $result['MedicineName'] . '</div>';
    } else {
        echo '<div class="weight-600">' . $result['MedicineName'] . '</div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</td>';
    echo '<td><div class="weight-600">' . $row['Quantity'] . '</div></td>';
    echo '<td><div class="weight-600">' . $row['Date'] . '</div></td>';
    echo '<td><div class="weight-600">' . $dealername . '</div></td>';
    echo '<td><div class="weight-600">' . $row['Price'] . '</div></td>';
    echo '<td><input type="number" style="display: none;"  name="id" value="' . $row["MedicineID"] . '"></td>';
    echo '</tr>';
}

if (isset($_POST['signin'])) {
    $id = $_POST['id'];
    $_SESSION['id'] = $id;
    $quantity = $_POST['quantity'];

    $sql = "UPDATE medicine SET `Status` = 1,Quantity = $quantity WHERE MedicineID = $id";
    $query = mysqli_query($conn, $sql);
}
?>
    </tbody>
</table>

			</div>
		</div>

    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
        var checkbox = document.querySelector('input[name="checkbox_name"]');
        if (checkbox.checked) {
            checkbox.value = 1;
        }
        });
    </script>
    
</body>

<?php
include '../includes/config.php';
include '../includes/header.php';
// Check if the form is submitted with a query
if (isset($_POST['query'])) {
    // Get the search query from the form submission
    $query = $_POST['query'];

    // Prepare the SQL statement with a placeholder for the query
    $sql = "SELECT * FROM medicine WHERE MedicineName LIKE ?";

    // Prepare and bind the query parameter
    $stmt = $conn->prepare($sql);
    $param = "%" . $query . "%";
    $stmt->bind_param("s", $param);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Output the results
    while ($row = $result->fetch_assoc()) {
        // echo $row['MedicineName'] . "<br>";
    }



    // Close the statement and connection

}

?>