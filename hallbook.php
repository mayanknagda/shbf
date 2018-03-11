<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <div class="scrollit">
        <?php
          $i=1;
          $result = $mysqli->query('SELECT * FROM halls');
          if($result === FALSE){
            die(mysql_error());
          }
          if($result){
             echo '<form action="cart.php" method="POST">';
            while($obj = $result->fetch_object()) {
              if($i%3==0){
              echo'<div class="row" style="margin-top:10px;">
                  <div class="small-12">';
              }
              echo '<div class="large-4 columns" >';
              echo '<div class="colorful">';
              echo '<p><h3>'.$obj->name.'</h3></p>';//product name ye wala he, upar print hoga
              echo '<img src="images/'.$obj->image.'"/>';
              echo '<p>Located: '.$obj->located.'</p>';
              echo '<p>Capacity: '.$obj->capacity.'</p>';
              echo '<p><strong>Person Incharge</strong>: '.$obj->incharge.'</p>';
              echo '<p><button type="submit" value="'.$i.'" name="id" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;">Book</button></p>';
              echo '</div>';
              echo '</div>';
              if($i%3==0){
              echo'</div></div>';
              }
              $i++;
            }
            echo '</form>';
          }
          echo '</div>';
          echo '</div>';
          echo'</div>'
          ?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
  <footer> /Developed by Department of CSE, SRMIST, KTR/ </footer>
</html>
