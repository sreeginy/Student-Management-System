<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students Management System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
<body class="hold-transition sidebar-mini layout-footer-fixed">
     <!-- Site wrapper -->
     <div class="wrapper">
<!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-dark navbar-dark" >
   
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="http://127.0.0.1:8000/" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="http://127.0.0.1:8000/students/" class="nav-link">Student</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="http://127.0.0.1:8000/grades/" class="nav-link">Grade</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="http://127.0.0.1:8000/subjects/" class="nav-link">Subject</a>
            </li>
          </ul>
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto ">
          <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
          <!-- <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                @csrf
                {{ Auth::user()->name }}  <button type="submit" class="btn btn-outline-info " value="logout">Logout</button>
                </form>
          </li> -->
          <!-- <div class="pull-right"> -->
        
            </li>
            
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown ">
              <a class="nav-link" data-toggle="dropdown" href="#">
               
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <!-- <i class="fas fa-expand-arrows-alt"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <!-- <i class="fas fa-th-large"></i> -->
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>
          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library --> <br>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    STUDENTS
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="http://127.0.0.1:8000/students/create" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>student create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="http://127.0.0.1:8000/students" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>student view</p>
                    </a>
                  </li>
                  
                </ul>
              </li><br><br>
              
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                GRADES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/grades/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/grades" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade view</p>
                </a>
              </li>
            </ul>
          </li><br><br>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
              <p>
                SUBJECTS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/subjects/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>subject create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://127.0.0.1:8000/subjects" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>subject view</p>
                </a>
              </li>
             
            </ul>
            

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
   




   
 
