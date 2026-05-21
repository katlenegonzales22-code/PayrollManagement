<?php
session_start();
include('db.php');
if($_GET)
{
    $id= $_GET["id"];
    $sql = "DELETE FROM department WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:view-department.php");
    } else {
        header("Location:view-department.php");
    }
}