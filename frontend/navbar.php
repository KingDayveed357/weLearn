<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>weLearn</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="index.php#about" class="nav-item nav-link ">About</a>
                <a href="index.php#courses" class="nav-item nav-link">Courses</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="#team" class="dropdown-item">Our Team</a>
                        <a href="#testimonial" class="dropdown-item">Testimonial</a>
                    </div>
                </div> -->
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <?php 
 include_once '../admin/config.php';

if(isset($_SESSION['login'])){
    $status = "Dashboard" ;
    $link = "../admin/home.php";
  } else if (isset($_SESSION['instructor_login'])){
    $status = "Dashboard" ;
    $link = "../instructor/home.php";
  } 
 else if(isset($_SESSION['student_login'])){
    $status = "Dashboard" ;
    $link = "../student/home.php";
  }  else{
    $status = "Join Now" ;
    $link = "../login.php";
  }
 
?>
            <a href="<?php echo isset($link)? $link: ""?>" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"> <span  ><?php echo isset($status)? $status: ""?></span><i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->