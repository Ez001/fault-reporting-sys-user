<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $website_title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= $server_name ?>/assets/img/avatar.png" rel="icon">
  <link href="<?= $server_name ?>/assets/img/avatar.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= $server_name ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $server_name ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $server_name ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= $server_name ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= $server_name ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= $server_name ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= $server_name ?>/assets/fonts/flaticon/font/flaticon.css">

  <!-- datatables -->
  <link href="<?= $server_name ?>/assets/vendor/new_datatables/datatables.min.css" rel="stylesheet">
  <link href="<?= $server_name ?>/assets/vendor/select2/css/select2.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="<?= $server_name ?>/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
    if ( !in_array( $page, $header_blacklist_arr ) )
    {
      
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="<?= $server_name ?>/assets/img/avatar.png" alt="">
        <!-- <span class="d-none d-lg-block">Admin</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= $server_name ?>/assets/img/avatar.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="borrowers">
          <i class="bi bi-bank"></i>
          <span>Borrowers</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="loans">
          <i class="bi bi-cash-coin"></i>
          <span>Loans</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="repayments">
          <i class="bi bi-cash-stack"></i>
          <span>Repayments</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
          <i class="bi bi-tools"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" >
          <li>
            <a href="admins">
              <i class="ri ri-admin-line fs-6"></i><span>Admins</span>
            </a>
          </li>
          <li>
            <a href="batch">
              <i class="bi bi-clipboard-plus fs-6"></i><span>Batch</span>
            </a>
          </li>
          <li>
            <a href="eligibility-criteria">
              <i class="bi bi-clipboard-check fs-6"></i><span>Eligibility Criteria</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside><!-- End Sidebar-->


  <?php 
    }
  ?>