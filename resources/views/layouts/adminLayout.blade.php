<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo-small.png">
  <link rel="icon" type="image/png" href="../assets/img/logo-small.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>

    @yield('title')

  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">


    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--Tip1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
      <div class="logo">
        <a href="/dashboard" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
        <a href="/dashboard" class="simple-text logo-normal">
          CRM pro
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>


      <div class="sidebar-wrapper">
        <ul class="nav">
          <!-- if (es la url correspondiente) -> (asignamos clase 'active') else -> (no asignamos nada) -->
          <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
            <a href="/dashboard">
              <i class="nc-icon nc-sound-wave"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ 'campaigns' == request()->path() ? 'active' : '' }}">
            <a href="/campaigns">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Campañas</p>
            </a>
          </li>
          <li class="{{ 'product-list' == request()->path() ? 'active' : '' }}">
            <a href="/product-list">
              <i class="nc-icon nc-bag-16"></i>
              <p>Productos</p>
            </a>
          </li>
          <!-- if (es la url correspondiente) -> (asignamos clase 'active') else -> (no asignamos nada) -->
          <li class="{{ 'role-register' == request()->path() ? 'active' : '' }}">
            <a href="/role-register">
              <i class="nc-icon nc-single-02"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>Ajustes</p>
            </a>
          </li>
          <!--           <li class="active-pro">
            <a href="./upgrade.html">
              <i class="nc-icon nc-spaceship"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>


    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <li class="navbar-brand" style="{{ 'dashboard' != request()->path() ? 'display: none;' : '' }}">
              <p>Dashboard</p>
            </li>
            <li class="navbar-brand" style="{{ 'campaigns' != request()->path() ? 'display: none;' : '' }}">
              <p>Campañas</p>
            </li>
            <li class="navbar-brand" style="{{ 'product-list' != request()->path() ? 'display: none;' : '' }}">
              <p>Productos</p>
            </li>
            <li class="navbar-brand" style="{{ 'role-register' != request()->path() ? 'display: none;' : '' }}">
              <p>Usuarios</p>
            </li>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->



      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>
  
</div> -->





      <!--  <div class="panel-header panel-header-sm">
       </div> -->



      <div class="content">

        @if (session('status'))
        <div class="container">
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        </div>
        @endif

        @if (session('errorstatus'))
        <div class="container">
          <div class="alert alert-danger" role="alert">
            {{ session('errorstatus') }}
          </div>
        </div>
        @endif


        @yield('content')


      </div>


      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Rangers of Information
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  @yield('scripts')

</body>

</html>