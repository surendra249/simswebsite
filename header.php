<?php
session_start();
if(!isset($_SESSION['IS_LOGIN'])){
	header('location:pages/logout.php');
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Funnel</title>
	 
	  
	  <!-- necessary for bootstrap-->
	  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
	  
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
   <body id="page-top">
      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		<a class="navbar-brand mr-1"><i class="fas fa-filter">Sales Funnel</i></a>
         <div class="d-none d-md-inline-block ml-auto"></div>
         <!-- Navbar -->
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class='active' style='float:right;color:white;font-weight:bold;margin:8px;'>
					
						<?php if($_SESSION['submit']){echo $_SESSION['submit'];}?>
			   </li>
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user-circle fa-fw"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="pages/logout.php">Logout</a>
					</div>
			   	</li>
			</ul>
      </nav>
	  
      <div id="wrapper">
         <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<?php if($_SESSION['ROLE']==1){?>
			
			
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="pages/summary.php" >
				<div class="sidebar-brand-text mx-1">Summary</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item ">
				<a class="nav-link" href="index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
			Interface
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<i class="fas fa-fw fa-cog"></i>
					<span>Components</span>
				</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Custom Components:</h6>
					<a class="collapse-item" href="pages/Users.php">User-list</a>
					<a class="collapse-item" href="pages/loginuserlog.php">login-history</a>
					<a class="collapse-item" href="pages/register.php">Registration</a>
					<a class="collapse-item" href="pages/regist.php">Registration with email</a>
				</div>
			</div>
		</li>

      
			<?php }if($_SESSION['ROLE']==2) ?>
			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">Addons</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-filter"></i>
          <span>Funnel</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
             <a class="collapse-item" href="Allcase.php">Allcase</a>
            <a class="collapse-item" href="strangers.php">Stranger</a>
            <a class="collapse-item" href="prospect.php">Prospect</a>
            <a class="collapse-item" href="lead.php">Lead</a>
			
            
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="Closedcase.php">Lost</a>
           <a class="collapse-item" href="Customer.php">Customer</a>
          </div>
        </div>
      </li>


      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

   </ul>
    <!-- End of Sidebar -->
            
         <div id="content-wrapper">