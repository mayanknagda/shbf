<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require 'vendor/autoload.php';
?>

<?php
include ('php/session.php');
include ('php/login_check.php');
include ('php/config.php');
include ('php/head.php');
include ('php/data.php');
//if(!isset($_SESSION["username"])) {header("location:index.php");}
//$email=$_SESSION['username'];
//$fname=$_SESSION['fname'];
?>
<?php
// function maill($body){
// $email=$_SESSION['username'];
// $fname=$_SESSION['fname'];
// $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
// try {
//     //Server settings
//     $mail->SMTPDebug = false;                                 // Enable verbose debug output
//     $mail->isSMTP();                                      // Set mailer to use SMTP
//     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                               // Enable SMTP authentication
//     $mail->Username = 'projecttestbot@gmail.com';                 // SMTP username
//     $mail->Password = 'SAN24ka1996lpprojectbot';                           // SMTP password
//     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 587;                                    // TCP port to connect to
//     //Recipients
//     $mail->setFrom('noreply@SCIF.ac.in', 'SCIF Admin');
//      $mail->addAddress($email, $fname);     // Add a recipient
//     //Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Booking Status';
//     $mail->Body    = $body;
//  // Our message above including the link
//     //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//     $mail->send();
// } catch (Exception $e) {
// }
//}
?>
<!--DO NOT EDIT THE CODE BELOW IF YOU DON'T KNOW WHAT YOU ARE DOING!-->
<!--DO NOT EDIT THE CODE BELOW IF YOU DON'T KNOW WHAT YOU ARE DOING!-->
<!--DO NOT EDIT THE CODE BELOW IF YOU DON'T KNOW WHAT YOU ARE DOING!-->


<?php
    // GLOBAL FLAGS
if(!empty($_POST)) // Used to stop a user from jumping to this page without properly filling the last one
{
    // POST Variabes from the previous page.
    $go_for_book=0;
    $wdate = $_POST['date'];
    $date = date('Y-m-d', strtotime($wdate));
    $reason= $_POST['reason'];
    $hall_id=$_POST['hallid'];
       echo $date;
       echo $reason;
       echo $hall_id;
    // Check if the hall is booked
    $c=$mysqli->query("SELECT * from orders WHERE date_of_order='$date' AND hall_id='$hall_id' ");
    if($c->num_rows)
    {
        echo '<h1 align="center" style="color:red">The Hall is already Booked, Please select another date.</h1>';
        header("Refresh: 5; url=avail.php");
    }
    else{
        $go_for_book=1;
    }

    if($go_for_book==1)
    {
    // Get the details of the user from the database.
    $un=$_SESSION["username"]; // $un has the user's email address
    $q1=$mysqli->query("SELECT id, fname, lname, club, phno FROM users WHERE email='$un'");
    $q1_result=$q1->fetch_object();
    $id=$q1_result->id; // store id from query.
    $first_name=$q1_result->fname; //store first name from query.
    $last_name=$q1_result->lname; // store ladt name from query.
    $club=$q1_result->club; //User club details
    $phno=$q1_result->phno; //User phone number
    // END of fetch of user details
    // Fetch the details of the hall
    $q2=$mysqli->query("SELECT * from halls WHERE sno='$hall_id' ");
    $q2_result=$q2->fetch_object();

        echo ' <div class="myown" style="margin-top:10px;" width: 400px> ';
        echo  ' <div class="myown" width: 400px> ';
        echo ' <p><h3>Booking Details</h3></p> ';
        echo'<input type="button" value="Print this page" onClick="window.print()">';

        // Order id manual creation.
        $oi;// Order_id
        $q3=$mysqli->query("SELECT * FROM orders");
        if(!$q3->fetch_object())
        {
            $oi=1001;
        }
        else
        {
            $q4=$mysqli->query("SELECT MAX(order_id) AS prev_order_id FROM orders");
            $result_q4=$q4->fetch_object();
            $oi=$result_q4->prev_order_id+1;
        }

        $in_id=(int)$id;

        $push=$mysqli->query("INSERT INTO orders (user_id, date_of_order, hall_id, reason, order_id) VALUES ($in_id,'$date','$hall_id','$reason',$oi)");
        if($push)
        {
            echo 'YES';
            $go_for_print=1;
        }
        else{
            echo 'NO';
            $go_for_print=0;
        }

    if($go_for_print==1)
    {

        // Drawing the order confirmation table.
        echo "<br>";
        echo "<br>";
        echo '<div class="scrollit">';
        echo '<table cellpadding="2" cellspacing="2" width: 400px>';
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Club</th>";
        echo "<th>Phone Number</th>";
        echo "<tr>";
        echo '<td colspan="1" align="left">';
        echo $first_name.' '.$last_name;
        echo '<td colspan="1" align="left">';
        echo $un;
        echo '<td colspan="1" align="left">';
        echo $club;
        echo '<td colspan="1" align="left">';
        echo $phno;
        echo '</tr>';
        echo '</table>';
        echo '<br><br><br><br>';
        // END OF THE TOP TABLE



        // START OF THE BOTTOM TABLE
        // QUERIES NEEDED TO CONSTRUCT THE BOTTOM TABLE

        $sq=$mysqli->query("SELECT * FROM orders WHERE order_id=$oi");
        $sq_result=$sq->fetch_object();
        // END OF QUERY

        echo '<table>';
        echo '<tr>';
        echo '<th>OrderId</th>';
        echo '<th>Hall Name</th>';
        echo '<th>Location</th>';
        echo '<th>Capacity</th>';
        echo '<th>Incharge</th>';
        echo '</tr>';

        echo '<tr>';
        echo '<td colspan="1" align="left">'.$sq_result->order_id.'</td>';

        echo '<td colspan="1" align="left">'.$q2_result->name.'</td>';

        echo '<td colspan="1" align="left">'.$q2_result->located.'</td>';

        echo '<td colspan="1" align="left">'.$q2_result->capacity.'</td>';

        echo '<td colspan="1" align="left">'.$q2_result->incharge.'</td>';
        echo '</tr>';

        echo '</table>';
        echo"</div>";

    // END OF THE BOTTOM TABLE
    //maill('Thanks for booking!<br>Please wait while we confirm your booking. You will get notified soon once your booking is confirmed');
    echo '</div></div></div><footer><p align="center">This is a machine generated recipt. You will recive a confirmation email from the Admin in 48hrs. For any clarifications please contact the Admin at: admin.hrtem@ktr.srmuniv.ac.in</p></footer>';
    }
}


    // Custom messges given by the admin for their booking.


}// Security Feature this does not allows users to simply jump to the page, even if they are loged in
else
{
    echo '<p align="center"><img src="images/hack.jpg"></img></p>';
    echo '<footer><p align="center"> /Developed by Department of CSE, SRMIST, KTR/</p> </footer>';
}


if($_POST['ename']){
//File upload php
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$fname=basename($_FILES["fileToUpload"]["name"]);
$ename=$_POST['ename'];
$edetails=$_POST['edetails'];
$elink=$_POST['elink'];
$econtact=$_POST['econtact'];

$push1=$mysqli->query("INSERT INTO events (event_id, name, description, img, reg, contact) VALUES ($oi, '$ename','$edetails','$fname','$elink','$econtact')");

}
?>

<?php

?>
  </body>
  </html>
