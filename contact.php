<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <div class="scrollit">
        <p>
          For general queries write to email address<br>
For specific queries:<br>

          <table>
            <tr>
              <th>
                S. No.
              </th>
              <th>
                Hall
              </th>
              <th>
                Contact Person
              </th>
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
                  <td>'.$obj->incharge.'</td>
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
