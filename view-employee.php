<?php
session_start();
include('db.php');
?>

<title>View Employee</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:280px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-user"></i> Employee</b></h5>
        </header>

        <div class="w3-container w3-padding">
            <div class="w3-responsive">
                <table class="w3-table w3-striped w3-hoverable w3-white">
                    <thead style="font-size: 14px;"> <!-- Smaller font just for header -->
                        <tr class="w3-light-grey">
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Mobile</th>
                            <th>Department</th>
                            <th>Grade</th>
                            <th>Salary</th>
                            <th>Date of Joining</th>
                            <th>Designation</th> <!-- Added Designation column -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $sql = "SELECT * FROM employee ORDER BY doj ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $depid = $row["department"]; 
                                $gradeId = $row["grade"]; 
                                $designation = $row["designation"]; // Directly fetching designation from the employee table

                                $dept = "";
                                $grade = "";
                                $salary = 0;

                                // Fetch department name
                                $sql1 = "SELECT name FROM department WHERE id = $depid";
                                $result1 = $conn->query($sql1);
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    $dept = $row1["name"];
                                }

                                // Fetch grade and salary
                                $sql2 = "SELECT grade, salary FROM grade WHERE id = $gradeId";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    $row2 = $result2->fetch_assoc();
                                    $grade = $row2["grade"];
                                    $salary = $row2["salary"];
                                }
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["dob"]); ?></td>
                            <td><?php echo htmlspecialchars($row["mobile"]); ?></td>
                            <td><?php echo htmlspecialchars($dept); ?></td>
                            <td><?php echo htmlspecialchars($grade); ?></td>
                            <td>₱<?php echo number_format($salary, 2); ?></td>
                            <td><?php echo htmlspecialchars($row["doj"]); ?></td>
                            <td><?php echo htmlspecialchars($designation); ?></td> <!-- Display designation -->
                            <td>
                                <div style="display: flex; gap: 4px;">
                                    <button 
                                        class="w3-button w3-blue w3-small"
                                        onclick="window.location.href='edit-employee.php?id=<?php echo $row['id']; ?>'">
                                        Edit
                                    </button>
                                    <button 
                                        class="w3-button w3-red w3-small"
                                        onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                        Remove
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to remove this employee?")) {
                window.location.href = "remove-employee.php?id=" + id;
            }
        }
    </script>
    <script src="js/openclosemenu.js"></script>
</body>