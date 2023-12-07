<?php   require_once './config.php';
  if(isset($_POST['update_student'])){
    $studentsId= mysqli_real_escape_string($conn, $_POST['studentsId']);
    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $phone =mysqli_real_escape_string($conn, $_POST['phone']);
    $lastName =mysqli_real_escape_string($conn, $_POST['lastName']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);

   $sql= $conn->query("UPDATE student SET name='$name', email='$email', lastName='$lastName', phone='$phone' WHERE studentsId='$studentsId' "); 
   if ($sql){
    $status = '<div class="alert alert-success alert-dismissible" role="alert">
     Details Updated Successfuly
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>' ; 
 }else{
     $status = '<div class="alert alert-danger alert-dismissible" role="alert">
     Sorry something went wrong
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>' ; 
 }
}
 else{
    if(isset($_POST['update_pic'])){ 
        $studentsId= mysqli_real_escape_string($conn, $_POST['studentsId']);
        $target_dir = "web/";
        $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
        $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["update_pic"])) {
    $check = getimagesize($_FILES["user_img"]["tmp_name"]);
    if(empty($check)) {
        $status = '<div class="alert alert-danger alert-dismissible" role="alert">
        File cannot be empty
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>' ; 
    }
    if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = true;
    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>File is not an image...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $uploadOk = false;
    }
    }
    
    // Check file size
    if ($_FILES["user_img"]["size"] > 50000000) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file is too large...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $uploadOk = false;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $uploadOk = false;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == false) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file was not uploaded.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["user_img"]["tmp_name"], $target_file)) {
        $status = '<div class="alert alert-danger alert-dismissible" role="alert">
        The file ". htmlspecialchars( basename( $_FILES["user_img"]["name"])). " has been uploaded.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>' ; 

    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, there was an error uploading your file</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }

    if($uploadOk === true){

    $sql= $conn->query("UPDATE student SET user_img='$target_file' WHERE studentsId='$studentsId' "); 
    if ($sql){
       $status = '<div class="alert alert-success alert-dismissible" role="alert">
        Profile Picture Updated Successfuly
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>' ; 
    }else{
        $status = '<div class="alert alert-danger alert-dismissible" role="alert">
        Sorry something went wrong
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>' ; 
    }
    // header("Location:profile.php") ;
    }  
    }
}
 }
?>