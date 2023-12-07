<?php  

     if (isset($_POST['update_course'])){
       $courseId =mysqli_real_escape_string($conn, $_POST['courseId']);
       $title =mysqli_real_escape_string($conn, $_POST['title']);
       $introMsg =mysqli_real_escape_string($conn, $_POST['introMsg']);
      
       $pdf_dir = "course_note/";
       $pdfFile = $pdf_dir . basename($_FILES["pdfFile"]["name"]);
       $pdfUpload = true;
     $imageFileType = strtolower(pathinfo($pdfFile,PATHINFO_EXTENSION));
     

  if (empty($_POST['pdfFile'])) {
    $pdfUpload = false;
}

   // Check if image file is a actual image or fake image
   if(isset($_POST["update_course"]) AND !empty($_POST["pdfFile"])) {
    $check = getimagesize($_FILES["pdfFile"]["tmp_name"]);
    if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $pdfUpload = true;
      } else {
      $_SESSION['mgs'] = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>File is not an image...</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      $pdfUpload = false;
      }
   }
   

   if ($_FILES["pdfFile"]["size"] > 50000000) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file is too large...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $pdfUpload = false;
    }

   // Allow certain file formats
   if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
   && $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "xls" ) {
   $_SESSION['mgs'] = '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
   </div>';
   // $cvErr = 'Cv is Invalid!';
   }

   if ($pdfUpload == false) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file was not uploaded.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdfFile)) {
     echo "";
    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, there was an error uploading your file</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    $pdfUpload = true;
  }

  
       $target_dir = "course-pics/";
       $target_file = $target_dir . basename($_FILES["coursePic"]["name"]);
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $picUpload = true ;
   
   // Check if image file is a actual image or fake image
   if(isset($_POST["update_course"]) AND !empty($_POST["coursePic"])) {
    $check = getimagesize($_FILES["coursePic"]["tmp_name"]);
    if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $picUpload = true;
      } else {
      $_SESSION['mgs'] = '
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>File is not an image...</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      $picUpload = false;
      }
   }

   // Check file size
   if ($_FILES["coursePic"]["size"] > 50000000) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file is too large...</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $picUpload = false;
    }



   // Allow certain file formats
   if($imageFileType !="application/msword" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "pdf" && $imageFileType != "wmv" && $imageFileType != "zip" && $imageFileType != "gif"  
   && $imageFileType != "doc" && $imageFileType != "txt" && $imageFileType != "xls" ) {
   $_SESSION['mgs'] = '
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Sorry, only JPG, JPEG, PNG & GIF files are allowed..</strong> 
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
   </button>
   </div>';
   // $cvErr = 'Cv is Invalid!';
   }

   if ($picUpload == false) {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, your file was not uploaded.</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["coursePic"]["tmp_name"], $target_file)) {
     echo "";
    } else {
    $_SESSION['mgs'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry, there was an error uploading your file</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    $picUpload = true;
}

if (empty($_POST['coursePic'])) {
  $picUpload = false;
}
   
// if ($picUpload == false || $picUpload == false) {
//   $sql= $conn->query("UPDATE `course-note` SET title='$title', introMsg='$introMsg' WHERE courseId='$courseId' ");
    
// }

// else{
  $sql= $conn->query("UPDATE `course-note` SET title='$title', introMsg='$introMsg', coursePic='$target_file', pdfFile='$pdfFile' WHERE courseId='$courseId' ");
 
// }

}

  

?>