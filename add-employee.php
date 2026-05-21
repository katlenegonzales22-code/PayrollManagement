<?php
session_start();
include('db.php');

if($_POST)
{
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $doj = $_POST["doj"];
    $designation = $_POST["designation"];
    $grade = $_POST["grade"];
    $department = $_POST["department"];

           

    $sql = "INSERT INTO employee (name, dob, mobile, doj, designation, grade, department) 
            VALUES ('$name','$dob','$mobile','$doj','$designation','$grade','$department')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location:view-employee.php");
    } else {
        echo "<script>alert('Oops! Something went wrong.');</script>";
    }
}
?>

<title>Add Employee</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-user"></i> Add Employee</b></h5>
        </header>

        <div class="w3-margin w3-white w3-card w3-padding">
            <form action="" method="post">
                <p></p>
                <input type="text" required class="w3-input" placeholder="Name" name="name">
                <p></p>
                <label>Date Of Birth</label>
                <input type="date" required class="w3-input" name="dob">
                <p></p>
                <input type="number" required class="w3-input" placeholder="Mobile Number" name="mobile">
                <p></p>
                <label>Date Of Joining</label>
                <input type="date" required class="w3-input" name="doj">
                <p></p>
                <input type="text" required class="w3-input" placeholder="Designation" name="designation">
                <p></p>
                <select required class="w3-input" name="department">
                    <option disabled selected>Select Department</option>
                    <?php  
                        $sql = "SELECT * FROM department";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                    <?php } } ?>
                </select> 
                <p></p>
                <select required class="w3-input" name="grade">
                    <option disabled selected>Select Grade</option>
                    <?php  
                        $sql = "SELECT * FROM grade";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["grade"]; ?> (<?php echo $row["salary"]; ?>)</option>
                    <?php } } ?>
                </select> 
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Add Employee</button>
            </form>
        </div>
    </div>
    <script src="js/openclosemenu.js"></script>
</body>