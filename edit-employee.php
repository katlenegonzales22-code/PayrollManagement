<?php
session_start();
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the employee data
    $sql = "SELECT * FROM employee WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        $employeeName = $employee['name'];
        $dob = $employee['dob'];
        $mobile = $employee['mobile'];
        $department = $employee['department'];
        $grade = $employee['grade'];
        $doj = $employee['doj'];
    } else {
        header("Location: view-employee.php");
        exit();
    }
}

// Fetch departments for dropdown
$department_sql = "SELECT id, name FROM department";
$department_result = $conn->query($department_sql);

// Fetch grades for dropdown
$grade_sql = "SELECT id, grade FROM grade";
$grade_result = $conn->query($grade_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newName = $_POST['name'];
    $newDob = $_POST['dob'];
    $newMobile = $_POST['mobile'];
    $newDepartment = $_POST['department'];
    $newGrade = $_POST['grade'];
    $newDoj = $_POST['doj'];

    // Update employee details in the database
    $update_sql = "UPDATE employee SET name = ?, dob = ?, mobile = ?, department = ?, grade = ?, doj = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('ssssssi', $newName, $newDob, $newMobile, $newDepartment, $newGrade, $newDoj, $id);

    if ($stmt->execute()) {
        header("Location: view-employee.php"); // Redirect after updating
        exit();
    } else {
        echo "Error updating employee.";
    }
}
?>

<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Edit Employee</title>
<body class="w3-light-grey">
    <?php include('parts/header.php'); ?>
    <?php include('parts/sidebar.php'); ?>

    <div class="w3-main" style="margin-left:300px; margin-top:43px;"><br>
    
        <header class="w3-container" style="padding-top:22px;">
            <h5><b><i class="fa fa-user"></i> Edit Employee</b></h5>
        </header>

        <form method="post" action="">
            <div class="w3-container w3-padding-16">
                <label for="name">Employee Name</label>
                <input class="w3-input w3-border" type="text" id="name" name="name" value="<?php echo htmlspecialchars($employeeName); ?>" required>
            </div>
            <div class="w3-container w3-padding-16">
                <label for="dob">Date of Birth</label>
                <input class="w3-input w3-border" type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" required>
            </div>
            <div class="w3-container w3-padding-16">
                <label for="mobile">Mobile Number</label>
                <input class="w3-input w3-border" type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>" required>
            </div>
            <div class="w3-container w3-padding-16">
                <label for="department">Department</label>
                <select class="w3-input w3-border" id="department" name="department" required>
                    <?php while ($department_row = $department_result->fetch_assoc()): ?>
                        <option value="<?php echo $department_row['id']; ?>" <?php echo ($department == $department_row['id']) ? 'selected' : ''; ?>>
                            <?php echo $department_row['name']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="w3-container w3-padding-16">
                <label for="grade">Grade</label>
                <select class="w3-input w3-border" id="grade" name="grade" required>
                    <?php while ($grade_row = $grade_result->fetch_assoc()): ?>
                        <option value="<?php echo $grade_row['id']; ?>" <?php echo ($grade == $grade_row['id']) ? 'selected' : ''; ?>>
                            <?php echo $grade_row['grade']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="w3-container w3-padding-16">
                <label for="doj">Date of Joining</label>
                <input class="w3-input w3-border" type="date" id="doj" name="doj" value="<?php echo htmlspecialchars($doj); ?>" required>
            </div>
            <div class="w3-container w3-padding-16">
                <button type="submit" class="w3-button w3-blue">Save Changes</button>
            </div>
        </form>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>