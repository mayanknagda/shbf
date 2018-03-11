<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>

    <div class="row" style="margin-top:30px;">
      <div class="small-12">
        <p align="center" style="color:red"><b>SHBF:</b><i>SRM Hall Booking Facility</i></p>
        <p>SHBF portal provides consolidated state-of-the-art Hall Booking facilities available in SRMIST and allows users to directly reserve time for use for various events conducted in SRM IST.
        </p>
<p>
<?php

$q = $mysqli->query("SELECT * FROM announcement");
$result=$q->fetch_object();

echo '<marquee style="color:blue">'.$result->announce.'</marquee>'

?>

</p>

        <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="images/hall1.jpg" style="width:100%">
          <div class="text" style="color:red">Hall 1</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="images/hall2.jpg" style="width:100%">
          <div class="text" style="color:red">Hall 2</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="images/hall3.jpg" style="width:100%">
          <div class="text" style="color:red">Hall 3)</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
        </script>
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
