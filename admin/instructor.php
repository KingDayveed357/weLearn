<?php  include_once 'head.php';
       if(isset($_POST['register_instructor'])){
        include_once 'instructor-process.php';
    } 
    if(isset($_GET['instructorId'])){
      $instructorId= $_GET['instructorId'];
      if($_GET['status']=='delete'){
      //? delete user account
      $sql=$conn->query("DELETE FROM `instructor` WHERE instructorId='$instructorId'");
      header('Location: instructor.php'); 
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
          <div class="col-md-9">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Instructors /</span> Manage Instructors</h4>
              </div>
              <div class="col-md-3">
              <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                        Create Instructor
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Create Instructor</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                      <form id="formAuthentication" class="mb-3" action="instructor.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                          <span class="text-danger"><?php echo isset($nameErr)? $nameErr: ""?></span>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              placeholder="John Doe"
                              required
                              name="name"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Course</label>
                          <span class="text-danger"><?php echo isset($courseErr)? $courseErr: ""?></span>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"
                              ><i class="bx bx-buildings"></i
                            ></span>
                            <input
                              type="text"
                              id="basic-icon-default-company"
                              class="form-control"
                              placeholder="ACME Inc."
                              name="course"
                              required
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <span class="text-danger"><?php echo isset($emailErr)? $emailErr: ""?></span>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                              type="email"
                              id="basic-icon-default-email"
                              class="form-control"
                              placeholder="john.doe"
                              required
                              name="email"
                            />
                            <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                          </div>
                          <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                          <span class="text-danger"><?php echo isset($phoneErr)? $phoneErr: ""?></span>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-phone"></i
                            ></span>
                            <input
                              type="text"
                              id="basic-icon-default-phone"
                              class="form-control phone-mask"
                              placeholder="658 799 8941"
                              
                             name="phone"
                             required
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-password">Password</label>
                          <span class="text-danger"><?php echo isset($passErr)? $passErr: ""?></span>
                          <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      required
                      class="form-control"
                      name="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                        </div>
                        <button type="submit" name="register_instructor" class="btn btn-primary">Send</button>
                       
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                
                             
                      </form>
                   
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
           
              <!-- Examples -->
              <div class="container row mb-5">
              <div class="card">
   
                <div class="table-responsive p-5 text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 ">
                    <?php 
		$sql= $conn->query(" SELECT * FROM instructor ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name'] ?></strong></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $row['course'] ?></span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a href="instructor.php?instructorId=<?php echo $row ['instructorId']; ?>&status=delete" class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php }} else {  ?>
              
                        </div>
              <h3 colspan='6' class="text-bold">
              <span style="color:red;"> No Instructor available!!</span>
              </h3>
              <?php } ?>
                    </tbody>
                  </table>
                </div>
                </div>
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


    <?php  include_once 'scripts.php'; ?>
  </body>
</html>
