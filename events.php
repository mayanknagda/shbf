<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>

    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <h1 style="color:red">Events coming up-</h1>
        <div class="scrollit">
        <?php
          $i=1;
          $result = $mysqli->query('SELECT * FROM events');
          if($result === FALSE){
            die(mysql_error());
          }
          if($result){
            while($obj = $result->fetch_object()) {
              if($i%2==0){
              echo'<div class="row">
                  <div class="small-12">';
              }
              echo '<div class="large-6 columns" >';
              echo '<div class="container">';
              echo '<div class="card">';
              echo '<img src="images/uploads/'.$obj->img.'" height="500" width="500"/>';

              echo '<p><b>Event Name: </b>'.$obj->name.'</p>';

              echo '<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <p><b>Description: </b>'.$obj->description.'</p>
                <p><strong>Registration/Information Link: </strong>'.$obj->reg.'</p>
                <p><strong>Contact Person Detail: </strong>'.$obj->contact.'</p>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                    </div>';
              echo '<a href="#" data-reveal-id="myModal" class="radius button">Learn More</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              if($i%2==0){
              echo'</div></div>';
              echo '<br>';
              }
              $i++;
            }

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
