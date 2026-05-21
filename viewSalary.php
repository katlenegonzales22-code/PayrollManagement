<?php
session_start();
include('db.php');

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$payment_date = isset($_GET["payment_date"]) ? $_GET["payment_date"] : "";

$filter = "";
if (!empty($payment_date)) {
    $safePaymentDate = $conn->real_escape_string($payment_date); // 'YYYY-MM-DD'
    $filter = "AND payment_date = '$safePaymentDate'";
}

// Get employee details
$name = $mobile = $dept = "";
$sql = "SELECT * FROM employee WHERE id = $id";
$result = $conn->query($sql);
if ($row = $result->fetch_assoc()) {
    $name = $row["name"];
    $mobile = $row["mobile"];
    $depid = $row["department"];
    $deptRes = $conn->query("SELECT name FROM department WHERE id = $depid");
    if ($deptRow = $deptRes->fetch_assoc()) $dept = $deptRow["name"];
}
?>

<title>View Salary</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <header class="w3-container" style="padding-top:22px"><br>
            <h5><b><i class="fa fa-money"></i> Salary History for <?= htmlspecialchars($name) ?></b></h5>
            <p>Mobile: <?= htmlspecialchars($mobile) ?></p>
            <p>Department: <?= htmlspecialchars($dept) ?></p>
        </header>

        <div class="w3-padding">
            <button class="w3-btn w3-blue" onclick="window.print();">Print</button> 
            <form method="get" style="margin-top:10px;">
                <input type="hidden" name="id" value="<?= $id ?>"/>
                <label for="payment_date">Payment Date:</label>
                <input type="date" name="payment_date" id="payment_date" value="<?= htmlspecialchars($payment_date) ?>" class="w3-input" style="max-width: 250px; display: inline-block;" />
                <button type="submit" class="w3-btn w3-blue" style="margin-left: 10px;">Filter</button>
            </form>
        </div>

        <div class="w3-container">
            <table class="w3-table w3-striped w3-white w3-margin-top">
                <tr>
                    <th>Salary</th>
                    <th>Payment Date</th>
                    <th>Day Release</th>
                    <th>Status</th>
                </tr>
                <?php
                $sqlPayments = "SELECT * FROM employeepayment WHERE empid = $id $filter ORDER BY id DESC";
                $resultPayments = $conn->query($sqlPayments);
                if ($resultPayments && $resultPayments->num_rows > 0) {
                    while ($row = $resultPayments->fetch_assoc()) {
                        $date = strtotime($row['payment_date']);
                        echo "<tr>
                            <td>₱" . number_format($row['salary'], 2) . "</td>
                            <td>" . date("F j, Y", $date) . "</td>
                            <td>" . date("l", $date) . "</td>
                            <td><span style='color: green; font-weight: bold;'>Done</span></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No salary records found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>