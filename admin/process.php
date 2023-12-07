<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['register'])){
    $isError = false;
    //Validate Full Name
    if (empty($_POST['name'])) {
        $nameErr = "First Name is Required!";
        $isError = true;
    }
    else{
        $name = cleanInput($_POST['name']);
    }
   
    if(empty($_POST['email'])){
        $emailErr = "Email is required!";
        $isError = true;
    }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
       $emailErr = 'Email is Invalid!';
        $isError = true;
    }
    else{
        $email = cleanInput($_POST['email']);
        $sql = $conn->query ("SELECT email FROM admin WHERE email='$email' ");
        if($sql->num_rows>0){
         $emailErr = "Email is already taken!!!";
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
        $sql = $conn->query ("SELECT phone FROM admin WHERE phone='$phone' ");
        if($sql->num_rows>0){
         $phoneErr = "Phone Number is already taken!!!";
         $isError = true;
        }
    }
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
    if(empty($_POST['cpass'])){
        $cpassErr = " Confirm password is required";
        $isError = true;
    }else{
        $cpass = cleanInput($_POST['cpass']);
        if($password !== $cpass){
            $cpassErr = " Confirm password Doesn't Match";
            $isError = true;
        }
    }
    //check for any error
        if($isError === false){
            //run sql here...
            $adminId = rand(9087, 34576);
            $sql= $conn->query("INSERT INTO admin SET adminId='$adminId', name='$name', email='$email', phone='$phone', password='$password', cpass='$cpass' ");
            if($sql){
                $status = "Registration Successful!!!" ;
            }else{
                $status = "Registration Error!!!" ;
            }
        }
        
     }   else{
        //admin
    if(isset($_POST['login'])){
        $email = cleanInput($_POST['email']);
         $password = (cleanInput($_POST['password']));
      
        $sql = $conn->query("SELECT * FROM `admin` WHERE password='$password' AND email='$email' ");
       
            if($sql->num_rows>0){
                //we have this record in our db
                $row = $sql->fetch_assoc();
                    $_SESSION['login']=true;
                    $_SESSION['adminId']= $row['adminId'];
                    $_SESSION['email']= $row['email'];
                    $_SESSION['password']= $row['password'];
                   ?>
                    <script>alert('Welcome');
    window.location.replace('admin/home.php')</script>
    <?php
                // header( "Location: home.php"); 
            }
         
            else{
                ?>
                <script>alert('Email or Password is Incorrect!')</script>
                <?php
            }  
        }  elseif (isset($_POST['instructor_login'])) {
            $email = cleanInput($_POST['email']);
            $password = (cleanInput($_POST['password']));
         
           $sql = $conn->query("SELECT * FROM `instructor` WHERE password='$password' AND email='$email' ");
          
               if($sql->num_rows>0){
                   //we have this record in our db
                   $row = $sql->fetch_assoc();
                       $_SESSION['instructor_login']=true;
                       $_SESSION['instructorId']= $row['instructorId'];
                       $_SESSION['email']= $row['email'];
                       $_SESSION['password']= $row['password'];
                      ?>
                       <script>alert('Welcome');
       window.location.replace('./instructor/home.php')</script>
       <?php
                   // header( "Location: home.php"); 
               }
            
               else{
                   ?>
                   <script>alert('Email or Password is Incorrect!')</script>
                   <?php
               }  
        } 
     }
    }
    ?>
   