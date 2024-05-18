<?php
// establish a database connection
$servername = "localhost";
$username = "id20113660_noticeboard";
$password = "ChristNoticeBoard@123";
$dbname = "id20113660_admin";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $categories = implode(", ", $_POST["category"]); // convert array to string
  
  // prepare and execute the MySQL query to insert the data
  $sql = "INSERT INTO mailinglist (Email, Categories, Subscribed)
          VALUES ('$email', '$categories', '1')";
  if (mysqli_query($conn, $sql)) {
    $emailTo = $email;
    $subject = "Welcome to your very own info center!";
    $body = "Hey! You have successfully subscribed to the following categories: ".$categories." Thanks and regards: Team CME.";
    $headers = "From: dnb@christuniversity.in";

    if(mail($emailTo, $subject, $body, $headers)) {
        echo "The email was sent successfully (as far as I know)";
    }
    else {
        echo "The email could not be sent!";
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Subscription | DIgital Notice Board</title>
    <link rel="stylesheet" href="subs.css">

</head>
<body>
    <div class="container-fluid" id="section1">

        <div class="row" id="header">
            <div class="col-md-9" id="headtext">
                <!-- <h2>DEPARTMENT OF COMPUTER SCIENCE</h2> -->
                <h2>DIGITAL NOTICE BOARD</h2>
                <!-- <div class="motto">
                    <div>VISION : Excellence and Service</div>
                    <div>MISSION : To develop IT professionals with ethical and human values</div>
                </div> -->
            </div>
            <div class="col-md-3">
                <img src="./media/Christ University Black.png" id="logo">
            </div>
        </div>

        <div class="row" id="container">
            <div class="col-md-12 content">
                <div class="form">
                    <h2>Subscribe to info,<br>curated just for you!</h2><br><br>

                     <form method="POST">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br><br>
                        <label for="category">Select category:</label><br>
                        <input type="checkbox" id="cs" name="category[]" value="Department of Computer Science">
                        <label for="cs">Department of Computer Science</label><br><br>
                        <input type="checkbox" id="ncc" name="category[]" value="NCC">
                        <label for="ncc">NCC</label><br><br>
                        <input type="checkbox" id="swo" name="category[]" value="SWO">
                        <label for="swo">SWO</label><br><br>
                        <input type="checkbox" id="caps" name="category[]" value="CAPS">
                        <label for="caps">CAPS</label><br><br>
                        <input type="checkbox" id="stats" name="category[]" value="Department of Statistics">
                        <label for="stats">Department of Statistics</label><br><br>
                        <input type="submit" value="Subscribe">
                      </form>
                </div>
            </div>
        </div>
        
        <div class="row" id="footer">
            <div class="col-md-12">
                <b>Digital Notice Board (v1.2)</b> &nbsp; | &nbsp; <b>Concept and Design:</b> Dr. Ashok Immanuel V
                &nbsp; | &nbsp; <b>Software:</b> Neelesh Sharma (2040176), Nayan L. Badolla (2040147)
            </div>
        </div>
        <script>
            document.getElementBYId("submit-btn").addEventListener('click', function() {
                alert('Thank you for subscribing. Glad to have you onboard.')
            })
        </script>
</body>
</html>