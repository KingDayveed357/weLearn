<?php  include_once 'head.php';
       if(isset($_POST['register_course'])){
        include_once 'course_process.php';
    } 
   
?>

  <body>
    <!-- Layout wrapper -->
    <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php  include_once 'navbar.php';?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
          <div class="col-md-10">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Available Courses</h4>
              <span class="text-danger"><?php echo isset($status)? $status: ""?></span>
              </div>
  
                      
                    </div>
           
              <!-- Examples -->
              <div class="container row mb-5">
              <?php 
		$sql= $conn->query(" SELECT * FROM `course-note` ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-2">
                    <div class="avatar avatar-online">
              <img src="<?php echo $row['profile']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />                  
              </div>  
                          </div>
                          <div class="col-sm-3">
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['tutor']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                          
                          </div>
                          <div class="col-sm-4">
                          <p>12/11/2023</p>
                          </div>
                          </div>
                      <img
                        class="img-fluid d-flex mx-auto my-4"
                        src="../admin/<?php echo $row['coursePic']; ?>"
                        alt="Course picture"
                        style="height:200px"
                      />
                      <p class="card-text"><?php echo $row['title']; ?></p>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <a type="a" href="./view-course.php?courseId=<?= $row['courseId']; ?>&status=view" class="btn btn-outline-primary">View Course</a>
                      </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php }} else {  ?>
              </div>
    
    <h3 colspan='6' class="text-bold">
    <span style="color:red;"> No course available!!</span>
    </h3>
    <?php } ?>
              <!-- Examples -->
             
              
              </div>
             
              <!--/ Card layout -->
            </div>
            
            <!-- / Content -->

            <!-- Footer -->
            <?php  include_once 'footer.php'; ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
