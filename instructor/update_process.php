<?php   require_once '../config.php';
if(isset($_POST['update'])){
    $adminId= mysqli_real_escape_string($conn, $_POST['adminId']);
    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $phone =mysqli_real_escape_string($conn, $_POST['phone']);
    $course =mysqli_real_escape_string($conn, $_POST['course']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $target_file =mysqli_real_escape_string($conn, $_POST['user_img']);
    $target_dir = "web/";
    $target_file = $target_dir . basename($_FILES["user_img"]["name"]);
    $uploadOk = true;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["update"])) {
$check = getimagesize($_FILES["user_img"]["tmp_name"]);
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
 echo "The file ". htmlspecialchars( basename( $_FILES["user_img"]["name"])). " has been uploaded.";
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
    
$sql= $conn->query("UPDATE admin SET name='$name', email='$email', course='$course', phone='$phone', user_img='$target_file' WHERE adminId='$adminId' "); 
header("Location:profile.php") ;
}  
}

}
// else{
//     header("Location:update.php") ;
// }
?>