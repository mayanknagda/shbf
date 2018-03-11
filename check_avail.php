<?php
include ('php/session.php');
//include ('php/login_check.php');
include ('php/config.php');
//if(!isset($_SESSION["username"])) { header("location:login.php");}

$wdate = $_POST['date'];
$date = date('Y-m-d', strtotime($wdate));

echo '<table>';
echo '<tr>';
echo '<th>S.no</th>';
echo '<th>Hall Name</th>';
echo '<th>Location</th>';
echo '<th>Capacity</th>';
echo '<th>Facilites</th>';
echo '</tr>';
$result = $mysqli->query("SELECT * from halls where sno not in (SELECT hall_id from orders where date_of_order='$date')");

 if($result === FALSE){
 echo 'no';
 }
 else 
 {
 echo 'yes';
}

if($result){
while($obj = $result->fetch_object())
{
 echo'<tr>
<td>'.$obj->sno.'</td>
 <td>'.$obj->name.'</td>
 <td>'.$obj->located.'</td>
<td>'.$obj->capacity.'</td>
 <td>'.$obj->facilities.'</td>
 </tr>';
}
}
echo '</tabel>';
?>
