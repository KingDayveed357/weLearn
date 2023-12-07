  <!-- Navbar -->
  <?php $instructorId=$_SESSION['instructorId'];
							$sql= $conn->query(" SELECT * FROM instructor WHERE instructorId='$instructorId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
  <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               

           <!-- User -->
           <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    <?php if (empty($_POST['update'])) {
     ?>  
    
   
     <img src="<?php echo $row['user_img']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />
    

    <?php
 }else {
     ?> 
    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-5 rounded-circle" />
     <?php
 }
 ?>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                            <?php if (empty($_POST['update'])) {
     ?>  
    
   
    <img src="<?php echo $row['user_img']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />
    

    <?php
 }else {
     ?> 
    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
     <?php
 }
 ?>
                              
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['name'];   ?> </span>
                            <small class="text-muted">Instructor</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li >
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span  class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="change-password.php">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> -->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" >
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle"></span>
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalToggle"
                        >
                          Launch modal
                        </button>

                        <!-- Modal 1-->
                        <div
                          class="modal fade"
                          id="modalToggle"
                          aria-labelledby="modalToggleLabel"
                          tabindex="-1"
                          style="display: none"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">Show a second modal and hide this one with the button below.</div>
                              <div class="modal-footer">
                                <button
                                  class="btn btn-primary"
                                  data-bs-target="#modalToggle2"
                                  data-bs-toggle="modal"
                                  data-bs-dismiss="modal"
                                >
                                  Open second modal
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal 2-->
                        <div
                          class="modal fade"
                          id="modalToggle2"
                          aria-hidden="true"
                          aria-labelledby="modalToggleLabel2"
                          tabindex="-1"
                        >
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel2">Modal 2</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">Hide this modal and show the first with the button below.</div>
                              <div class="modal-footer">
                                <button
                                  class="btn btn-primary"
                                  data-bs-target="#modalToggle"
                                  data-bs-toggle="modal"
                                  data-bs-dismiss="modal"
                                >
                                  Back to first
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                  
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
          <?php }} ?>
          <!-- / Navbar -->