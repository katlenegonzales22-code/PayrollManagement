<?php
session_start();
include('db.php');
?>

<title>Salary</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- PAGE CONTENT -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <br>
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-money"></i> Salary</b></h5>
        </header>

        <table class="w3-table w3-margin w3-striped w3-white">
            <tr>
                <td>Name</td>
                <td>Assign</td> <!-- Added Grade Column -->
                <td>Salary</td>
                <td>Date of Joining</td> <!-- Added Date of Joining Column -->
                <td>Action</td>
                <td>View</td>
            </tr>
            <?php  
                $sql = "SELECT * FROM employee";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $grade = $row["grade"];
                        $sql1 = "SELECT * FROM grade WHERE id = $grade";
                        $result1 = $conn->query($sql1);
                        $total = 0;
                        $grade_name = ""; // Variable to hold grade name
                        if ($result1->num_rows > 0) {
                            while ($row1 = $result1->fetch_assoc()) {
                                $total = $row1["salary"];
                                $grade_name = $row1["grade"]; // Fetch the grade name
                            }
                        }
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row["name"]); ?></td>
                <td><?php echo htmlspecialchars($grade_name); ?></td> <!-- Display Grade Name -->
                <td>₱<?php echo number_format($total, 2); ?></td>
                <td><?php echo htmlspecialchars($row["doj"]); ?></td> <!-- Display Date of Joining (from 'doj' field) -->
                <td>
                    <form action="add-salary.php" method="get">
                        <button type="submit" class="w3-button w3-green" name="id" value="<?php echo $row["id"]; ?>">Release Salary</button>
                    </form>
                </td>
                <td>
                    <form action="viewSalary.php" method="get">
                        <button type="submit" class="w3-button w3-blue" name="id" value="<?php echo $row["id"]; ?>">View Salary History</button>
                    </form>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>