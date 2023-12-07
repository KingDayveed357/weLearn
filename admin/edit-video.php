<?php  include_once 'head.php'; ?>
<?php 
       if(isset($_POST['update_video'])){
        include_once 'update.php';
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Edit Notes </h4>
             
            
                              
              <!-- Examples -->
              <div class="container row mb-5">
              <?php  $id = $_GET['videoId'];
		$sql= $conn->query(" SELECT * FROM `video-lectures` WHERE videoId='$id' ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit Lecture Note</h5>
                      <small class="text-muted float-end">Video Id #<?php echo $row['videoId'];   ?></small>
                    </div>
                    <div class="card-body">
                      <form action="edit-video.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="videoId" value="<?php echo $row['videoId'] ?>">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Course Title</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              value="<?php echo $row['name'];   ?>"
                              name="name"
                            />
                          </div>
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Brief Course Introduction</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                              class="form-control p-4"
                              value="<?php echo $row['introMsg'];?>"
                              name="introMsg"
                            ></input>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Course Picture</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="file"
                              id="upload"
                              class="form-control"
                              name=""
                              value="<?php echo $row[''];?>"
                            />
                          </div>
                          <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-message">Course Note</label>
                          <div class="input-group input-group-merge">
                          <input
                              type="file"
                              id="upload"
                              class="form-control"
                              name="video"
                              value="<?php echo $row['video'];?>"
                              placeholder="<?php echo $row['video'];?>"
                            />
                          </div>
                          <?php echo $row['video'];?>
                        </div>
                        <button type="button" href="" name="update_video" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
                <?php }} else {  ?>
              </div>
    
  
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
