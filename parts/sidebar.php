<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Payroll System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>

<nav class="w3-sidebar w3-collapse w3-animate-left" style="z-index:3;width:280px; padding-top: 20px; height: 100vh;" id="mySidebar">
  <div class="sidebar-logo">
    <img src="image/logopay.png" alt="Logo">
    <span>Payroll System</span>
  </div>

  <!-- Dashboard -->
  <a href="dashboard.php" class="w3-bar-item w3-button <?php if($currentPage == 'dashboard.php') echo 'active-sub'; ?>">
    <i class="fa fa-dashboard fa-fw"></i> Dashboard
  </a>

  <hr>
  <!-- Department -->
  <div onclick="toggleMenu('departmentMenu')" class="menu-header <?php if(in_array($currentPage, ['add-department.php', 'view-department.php'])) echo 'active'; ?>">
    <span><i class="fa-solid fa-building fa-fw"></i> Department</span>
    <div>
      <span class="dot"></span>
      <i class="fa fa-angle-down"></i>
    </div>
  </div>
  <div id="departmentMenu" class="submenu w3-bar-block w3-hide <?php if(in_array($currentPage, ['add-department.php', 'view-department.php'])) echo 'w3-show'; ?>">
    <a href="add-department.php" class="w3-bar-item w3-button <?php if($currentPage == 'add-department.php') echo 'active-sub'; ?>">Add Department</a>
    <a href="view-department.php" class="w3-bar-item w3-button <?php if($currentPage == 'view-department.php') echo 'active-sub'; ?>">View Department</a>
  </div>

  <!-- Grade -->
  <div onclick="toggleMenu('gradeMenu')" class="menu-header <?php if(in_array($currentPage, ['add-grade.php', 'view-grade.php'])) echo 'active'; ?>">
    <span><i class="fa-solid fa-layer-group fa-fw"></i> Grade</span>
    <div>
      <span class="dot"></span>
      <i class="fa fa-angle-down"></i>
    </div>
  </div>
  <div id="gradeMenu" class="submenu w3-bar-block w3-hide <?php if(in_array($currentPage, ['add-grade.php', 'view-grade.php'])) echo 'w3-show'; ?>">
    <a href="add-grade.php" class="w3-bar-item w3-button <?php if($currentPage == 'add-grade.php') echo 'active-sub'; ?>">Add Grade</a>
    <a href="view-grade.php" class="w3-bar-item w3-button <?php if($currentPage == 'view-grade.php') echo 'active-sub'; ?>">View Grade</a>
  </div>

  <!-- Employee -->
  <div onclick="toggleMenu('employeeMenu')" class="menu-header <?php if(in_array($currentPage, ['add-employee.php', 'view-employee.php'])) echo 'active'; ?>">
    <span><i class="fa-solid fa-user fa-fw"></i> Employee</span>
    <div>
      <span class="dot"></span>
      <i class="fa fa-angle-down"></i>
    </div>
  </div>
  <div id="employeeMenu" class="submenu w3-bar-block w3-hide <?php if(in_array($currentPage, ['add-employee.php', 'view-employee.php'])) echo 'w3-show'; ?>">
    <a href="add-employee.php" class="w3-bar-item w3-button <?php if($currentPage == 'add-employee.php') echo 'active-sub'; ?>">Add Employee</a>
    <a href="view-employee.php" class="w3-bar-item w3-button <?php if($currentPage == 'view-employee.php') echo 'active-sub'; ?>">View Employee</a>
  </div>

  <hr>
  <!-- Salary -->
  <a href="salary.php" class="w3-bar-item w3-button <?php if($currentPage == 'salary.php') echo 'active-sub'; ?>"><i class="fa-solid fa-money-bill-wave fa-fw"></i> Salary</a>
  <a href="salary-history.php" class="w3-bar-item w3-button <?php if($currentPage == 'salary-history.php') echo 'active-sub'; ?>"><i class="fa-solid fa-clock-rotate-left fa-fw"></i> Salary History</a>

  <hr>

  <!-- Logout -->
  <a href="index.php" class="w3-bar-item w3-button logout"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Log Out</a>
</nav>

<!-- Toggle JS -->
<script>
  function toggleMenu(id) {
    const submenu = document.getElementById(id);
    const header = submenu.previousElementSibling;
    const isOpen = submenu.classList.contains('w3-show');

    // Close all
    document.querySelectorAll('.submenu').forEach(el => el.classList.remove('w3-show'));
    document.querySelectorAll('.menu-header').forEach(el => el.classList.remove('active'));

    // Toggle clicked
    if (!isOpen) {
      submenu.classList.add('w3-show');
      header.classList.add('active');
    }
  }
</script>
</body>
</html>