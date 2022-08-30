<?php 
//https://www.codepile.net/pile/ap07x5A1
session_start();
require "php/connection.php";
$email = "";
$fname = "";
$mname = "";
$lname = "";
$suffix = "";
$address = "";
$errors = array(); 

    //if user signup button
    if(isset($_POST['signup'])){
          //for captcha
        if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
            // echo "<script>alert('Incorrect verification code');</script>" ;
            $errors[]= 'Incorrect Captcha code!';
        }

        $fname = mysqli_real_escape_string($con, $_POST['first_name']);
        $mname = mysqli_real_escape_string($con, $_POST['middle_name']);
        $lname = mysqli_real_escape_string($con, $_POST['last_name']);
        $suffix = mysqli_real_escape_string($con, $_POST['suffix']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
        }
        

        if(count($errors) === 0){
         
            $code = rand(999999, 111111);
            $status = "notverified";
            $insert_data = "INSERT INTO usertable (first_name, middle_name, last_name, suffix, address, email, password, code, status)
                            values('$fname', '$mname', '$lname', '$suffix', '$address', '$email', '$password', '$code', '$status')";
            $data_check = mysqli_query($con, $insert_data);
            if($data_check){

                require 'phpmailer/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                $mail->Username='melody.santiago.b@bulsu.edu.ph';
                $mail->Password='melchong131619';

                $mail->setFrom('melody.santiago.b@bulsu.edu.ph', 'PETCO');
                $mail->addAddress($email);
                $mail->addReplyTo('melody.santiago.b@bulsu.edu.ph');

                $mail->isHTML(true);
                $mail->Subject='Email Verification Code';
                $mail->Body='<h1 align=center>Your Code is: '.$code.'</h1>';
                if($mail->send()){
                    $info = "We've sent a verification code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: user-otp.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }

                if(!$mail->send()){
                    echo "Message could not sent!";
                }
                else{
                    echo"Message has been Sent";
                }
            }else{
                $errors['db-error'] = "Failed while inserting data into database!";
            }
        }

    }
    //--------------------------------------------------------------------------
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                // $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                 echo '<script> alert("You are now verified! You may now Login!");
                        window.location.href="login-user.php";
                        </script>';
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //----------------------------------------------------------------------------
    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        $check_email = "SELECT * FROM usertable WHERE email = '$email' and password='$password'";
        
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['user_id']= $fetch['id'];
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                  header('location: home.php');
              }else{
                  $info = "It's look like you haven't still verify your email - $email";
                  $_SESSION['info'] = $info;
                  header('location: user-otp.php');
              }
           
        }else{
            $errors['email'] = "Invalid email or password";
        }
        
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            
            if($run_query){
                
                require 'phpmailer/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                $mail->Username='melody.santiago.b@bulsu.edu.ph';
                $mail->Password='melchong131619';

                $mail->setFrom('melody.santiago.b@bulsu.edu.ph', 'PETCO');
                $mail->addAddress($email);
                $mail->addReplyTo('melody.santiago.b@bulsu.edu.ph');
                
                $mail->isHTML(true);
                $mail->Subject='Email Verification Code to Reset Password';
                $mail->Body='<h1 align=center>Your Code is: '.$code.'</h1>';
                if($mail->send()){
                    $info = "We've sent a reset password code to your email: $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }

                if(!$mail->send()){
                    echo "Message could not sent!";
                }
                else{
                    echo"Message has been Sent";
                }

            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = $password;
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if click login now button after change pass
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>