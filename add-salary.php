<?php
session_start();
include('db.php');

if ($_GET) {
    $empId = $_GET["id"];
} else {
    header("Location:salary.php");
}

if ($_POST) {
    $empID = $empId;
    $month = trim($_POST["month"]);
    $amount = $_POST["amount"];

    if (empty($month)) {
        echo "<script>alert('Please select a date before paying!');</script>";
    } else {
        // Check if payment for the selected month has already been made
        $sqlCheck = "SELECT * FROM employeePayment WHERE empId = $empID AND payment_date = '$month'";
        $resultCheck = $conn->query($sqlCheck);

        if ($resultCheck->num_rows > 0) {
            echo "<script>alert('Salary for this month has already been paid!');</script>";
        } else {
            $sql = "INSERT INTO employeePayment (empId, payment_date, salary) VALUES ($empID, '$month', $amount)";
            if ($conn->query($sql) === TRUE) {
                header("Location:salary.php");
            } else {
                echo "<script>alert('Oops! Something went wrong!');</script>";
            }
        }
    }
}
?>

<title>Salary</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dollar"></i> Release Employee's Month Salary</b></h5>
        </header>

        <div class="box w3-white w3-card w3-padding">
            <form action="" method="post">
                <p></p>
                <label for="month">Select Month</label>
                <input required type="date" class="w3-input" name="month" id="month" style="width:100%;">

                <?php
                    $total = 0;
                    $doj = '';
                    $sql = "SELECT * FROM employee WHERE id = $empId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $grade = $row["grade"];
                            $doj = $row["doj"];
                            $sql1 = "SELECT * FROM grade WHERE id = $grade";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    $total += $row1["salary"];
                                }
                            }
                        }
                    }
                ?>

                <p><strong>Date of Joining:</strong> <?php echo $doj; ?></p>
                <p><strong>Your Monthly Salary is: ₱<?php echo number_format($total, 2); ?></strong></p>
                <label for="amount">Enter Half Salary Amount</label>
                <input type="number" class="w3-input" name="amount" value="<?php echo $total; ?>" min="0" required>
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Pay</button>
            </form>
        </div>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>