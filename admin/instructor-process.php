<?php  require_once './config.php' ;
    if(isset($_POST['register_instructor'])){
        $isError = false;
        $instructorId = rand(90875, 34576);
        $name =mysqli_real_escape_string($conn, $_POST['name']);
        if(empty($_POST['email'])){
            $emailErr = "Email is required!";
            $isError = true;
        }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
           $emailErr = 'Email is Invalid!';
            $isError = true;
        }else{
            $email = cleanInput($_POST['email']);
            $sql = $conn->query ("SELECT email FROM instructor WHERE email='$email' ");
            if($sql->num_rows>0){
             $emailErr = "This email is already taken!!!";
             $isError = true;
            }
        }
        if(empty($_POST['phone'])){
            $phoneErr = "Phone Number is required!";
            $isError = true;
        
        }elseif(strlen($_POST['phone'])<10){
            $phoneErr = "Phone Number is invalid!!";
            $isError = true;
            }
        else{
            $phone=cleaninput($_POST['phone']);
            $sql = $conn->query ("SELECT phone FROM instructor WHERE phone='$phone' ");
            if($sql->num_rows>0){
             $phoneErr = "Phone Number is already taken!!!";
             $isError = true;
            }
        }
        $course =mysqli_real_escape_string($conn, $_POST['course']);
        if (empty($_POST['password'])) {
            $passErr = "Password is required"; 
            $isError = true;
        }elseif(strlen($_POST['password'])<6){
            $passErr="password is too short!!";
            $isError = true;
            }
            else{
                $password = cleanInput($_POST['password']);
            }
            if($isError === false){
            $sql= $conn->query("INSERT INTO instructor SET instructorId='$instructorId', name='$name', email='$email', phone='$phone', password='$password', course='$course' "); 
            }
    
}
?>