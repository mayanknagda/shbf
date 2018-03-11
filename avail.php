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


echo '<script> $(document).ready(function(){
    $("button").click(function(){
      var d =new Date($("#datepicker").datepicker("getDate"));
      var date=d.getFullYear()+"/"+(d.getMonth()+1)+"/"+d.getDate();
      $("#data1").load("check_avail.php",{date: date});
    });
  });</script>';

          echo '<p><h3>Hall Availability</h3></p>';
            echo '<table>';
            echo '<tr>';
            echo '<th>Select Date</th>';
            echo '</tr>';
            echo '<tr>';
              echo '<script>
                $( function() {
                $( "#datepicker" ).datepicker({ minDate: 0, maxDate: 30});
                   });
                </script>';
                echo '<td>';
            echo '<td colspan="1" align="left"><input type="text" name="date" id="datepicker" readonly="true" required></td>';
            echo'</tr>';
            echo'<tr>';
            echo'<td>';
            echo'<td>';
            echo "<td>";
            echo '<button value= name="hallid" style="float:right;">Book</button>';
            echo '</form>';
          echo '</tr>';
          echo '</table>';
        
          echo '<div id="data1">';
          echo '</div>';

          echo '</div>';
          echo '</div>';    
  ?>

  
</body>
<footer> /Developed by Department of CSE, SRMIST, KTR/ </footer>
</html>
