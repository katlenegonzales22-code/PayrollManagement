<?php
session_start();
include('db.php');
if($_GET)
{
    $id= $_GET["id"];
    $sql = "DELETE FROM employee WHERE id = '$id'";
    $sql1 = "DELETE FROM employeePayment WHERE empId = '$id'";
     if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
        header("Location:view-employee.php");
    } else {
        header("Location:view-employee.php e");
    }
}
?>