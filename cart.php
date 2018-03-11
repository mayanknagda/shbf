<?php
include ('php/session.php');
//include ('php/login_check.php');
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
            echo '<th>Booking Reason/Event Name</th>';
            echo '</tr>';
            $q = $mysqli->query("SELECT name FROM halls WHERE sno=$id");
            $q_result=$q->fetch_object();
            echo '<tr>';
            echo '<td colspan="1" align="left">';
            echo $q_result->name;
            echo'</td>';
            echo '<form action="book_1.php" method="POST">';
              echo '<script>
                $( function() {
                $( "#datepicker" ).datepicker({ minDate: 4, maxDate: 30});
                   });
                </script>';
            echo '<td colspan="1" align="left"><input type="text" name="date" id="datepicker" readonly="true" required></td>';
            echo'<td colspan="1" align="left"><input type="text" name="event"></td>';
            echo'</tr>';
            echo'<tr>';
            echo'<td>';
            echo'<td>';
            echo "<td>";
            echo '<button type=submit value='.$id.' name="hallid" style="float:right;">Book</button>';
            echo '</form>';
          echo '</tr>';
          echo '</table>';
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
