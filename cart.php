<?php
include ('php/session.php');
include ('php/login_check.php');
include ('php/config.php');
include ('php/calhead.php');
//if(!isset($_SESSION["username"])) { header("location:login.php");}
?>
    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <?php
        if(!empty($_POST)) // Used to stop a user from jumping to this page without properly filling the last one
        {
          echo '<p><h3>Hall Booking</h3></p>';
            $id=$_POST['id'];
            echo '<table>';
            echo '<tr>';
            echo '<th>Hall Name</th>';
            echo '<th>Hall Booking Date</th>';
            echo '<th>Booking Reason</th>';
            echo '</tr>';
            $q = $mysqli->query("SELECT name FROM halls WHERE sno=$id");
            $q_result=$q->fetch_object();
            echo '<tr>';
            echo '<td colspan="1" align="left"><i><b>';
            echo $q_result->name;
            echo'</b></i></td>';
            echo '<form action="book_1.php" method="POST" enctype="multipart/form-data">';
              echo '<script>
                $( function() {
                $( "#datepicker" ).datepicker({ minDate: 4, maxDate: 30});
                   });
                </script>';
            echo '<td colspan="1" align="left"><input type="text" name="date" id="datepicker" readonly="true" required></td>';
            echo'<td colspan="1" align="left"><input type="text" name="reason" required></td>';
            echo'</tr>';
            echo'<tr>';
            echo'<td colspan="3"><center><font color="red">Event Details (Provide only if hall is booked for a event)</font><center></td>';
            echo'</tr>';

            echo'<tr>';
            echo'<td>Name of the event</td>';
            echo'<td colspan="2"><input type="text" name="ename"></td>';
            echo'</tr>';

            echo'<tr>';
            echo'<td>Event Details</td>';
            echo'<td colspan="2"><input type="text" name="edetails"></td>';
            echo'</tr>';

            echo'<tr>';
            echo'<td>Upload Poster Image</td>';
            echo'<td colspan="2"><input type="file" name="fileToUpload" id="fileToUpload"></td>';
            echo'</tr>';

            echo'<tr>';
            echo'<td>Registration Link/Event Link</td>';
            echo'<td colspan="2"><input type="text" name="elink"></td>';
            echo'</tr>';

            echo'<tr>';
            echo'<td>Contact Person Details</td>';
            echo'<td colspan="2"><input type="text" name="econtact"></td>';
            echo'</tr>';

            echo'<tr>';
            echo'<td colspan="2"><center>Book The hall</center></td>';
            echo "<td>";
            echo '<button type=submit value='.$id.' name="hallid" style="float:right;">Book</button></td>';
            echo '</tr>';
            echo '</table>';
            echo '</form>';
          echo '</div>';
          echo '</div>';
        }
        else
        {
          echo '<p align="center"><img src="images/hack.jpg"></img></p>';
        }
          ?>

</body>
<footer> /Developed by Department of CSE, SRMIST, KTR/ </footer>
</html>
