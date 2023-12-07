       <?php  include_once 'head.php';
             if(isset($_POST['add-comment'])){
              include_once 'video-process.php';
              // header('Location:video-lectures.php');
          }
          if(isset($_GET['actionId'])){
            $actionId= $_GET['actionId'];
            if($_GET['status']=='delete'){
            //? delete user account
            $sql=$conn->query("DELETE FROM `comments` WHERE actionId='$actionId'");
            // header('Location: view-video.php'); 
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Video Lectures /</span> View Videos </h4>
             
            
                              
              <input type="hidden" name="" value="<?php echo $row['videoId'] ?>" >
              <!-- Examples -->
              <?php include_once 'config.php'; 
               $videoId = $_GET['id'];
							$sql= $conn->query(" SELECT * FROM `video-lectures` WHERE videoId='$videoId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
              <div class="container row mb-5">
              <div class="col-lg-12">
              <div class="card p-3">
              <figure class="card-img-top" >
            <video controls width="1000" height="550" class="figure-img img-fluid rounded card-img-top" poster="video-thumbnail.jpg">
                <!-- The order of source elements matters, as the browser will use the first supported format. -->
            <source src="<?php echo $row['video']; ?>" type="video/mp4">
            </video>
            <figcaption class="figure-caption-semibold ml-3    mt-2" >
              <div class="mb-2" >
              <h3><?php echo $row['name']; ?></h3>
              </div>
                <div style="display: flex; gap: 20px;">
                <p><?php echo $row['date']; ?></p>
                 <p>44 likes</p>
                 </div>
          </figcaption>
        </figure>
                   <hr class="" style="margin-left: 30px; margin-right: 30px"/>
                    <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar ">
   
                      <img src="<?php echo $row['profile']; ?>" alt class="w-px-40 w-100  h-100  rounded-circle" />

                              
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h4 class="fw-bold d-block"><?php echo $row['tutor'];   ?></h4>
                            <!-- <small class="text-muted">Admin</small> -->
                          </div>
                        </div>
                   <div style="display: flex; justify-content: space-between;  margin-top: 7px;">
                   <button class="btn btn-primary  " style="margin-left: 15px; width:fit-content;">View Playlist</button>
                   <button type="button" class="btn btn-outline-secondary">like</button>
                  </div>
                   <p class="mt-4 " style="margin-left: 15px;"><?php echo $row['introMsg'];   ?></p>
                   </div>
             
              
              </div>
             
              <div class="pt-5">
              <h3><?php 
                $commentId = $row['videoId'];
                echo  $conn->query("SELECT * FROM `comments` WHERE commentId='$commentId' ") ->num_rows;?> Comment</h3>
              <span class="text-success"><?php echo isset($status)? $status: ""?></span>
               <hr class="mb-4" />
                
                <div class="card mb-4">
                    <!-- <h5 class="card-header">add comments</h5> -->
                    <div class="card-body">
                      <form  method="post" >
                        <input type="hidden" name="videoId" value="<?php echo $row['videoId'];  ?>">
                        <input type="hidden" name="commentId" value="<?php echo $row['commentId'];  ?>">
                      <div class="mb-4">
                        <h5 for="exampleFormControlTextarea1" class="fw-semibold">add comment</h5>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="7"></textarea>
                        </div>
                        <button class="btn btn-primary" name="add-comment" style=" width:fit-content;">Add Comment</button>
                      </form>
                    </div>
                  </div>
              </div>

              <div class="pt-5">
              <h3>User Comments</h3>
               <hr class="mb-4" />
                
                <div class="card mb-4">
                    <!-- <h5 class="card-header">add comments</h5> -->
                    <div class="card-body">
                    <?php     
         $commentId = $row['videoId'];
							$sql= $conn->query(" SELECT * FROM `comments` WHERE commentId = '$videoId'");
							if($sql->num_rows>0){
							while($row=$sql->fetch_assoc()){  ?>  
              <input type="hidden" name="commentId" value="<?php echo $row['videoId'];  ?>">
                      <div class="pb-5" style="display: flex; flex-direction: column; gap: 4px;">
                    <div class="mb-4" style="display: flex; gap:20px">
                       <div class="avatar " style="height: 50px;width: 50px">
                        <img src="<?php echo $row['profile'] ?>" class="rounded-circle " alt="" srcset="">
                       </div>
                       <div class="" style="display: flex; flex-direction: column; gap: -20px;">
                       <h5><?php echo $row['user'] ?></h5>
                       <span class="text-muted"><?php echo $row['date'] ?></span>
                       </div>
                      </div>
                    <input
                          id="largeInput"
                          class="form-control form-control-lg"
                          disabled
                          type="text"
                          placeholder=""
                          value="<?php echo $row['comment'] ?>"
                        />
                    <div class="mt-2" style="display: flex; gap: 10px;">
                      <button class="btn btn-primary  "   style=" width:fit-content;">Edit Comment</button>
                      <a class="btn btn-danger" href="view-video.php?actionId=<?php echo $row ['actionId']; ?>&status=delete" style=" width:fit-content;">Delete Comment</a>
                    </div>
                  </div>
                  <?php }} ?>
                    </div>
                  </div>
              </div>
              </div>
              <!-- Examples -->
      
              <?php }}  ?>
              </div>
              
              
            
            </div>
           
              
             
              <!--/ Card layout -->
           
            
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
