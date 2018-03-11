<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$flag=-1;
if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['user-email']))
{
  $booya=mysqli_real_escape_string($mysqli,$_POST['user-email']);

  $result= $mysqli->query("SELECT * FROM users WHERE email='$booya' AND type='user'");
  $q=$result->fetch_object();
  if($q){
  $pass = $q->pwd;
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
      $mail->setFrom('noreply@SCIF.ac.in', 'SCIF Admin');
      $mail->addAddress($booya, $q->fname);     // Add a recipient
      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Password Reset';
      $mail->Body    = '

  Hello '.$q->fname.'!<br>
  It seems like you have forgotton your password, do not worry.<br>
  Click this link to reset password: <a href="http://shbf.epizy.com/password_reset.php?email='.$booya.'&hash='.$pass.'">Click Here</a><br>
  Ignore if you have not requested for a password change<br>';
      $mail->send();
      $flag=1;
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
//  header("location:login.php");
  }
  else
  {
    $flag=0;
  }
}
echo '<div class="row">
<div class= "small-8 columns">
<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_forgot();">
<h1>Forgot Password?</h1>

	<div class="field-group">
		<div><label for="email">Email</label></div>
    <form action "forgot.php" method=POST>
		<div><input type="text" name="user-email" id="user-email" class="input-field"></div>
	</div>
	<div class="field-group">
    <button type=submit style="float:right;">Submit</button>
    </form>
    </div>
</div>
</div>
</form>';

if($flag==1)
{
  echo '<div class="row"><div class= "small-8 columns"><p align="center" style="color:green;">Password has been sent to the given mail id. Please Log back in</p></div></div>';
}
else if($flag==0)
{
  echo '<div class="row"><div class= "small-8 columns"><p align="center" style="color:red;">Please enter a valid email ID or Register yourself!</p></div></div>';
}
echo '</body>
</html>';
?>
