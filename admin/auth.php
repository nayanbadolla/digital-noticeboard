<?php
    if($_POST) {
        if($_POST['admin'] == 'admin') {
            if($_POST['pass'] == 'christ@cs.dept') {
                header("Location: left.php");
            }
        }
        else {
            header("Location: index.php?sta=0");
        }
    }
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Stackfindover: Sign in</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Log in to Admin Portal</a></h1>
        </div>

        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <!-- <span class="padding-bottom--15">Upload data for main notice.</span> -->
                    <form id="stripe-login" enctype="multipart/form-data" method="POST">
                        <!---->
                    <div class="field padding-bottom--24">
                        <label for="name">Admin ID:</label>
                        <input type="text" name="admin">
                    </div>

                    <div class="field padding-bottom--24">
                        <label for="pass">Admin Password:</label>
                        <input type="password" name="pass">
                    </div>
                  

                    <div class="field padding-bottom--24">
                        <input type="submit" name="submit" value="Continue">
                    </div>

                    <?php
                        if($_GET) {
                            if($_GET['sta']==0) {
                                echo '<span style="color:red">Enter valid username and password.</span>';
                            }
                        }
                    ?>
                    </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>