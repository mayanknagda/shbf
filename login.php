<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
<div class="scrollit">
    <form method="POST" action="verify.php" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Email</label>
            </div>
            <div class="small-8 columns">
              <input type="email" required="true" id="right-label" placeholder="Your Email" name="username">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" required="true" id="right-label" name="pwd" placeholder="Your Password">
                <a href="forgot.php"><i>Forgot Password</i></a>
            </div>
          </div>
           </div>
          <div class="row">
            <div class="small-4 columns">
                </div>
            <div class="small-8 columns">
              <input type="submit" id="button1" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                  </form>
                </div>
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
