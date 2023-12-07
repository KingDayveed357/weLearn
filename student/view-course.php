<?php  include_once 'head.php';
      
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Edit Notes </h4>
             
            
                              
              <!-- Examples -->
              <?php  $courseId = $_GET['courseId'];
							$sql= $conn->query(" SELECT * FROM `course-note` WHERE courseId='$courseId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
              <div class="container row mb-5">
                 <div class="container row mb-5">
              <?php 
                ?>
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-5">
                        <img class="card-img card-img-left" src="../admin/<?php echo $row['coursePic']; ?>" alt="Card image" />
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                        <div class="flex-grow-1">
                          <h2 class="fw-semibold d-block card-title"><?php echo $row['tutor']; ?></h2>
                          <h2 class="fw-semibold d-block card-title"><?php echo $row['title']; ?></h2>
                          <h5 class="fw-semibold d-block card-title"><?php echo $row['introMsg']; ?></h5>
                          </div>
                          <p class="card-text ">
                            <div class="row">
                            <div class="col-md-5">
                            <a class="btn btn-primary btn-lg"  download="../admin/<?php echo $row['pdfFile']; ?>"  href="<?php echo $row['pdfFile']; ?>" > <span class="tf-icons bx bx-download"></span>&nbsp;Download Note</a>
                            </div>
                            <div class="col-md-5">
                            <a class="btn btn-outline-primary btn-lg"    href="../admin/<?php echo $row['pdfFile']; ?>" > View Note</a>
                            </div>
                            </div>
                          </p>
                          

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              
              </div>
              <?php }} ?>
              
              </div>
    
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
