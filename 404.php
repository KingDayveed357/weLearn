
<?php  
  $error = $_SERVER["REDIRECT_STATUS"];
  $error_title = "" ;
  $error_message = "";

  if ($error == 404) {
    $error_title = "Page Not Found :(";
    $error_message = "Oops! 😖 The requested URL was not found on this server.";
  }

 
?> 
 <?php include_once 'head.php';?> 

  <body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper">
     
        <h2 class="mb-2 mx-2"><?php echo $error_title; ?></h2>
        <p class="mb-4 mx-2"><?php echo $error_message; ?></p>
        <a href="./frontend/index.php" class="btn btn-primary">Back to home</a>
        <div class="mt-3">
          <img
            src="./assets/img/illustrations/page-misc-error-light.png"
            alt="page-misc-error-light"
            width="500"
            class="img-fluid"
            data-app-dark-img="illustrations/page-misc-error-dark.png"
            data-app-light-img="illustrations/page-misc-error-light.png"
          />
        </div>
      </div>
    </div>
    <!-- /Error -->

    <!-- / Content -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
