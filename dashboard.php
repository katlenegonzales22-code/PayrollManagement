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
            background:
            linear-gradient(rgba(10,10,10,0.75), rgba(10,10,10,0.75)),
            url('image/dashboard.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .dashboard-container{
            padding: 30px;
        }

        .welcome-box{
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        .welcome-box h1{
            font-size: 35px;
            font-weight: bold;
        }

        .welcome-box p{
            opacity: 0.8;
            margin-top: 8px;
        }

        .card-grid{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .dashboard-card{
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            padding: 30px;
            color: white;
            transition: 0.3s ease;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        .dashboard-card:hover{
            transform: translateY(-8px);
        }

        .dashboard-card::before{
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -40px;
            right: -40px;
        }

        .card-red{
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
        }

        .card-blue{
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
        }

        .card-green{
            background: linear-gradient(135deg, #11998e, #38ef7d);
        }

        .card-icon{
            font-size: 50px;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .card-title{
            font-size: 18px;
            letter-spacing: 1px;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .card-value{
            font-size: 35px;
            font-weight: bold;
        }

        .footer-text{
            margin-top: 40px;
            text-align: center;
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }

        @media(max-width:768px){
            .dashboard-container{
                padding: 15px;
            }

            .welcome-box h1{
                font-size: 25px;
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

        <!-- Welcome Section -->
        <div class="welcome-box">
            <h1>Payroll Management Dashboard</h1>
            <p>Welcome back Admin! Monitor your employees, salaries, and departments easily.</p>
        </div>

        <!-- Cards -->
        <div class="card-grid">

            <!-- Employee -->
            <div class="dashboard-card card-red">
                <div class="card-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="card-title">
                    Total Employees
                </div>

                <div class="card-value">
                    <?php echo $totalEmployee; ?>
                </div>
            </div>

            <!-- Salary -->
            <div class="dashboard-card card-blue">
                <div class="card-icon">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>

                <div class="card-title">
                    Total Salary Released
                </div>

                <div class="card-value">
                    ₱<?php echo number_format($totalSalary, 2); ?>
                </div>
            </div>

            <!-- Department -->
            <div class="dashboard-card card-green">
                <div class="card-icon">
                    <i class="fa-solid fa-building"></i>
                </div>

                <div class="card-title">
                    Total Departments
                </div>

                <div class="card-value">
                    <?php echo $totalDepartment; ?>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer-text">
            Payroll Management System © 2026
        </div>

    </div>

</div>

<script src="js/openclosemenu.js"></script>

</body>
</html>