  <?php  include_once 'head.php';
        if(isset($_POST['update'])){
          include_once 'update_process.php';
      } 
      if(isset($_POST['update_pic'])){
        include_once 'update_process.php';
    } 
  
      ?>


  <body>
  <?php  include_once 'sidebar.php';?>
        <!-- Layout container -->
        <div class="layout-page">
        <?php  include_once 'navbar.php';?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="notification.php "
                        ><i class="bx bx-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="change-password.php"
                        ><i class="bx bx-link-alt me-1"></i> Change Password</a
                      >
                    </li>
                  </ul>
                  <span class="text-success"><?php echo isset($status)? $status: ""?></span>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <input type="hidden" name="adminId" value="<?php echo $row['adminId'] ?>" >
                    <?php  $adminId=$_SESSION['adminId'];
							$sql= $conn->query(" SELECT * FROM admin WHERE adminId='$adminId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <?php if (empty($_POST['update_pic'])) {
     ?>  
    
     <input type="hidden" name="adminId" value="<?php echo $row['adminId'] ?>" >
     <img  src="<?php echo $row['user_img']; ?>" style=" border-radius:50px; width:20%; height:250px;" 
     alt="user-avatar"
     class="w-px-10   rounded-circle"
        
        id="uploadedAvatar"
                        />

    <?php
 } else {
     ?> 
     <img
        src="../assets/img/avatars/1.png"
        alt="user-avatar"
        class="w-px-40 w-100  h-100  rounded-circle"
        id="uploadedAvatar"
                        />
     <?php
 }
 ?>
                     <form action="update_process.php" method="post" enctype="multipart/form-data">
                        <div class="button-wrapper">
                        <input type="hidden" name="adminId" value="<?php echo $row['adminId'] ?>" >
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              name="user_img"
                              accept="image/png, image/jpeg"
                            />

                          </label>
                          <button type="submit" name="update_pic" class=" btn btn-outline-secondary account-image-reset mb-4">
                           
                            Submit
                          </button>
                            
                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                    
                      <input type="hidden" name="adminId" value="<?php echo $row['adminId'] ?>" >
                      <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName"  class="form-label">First Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              required
                              name="name"
                              value="<?php echo $row['name'];   ?>"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input  class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $row['lastName'] ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              required
                              name="email"
                              value="<?php echo $row['email'];   ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <input
                              type="text"
                              class="form-control"
                              id="organization"
                              value="admin"
                              
                              disabled
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">NG(+234)</span>
                              <input
                                type="text"
                                id="phoneNumber"
                                name="phone"
                                class="form-control"
                                required
                                value="<?php echo $row['phone'];?>"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                          <label for="address" class="form-label">Address (optional)</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                          </div>
                      
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="update" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                         
                        </div>
                      </form>
                    </div>
                    
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <?php  if(isset($_GET['adminId']) ){
                        $adminId= $_GET['adminId'];
                       
                        if($_GET['status']=='delete'){
                        //? delete user account
                        $sql=$conn->query("DELETE FROM `admin` WHERE adminId='$adminId' ");
                        ?> <script>
                         window.location.replace('register.php')</script>
                         <?php
                        } }
                      
                     
                     
                     ?>
                      <form id="formAccountDeactivation"  action="profile.php"  >
                       
                        <input type="hidden" value="<?php echo $row["adminId"] ?>">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountDeactivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                       
                        <a href="profile.php?adminId=<?php echo $row['adminId'];?>&status=delete" class="btn btn-danger deactivate-account">Deactivate Account</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }} ?>
            <!-- / Content -->

            <!-- Footer -->
            <?php  include_once 'footer.php'; ?>

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
