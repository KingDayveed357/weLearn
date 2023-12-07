<?php  include_once 'head.php';
       if(isset($_POST['register_question'])){
        include_once 'course_process.php';
    } 

    if(isset($_GET['questionsId'])){
      $questionsId= $_GET['questionsId'];
      if($_GET['status']=='delete'){
      //? delete user account
      $sql=$conn->query("DELETE FROM `past-questions` WHERE questionsId='$questionsId'");
      header('Location: past-questions.php'); 
      } }  
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
          <div class="col-md-8">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Courses /</span> Past Questions</h4>
              <span class="text-danger"><?php echo isset($status)? $status: ""?></span>
              </div>
              <div class="col-md-4 text-left">
                        <div class="text-center">
                      <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                        Create Past Questions
                        </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Create Past Questions</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <form id="formAuthentication" class="mb-3" action="past-questions.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Course Title</label>
                                    <input
                                      type="text"
                                      required
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Enter Topic"
                                      name="title"
                                    />
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col mb-3">
                                    <label class="form-label" for="basic-icon-default-message">Course Summary</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"
                              ><i class="bx bx-comment"></i
                            ></span>
                            <textarea
                            required
                              id="basic-icon-default-message"
                              class="form-control"
                              name="introMsg"
                              placeholder="A brief overview of the course"
                              aria-describedby="basic-icon-default-message2" 
                            ></textarea>
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                  <label for="nameWithTitle" class="form-label">Course picture</label>
                                    <input
                                      type="file"
                                      name="coursePic"
                                      id="nameWithTitle"
                                      class="form-control"
                                    />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">Upload Pdf</label>
                                    <input
                                  
                                      type="file"
                                      id="nameWithTitle"
                                      name="pdfFile"
                                      class="form-control"
                                    />
                                  </div>
                                </div>
                                <button type="submit" name="register_question" class="btn btn-primary">Create Lecture Note</button>
                              </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
           
              <!-- Examples -->
              <div class="container row mb-5">
              <?php 
		$sql= $conn->query(" SELECT * FROM `past-questions`  ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                    <div class="avatar avatar-online">
              <img src="<?php echo $row['profile']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />                  
              </div>  
                          </div>
                          <div class="col-sm-6">
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['tutor']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                          
                          </div>
                         
                          </div>
                      <img
                        class="img-fluid d-flex mx-auto my-4  " 
                        src="<?php echo $row['coursePic']; ?>"
                        alt="Course picture"
                       style="height:200px"
                      />
                      <p class="card-text"><?php echo $row['title']; ?></p>
                  <div class="row">
                    <div class="col-md-10">
                      <a type="a" href="view-questions.php?questionsId=<?= $row['questionsId']; ?>&status=view" class="btn btn-outline-primary">View Course</a>
                      </div>
                      <div class="col-md-2 text-center">
                      <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a href="edit-questions.php?id=<?= $row['questionsId']; ?>&status=edit" class="dropdown-item" href="javascript:void(0);"
                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <a href="past-questions.php?questionsId=<?php echo $row ['questionsId']; ?>&status=delete" class="dropdown-item" href="javascript:void(0);"
                              ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                          </div>
                        </div>
                      </div>
                        </div>
                    </div>
                  </div>
                </div>
              
                <?php }} else {  ?>
              </div>
    
    <h3 colspan='6' class="text-bold">
    <span style="color:red;">Past-Question Unavailable!!</span>
    </h3>
    <?php }   ?>
     
   
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
