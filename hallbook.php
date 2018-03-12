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
              echo'<div class="row">';

              }
              echo '<div class="large-4 columns" >';
              echo '<div class="card">';
              echo '<p><h3>'.$obj->name.'</h3></p>';//product name ye wala he, upar print hoga
              echo '<img src="images/'.$obj->image.'"/>';
              echo '<p>Located: '.$obj->located.'</p>';
              echo '<p>Capacity: '.$obj->capacity.'</p>';
              echo '<p><strong>Person Incharge</strong>: '.$obj->incharge.'</p>';
              echo '<p><button type="submit" value="'.$i.'" name="id" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;">Book</button></p>';
              echo '</div>';
              echo '</div>';
              if($i%3==0){
              echo'</div>';
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
    <style>
      .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(55,105,105,1.7);
    transition: 0.3s;
    border-radius: 10px;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}
img {
    border-radius: 5px 5px 0 0;
}
    </style>
    <script>
      $(document).foundation();
    </script>
  </body>
  <footer> /Developed by Department of CSE, SRMIST, KTR/ </footer>
</html>
