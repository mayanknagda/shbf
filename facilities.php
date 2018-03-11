<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
<style type="text/css">

  .boxed {
  border: 1px solid green ;
}
</style>
  <style type="text/css">

  table {
    table-layout: auto;
    border-collapse: collapse;
    width: 100%;
}
table td {
    border: 1px solid #ccc;
}
table .absorbing-column {
    width: 100%;
}

</style>
    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <div class="scrollit">
        <p>State-of-the-art facilities available for users.<br>
          <p style="color:red">“All the faculty members and faculty advisors of student clubs, who have registered in this portal can book the
halls”</p><br>
        <table>
  <tr>
    <th>Sr. No</th>
    <th>Name of Hall</th>
    <th>Located Building</th>
    <th>Capacity</th>
    <th>Facilities Included</th>
  </tr>
  <?php
  $result = $mysqli->query('SELECT * FROM halls');
  if($result === FALSE){
    die(mysql_error());
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
  ?>
</table>
        </p>
      </div>
      </div>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
  <footer> /Developed by Department of CSE, SRMIST, KTR/ </footer>
</html>
