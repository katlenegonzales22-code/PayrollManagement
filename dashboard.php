<?php
session_start();
include('db.php');

// Employee Count
$employeeQuery = "SELECT COUNT(*) AS total_employee FROM employee";
$employeeResult = $conn->query($employeeQuery);
$employeeData = $employeeResult->fetch_assoc();
$totalEmployee = $employeeData['total_employee'];

// Total Salary Released
$salaryQuery = "SELECT SUM(salary) AS total_amount FROM employeepayment";
$salaryResult = $conn->query($salaryQuery);
$salaryData = $salaryResult->fetch_assoc();
$totalSalary = $salaryData['total_amount'] ?? 0;

// Department Count
$departmentQuery = "SELECT COUNT(*) AS total_department FROM department";
$departmentResult = $conn->query($departmentQuery);
$departmentData = $departmentResult->fetch_assoc();
$totalDepartment = $departmentData['total_department'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body{
            background: #f4f7fc;
            min-height:100vh;
        }

        .dashboard-container{
            padding:30px;
        }

        .hero-section{
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            border-radius:25px;
            padding:40px;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
            margin-bottom:30px;
        }

        .hero-text h1{
            font-size:38px;
            font-weight:bold;
            margin-bottom:10px;
        }

        .hero-text p{
            opacity:0.9;
            font-size:16px;
        }

        .hero-icon{
            font-size:90px;
            opacity:0.2;
        }

        .card-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(260px,1fr));
            gap:25px;
        }

        .dashboard-card{
            background:white;
            border-radius:22px;
            padding:30px;
            position:relative;
            overflow:hidden;
            transition:0.3s ease;
            box-shadow:0 8px 20px rgba(0,0,0,0.08);
        }

        .dashboard-card:hover{
            transform:translateY(-6px);
        }

        .dashboard-card::before{
            content:'';
            position:absolute;
            width:120px;
            height:120px;
            border-radius:50%;
            top:-35px;
            right:-35px;
            opacity:0.1;
        }

        .card-red::before{
            background:#ff4b5c;
        }

        .card-blue::before{
            background:#4e73df;
        }

        .card-green::before{
            background:#1cc88a;
        }

        .card-icon{
            width:70px;
            height:70px;
            border-radius:18px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:30px;
            color:white;
            margin-bottom:20px;
        }

        .red-icon{
            background:linear-gradient(135deg,#ff416c,#ff4b2b);
        }

        .blue-icon{
            background:linear-gradient(135deg,#36d1dc,#5b86e5);
        }

        .green-icon{
            background:linear-gradient(135deg,#11998e,#38ef7d);
        }

        .card-title{
            color:#777;
            font-size:15px;
            margin-bottom:10px;
            letter-spacing:1px;
        }

        .card-value{
            font-size:34px;
            font-weight:bold;
            color:#222;
        }

        .footer-text{
            margin-top:40px;
            text-align:center;
            color:#777;
            font-size:14px;
        }

        @media(max-width:768px){
            .dashboard-container{
                padding:15px;
            }

            .hero-section{
                padding:30px 20px;
            }

            .hero-text h1{
                font-size:28px;
            }

            .hero-icon{
                display:none;
            }
        }
    </style>
</head>

<body>
    

<?php include('parts/header.php') ?>
<?php include('parts/sidebar.php') ?>

<div class="w3-overlay w3-hide-large w3-animate-opacity"
     onclick="w3_close()"
     style="cursor:pointer"
     title="close side menu"
     id="myOverlay">
</div>

<div class="w3-main" style="margin-left:300px; margin-top:43px;">

    <div class="dashboard-container">

        <!-- Hero Section -->
        <div class="hero-section">

            <div class="hero-text">
                <h1>Payroll Dashboard</h1>
                <p>Manage employees, salary records, and departments in one place.</p>
            </div>

            <div class="hero-icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>

        </div>

        <!-- Dashboard Cards -->
        <div class="card-grid">

            <!-- Employee -->
            <div class="dashboard-card card-red">

                <div class="card-icon red-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="card-title">
                    TOTAL EMPLOYEES
                </div>

                <div class="card-value">
                    <?php echo $totalEmployee; ?>
                </div>

            </div>

            <!-- Salary -->
            <div class="dashboard-card card-blue">

                <div class="card-icon blue-icon">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>

                <div class="card-title">
                    TOTAL SALARY RELEASED
                </div>

                <div class="card-value">
                    ₱<?php echo number_format($totalSalary, 2); ?>
                </div>

            </div>

            <!-- Department -->
            <div class="dashboard-card card-green">

                <div class="card-icon green-icon">
                    <i class="fa-solid fa-building"></i>
                </div>

                <div class="card-title">
                    TOTAL DEPARTMENTS
                </div>

                <div class="card-value">
                    <?php echo $totalDepartment; ?>
                </div>

            </div>

        </div>

        <div class="footer-text">
            Payroll Management System © 2026
        </div>

    </div>

</div>

<script src="js/openclosemenu.js"></script>

</body>
</html>
