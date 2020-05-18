<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <style>
    .loader {
      border: 5px solid #f3f3f3;
      border-radius: 50%;
      border-top: 5px solid #3498db;
      width: 50px;
      height: 50px;
      margin: auto;
      -webkit-animation: spin .5s linear infinite; /* Safari */
      animation: spin .5s linear infinite;
    }
    
    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('admin')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-plane-departure"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Galaxy Legend</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{asset('admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('/')}}">
          <i class="fas fa-male"></i>
          <span>Player</span></a>
      </li>
     
       <!-- custom daobka -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
          <i class="fab fa-affiliatetheme"></i>
          <span>Campain</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <h6 class="collapse-header">Giải đấu:</h6>
            @can('permission')
            <a class="collapse-item" href="{{asset('creat')}}">Tạo giải đấu</a>
            @endcan
            <a class="collapse-item" href="{{asset('cp')}}">Giải đấu</a>
            <a class="collapse-item" href="{{asset('playercamp')}}">Playercamp</a>
            <a class="collapse-item" href="{{asset('playercampreward')}}">Playercampreward</a>
            <a class="collapse-item" href="{{asset('logplayercamp')}}">Logplayercamp</a>
            <a class="collapse-item" href="{{asset('rcw  ')}}">RankingCampReward</a>
          </div>
        </div>
      </li>
      <!-- endcustom daobka -->

      <!-- Nav Item - Tables -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-gift"></i>
          <span>Reward</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Phần thưởng:</h6>
            
            <a class="collapse-item" href="{{asset('reward')}}">Phần thưởng</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-gift"></i>
          <span>Giftcode</span>
        </a>
        <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="gc">Giftcode</a>
          </div>
        </div>
       
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-gift"></i>
          <span>Allgiftcode</span>
        </a>
        <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="allgiftcode">Tạo mã Gifcode :</a>
            <a class="collapse-item" href="allgc">Allgiftcode</a>
          </div>
        </div>
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mailbox">
          <i class="far fa-envelope-open"></i>
          <span>Mailbox</span></a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages12" aria-expanded="true" aria-controls="collapsePages">
          <i class="fab fa-first-order"></i>
          <span>Order</span>
        </a>
        <div id="collapsePages12" class="collapse" aria-labelledby="headingPages" data-parent="">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="iap">Iap</a>
            <a class="collapse-item" href="trackingiap">Trackingiap</a>
            <a class="collapse-item" href="trackingistall">Trackkinginstall</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="report">
          <i class="fas fa-chart-bar"></i>
          <span>Reports</span></a>
      </li>
     

      
  
    
      @can('permission')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-user-cog"></i>
          <span>Permission</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Permission:</h6>
            <a class="collapse-item" href="{{asset('creatpermission')}}">Creatpermission</a>
            <a class="collapse-item" href="{{asset('permission')}}">Permission</a>
          </div>
        </div>
      </li>
      @endcan

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
  

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

     
  
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
       
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin chào:</span>
          
          <i class="fas fa-user"></i>
        </a>
     
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{asset('logout')}}">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
    @yield('noidung')