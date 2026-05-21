<?php
session_start();
include('db.php');
?>

<title>View Grade</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body class="w3-light-grey">
    <?php include('parts/header.php') ?>
    <?php include('parts/sidebar.php') ?>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:300px;margin-top:43px;"><br>

        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-layer-group"></i> Grade Management</b></h5>
        </header>

        <table class="w3-table w3-margin w3-striped w3-white">
            <tr>
                <th>Grade Name</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            <?php  
                $sql = "SELECT * FROM grade ORDER BY id ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row["grade"]); ?></td>
                <td>₱<?php echo number_format($row["salary"], 2); ?></td>
                <td>
                    <form action="remove-grade.php" method="POST" style="display:inline;" onsubmit="return confirmRemove()">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="w3-button w3-red w3-small">Remove</button>
                    </form>
                    <a href="edit-grade.php?id=<?php echo $row['id']; ?>" class="w3-button w3-blue w3-small">Edit</a>
                </td>
            </tr>
            <?php
                    }
                } else {
            ?>
            <tr><td colspan="3">No grades found.</td></tr>
            <?php } ?>
        </table>
    </div>

    <script>
    function confirmRemove() {
        return confirm("Are you sure you want to remove this grade?");
    }
    </script>
    <script src="js/openclosemenu.js"></script>
</body>