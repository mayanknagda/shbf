<?php
include ('php/session.php');
include ('php/config.php');
include ('php/head.php');
?>
<?php
if(isset($_POST['submit']))
 {
   $secretkey="6LekqEkUAAAAAPIZfYI31bzR_cjtnQWzjrVIGI5I";
   $responsekey=$_POST['g-recaptcha-response'];
   $user_ip=$_SERVER['REMOTE_ADDR'];
   $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$user_ip";
   $response=file_get_contents($url);
   $response=json_decode($response);
}
?>
<?php
 echo '<script type="text/javascript">
   function enableBtn(){
    document.getElementById("button1").disabled = false;    }
 </script>
 <script src="https://www.google.com/recaptcha/api.js"></script>';

echo '<script type="text/javascript">
      function validateForm() {
    var x = document.forms["register"]["pwd"].value;
    var y = document.forms["register"]["rpwd"].value;
    if (x !=y) {
        alert("Password mismatch!");
        return false;
    }
    else{
      var s = x.length;
      var z = document.forms["register"]["email"].value;
      var n = z.search("srm");
      if(n==-1){
        alert("Please use a valid SRM email id!");
        return false;
      }
      else if(s<6){
        alert("Please make password of atleast 6 characters");
        return false;
      }
      else{
        return true;
      }
    }
}
    </script>';
?>
<div class="scrollit">
<div class="row">
            <div class="small-8 columns">
    <form name="register" method="POST" action="insert.php" onsubmit="return validateForm()" style="margin-top:30px;">
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">First Name<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter First Name" name="fname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Last Name<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter Last Name" name="lname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Institute<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter Institute Name" name="institute" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Reg. No/Faculty ID<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter Your Institute ID" name="iid" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Full Address<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Give Your Full Address" name="address" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="Enter your Email" name="email" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Student Club/Chapter Name<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label" placeholder="Enter Name of Student Chapter" name="club" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Phone No<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Enter your Phone No" name="phno" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Confirm Password<font color="red">*</font></label>
            </div>
            <div class="small-8 columns">
              <input id="right-label" type="password" name="rpwd" required>
            </div>
         </div>

          <div class="row">
            <div class="small-4 columns">
              </div>
              <div class="small-8 columns">
               <div align="left" id="right-label" align="right" class="g-recaptcha" data-sitekey="6LekqEkUAAAAAEAlfTX7PfAUMlzK5JAam7Tj6ZRV" data-callback="enableBtn"></div>
            </div>
          </div>
            <br>
          <div class="row">
            <div class="small-4 columns">
              </div>
              <div class="small-8 columns">
                 <input  type="submit" name="submit" id="button1" value="Register" disabled="true" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
          </form>
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
