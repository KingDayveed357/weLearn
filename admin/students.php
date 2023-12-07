<?php  include_once 'head.php';
   
    if(isset($_GET['studentId'])){
      $studentId= $_GET['studentId'];
      if($_GET['status']=='delete'){
      //? delete user account
      $sql=$conn->query("DELETE FROM `student` WHERE studentId='$studentId'");
      header('Location: student.php'); 
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Students /</span> Manage Students</h4>
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
                        <!-- <th>Course</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 ">
                    <?php 
		$sql= $conn->query(" SELECT * FROM student ORDER BY id DESC ");
		if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()){ 
                ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name'] ?></strong></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <!-- <td><span class="badge bg-label-primary me-1"></span></td> -->
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="control.php?id=<?= $row['studentsId']; ?>&status=active"
                                ><i class="bx bx-edit-alt me-1"></i> UnBan</a
                              >
                              <a href="control.php?id=<?php echo $row ['studentId']; ?>&status=banned" class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Ban</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php }} else {  ?>
              
                        </div>
              <h3 colspan='6' class="text-bold">
              <span style="color:red;"> No student available!!</span>
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
