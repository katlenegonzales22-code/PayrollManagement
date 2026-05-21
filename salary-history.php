<?php
session_start();
include('db.php');
?>

<title>Salary History</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <br>
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-history"></i> Payment History</b></h5>
        </header>

        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="w3-panel w3-green w3-padding">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }

        // Get total salary and latest payment date per employee
        $sql = "
            SELECT 
                e.name AS employee_name, 
                SUM(ep.salary) AS total_salary,
                MAX(ep.payment_date) AS last_payment_date
            FROM employeePayment ep
            INNER JOIN employee e ON ep.empId = e.id
            GROUP BY ep.empId
            ORDER BY e.name ASC
        ";
        $result = $conn->query($sql);
        ?>

        <table class="w3-table w3-margin w3-striped w3-white">
            <tr>
                <th>Employee Name</th>
                <th>Total Salary</th>
                <th>Status</th>
                <th>Last Payment Date</th>
            </tr>
            <?php  
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $formatted_salary = "₱" . number_format($row["total_salary"], 2);
                    $formatted_date = date("F j, Y", strtotime($row["last_payment_date"]));
                    echo "<tr>
                            <td>" . htmlspecialchars($row["employee_name"]) . "</td>
                            <td>" . $formatted_salary . "</td>
                            <td><span class='w3-tag w3-green'>Paid</span></td>
                            <td>" . $formatted_date . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No payment history available.</td></tr>";
            }
            ?>
        </table>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>