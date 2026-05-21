<?php
session_start();
include('db.php');
?>

<title>View Department</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-building"></i> Department</b></h5>
        </header>

        <table class="w3-table w3-margin w3-striped w3-white">
            <tr>
                <th>Department Name</th>
                <th>Action</th>
            </tr>
            <?php  
            $sql = "SELECT * FROM department ORDER BY id ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row["name"]); ?></td>
                <td>
                    <button class="w3-button w3-red w3-small" onclick="confirmRemove(<?php echo $row['id']; ?>)">Remove</button>
                    <a href="edit-department.php?id=<?php echo $row['id']; ?>" class="w3-button w3-blue w3-small">Edit</a>
                </td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr><td colspan="3">No departments found.</td></tr>
            <?php } ?>
        </table>
    </div>

    <script>
        function confirmRemove(id) {
            if (confirm("Are you sure you want to remove this department?")) {
                window.location.href = "remove-department.php?id=" + id;
            }
        }
        </script>
    <script src="js/openclosemenu.js"></script>
</body>