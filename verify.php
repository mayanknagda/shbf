<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!empty($_POST))
{
include 'php/config.php';
$username = mysqli_real_escape_string($mysqli, $_POST["username"]);
$password = mysqli_real_escape_string($mysqli, $_POST["pwd"]);
$flag = 'true';
$no=1;
$q1 = $mysqli->prepare('SELECT id,email,pwd,fname,type,active,ustatus from users WHERE email=?');
$q1->bind_param('s',$username);
if(!$q1->execute())
{
  echo 'Execution problem';
}
$q1->bind_result($id,$email,$upwd,$fname,$type,$active,$ustatus);
if($q1->fetch()!=NULL)
{
    if($email == $username && password_verify($password,$upwd) && $ustatus == $no && $active == $no)
    {
      $_SESSION['username'] = $username;
      $_SESSION['type'] = $type;
      $_SESSION['id'] = $id;
      $_SESSION['fname'] = $fname;
      $_SESSION['ustatus'] = $ustatus;
        if($_SESSION["type"]=="superuser") {
        header("location:bookingdata.php");
        }
      if($_SESSION["type"]=="user")
          {
          header("location:index.php");
        }
    }
    else
     {
        if($flag === 'true')
        {
          redirect();
          $flag = 'false';
        }
    }
}
else
{
  redirect();
}
}
else
{
  echo '<p align="center"><img src="images/hack.jpg"></img></p>';
  echo '<footer><p align="center"> /Developed by Department of CSE, SRMIST, KTR/</p></footer>';
}

function redirect()
  {
  echo '<div align="center"><h2>Wrong Credentials or Account Verification still pending by the admin.<br>Kindly activate your account.</h2></div>';
  header("Refresh: 5; url=index.php");
  }
?>
