<?php
session_start();
// Connecting to main database 
include 'connect.php';

// ***************************** Login Query
if (isset($_POST['login'])) {

       $email=$_POST['email'];
       $password=$_POST['password'];

        $sql="SELECT * FROM admin WHERE email = :email AND password = :password";        
        $stmt=$pdo->prepare($sql);
        $users = array(':email' =>$email ,':password'=>$password );
        $stmt->execute($users);
        $num=$stmt->rowCount();
     

        if ($num>=1) { 
          $user=$stmt->fetchAll();
          $_SESSION['admin_login']=$user[0]['user_id'];;
          
          echo "<script>alert('Logged in');</script>";
          echo "<script>window.location.replace('index.php')</script>";
        }
        else{
          echo "<script>alert('login details not appear correct!')</script>";
          echo "<script>window.location.replace('login.php')</script>";
        }

}

//***************************** SignUp Query
if (isset($_POST['signup'])) {

    $name_f=$_POST['name_f'];
    $name_l=$_POST['name_l'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $get_existing_user="SELECT * FROM user WHERE email = '$email' ";
    $user_exist=mysqli_query($con,$get_existing_user);
    $num_user=mysqli_num_rows($user_exist);
  
    if ($num_user>=1) {  
      echo "<script>alert('Email is Already Registered !');</script>";
      echo "<script> location.replace('login.php')</script>";
    }
    else{
        $token = md5($email).rand(10,9999);
        $sql="INSERT INTO user (name_f,name_l, email, password,email_verification_link) VALUES (:name_f,:name_l,:email,:password,:token)";
        $stmt=$pdo->prepare($sql);
        $user = array(':name_f'=>$name_f,':name_l'=>$name_l,':email' =>$email ,':password'=>$password,':token'=>$token );
        $stmt->execute($user);
        $num=$stmt->rowCount();
          if($stmt){
                $EMAIL_BODY='  <p>Please Verify your Email  <a  href="http://localhost/fiverr/woorke/clients/verify_email.php?token='.$token.' " >Click Here </a></p> ';
                      
                    include 'mail/mail.php';
                    $res=sendMail($email,"Account Verification",$EMAIL_BODY);
                    if($res=="sent"){
                      echo "<script>alert('Account created ! Check Mail');</script>";
                      echo "<script>window.location.replace('login.php')</script>";
                    }
                    else{
                      echo "<script>alert('Something Wrong with Mail');</script>";
                      echo "<script>window.location.replace('login.php')</script>";
                    }

                
              }
          else{
                echo "<script>alert('unable to register!')</script>";
            }                 
      }
     
 }
