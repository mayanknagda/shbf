<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require 'vendor/autoload.php';
if(!empty($_POST))
{
include 'php/config.php';
// Sanetizing the user input
$type="user";
$fname = mysqli_real_escape_string($mysqli,$_POST["fname"]);
$lname = mysqli_real_escape_string($mysqli,$_POST["lname"]);
$address = mysqli_real_escape_string($mysqli,$_POST["address"]);
$institute = mysqli_real_escape_string($mysqli,$_POST["institute"]);
$iid = mysqli_real_escape_string($mysqli,$_POST["iid"]);
$email = mysqli_real_escape_string($mysqli,$_POST["email"]);
$club = mysqli_real_escape_string($mysqli,$_POST["club"]);
$phno = mysqli_real_escape_string($mysqli,$_POST["phno"]);
$pwd = mysqli_real_escape_string($mysqli,$_POST["pwd"]);
$hpwd=password_hash($pwd,PASSWORD_BCRYPT);
$hash = $hash = md5(rand(0,1000));

// check if the user is already registerd.
$ar=$mysqli->query("SELECT id from users WHERE email='$email'");
if($ar->num_rows)
{
   echo 'User already exists';
   header("Refresh: 5; url=login.php");
}
else
{

// Using prepared statements for insertion.
$iq=$mysqli->prepare("INSERT INTO users (fname, lname, institute, iid, address, club, email, pwd, phno, type, hash) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
$iq->bind_param('sssssssssss', $fname, $lname, $institute, $iid, $address, $email, $club, $hpwd, $phno, $type, $hash);
if($iq->execute())
{
	echo '<br/>';
}
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = false;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'projecttestbot@gmail.com';                 // SMTP username
    $mail->Password = 'SAN24ka1996lpprojectbot';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('noreply@SCIF.ac.in', 'SHBF Admin');
     $mail->addAddress($email, $fname);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verification link - SHBF Admin';
    $mail->Body    = '

Thanks for signing up!<br>
Your SHBF account has been created successfully and is pending Admin approval.<br><br> Please
<a href="http://shbf.epizy.com/verify-email.php?email='.$email.'&hash='.$hash.'">Click Here</a> to verify your email address.<br>
We will notify you once the admin approves the registration request. This may take upto 48hrs.<br><br><br>
Regards<br>SCIF Team'; // Our message above including the link
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'A Verification link has been sent to your email address. Please verify it.';
} catch (Exception $e) {
    echo 'Verification email could not be sent. Mailer Error: ', $mail->ErrorInfo;
    echo '<br>';
    echo 'Please contact the Website Administrator';
}
header("Refresh: 5; url=login.php");
}
}
//securty
else
{
    echo '<p align="center"><img src="images/hack.jpg"></img></p>';
}
?>
