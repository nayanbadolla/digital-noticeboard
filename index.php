<?php
	$link = mysqli_connect("localhost", "id20113660_noticeboard", "ChristNoticeBoard@123",  "id20113660_admin");
	
	if (mysqli_connect_error()) {					
		
	    die("Error connecting database.");  
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Department of Computer Science</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="index.css" rel="stylesheet">


</head>
<body>

<div class="container-fluid" id="section1">
    <div class="row" id="header">
        <div class="col-md-9" id="headertext">
            <h2>DEPARTMENT OF COMPUTER SCIENCE</h2>
            <div class="motto">
                <div>VISION : Excellence and Service</div><div>MISSION : To develop IT professionals with ethical and human values</div>
            </div>
        </div>
        <div class="col-md-3">
            <img src="media/Christ University Black.png" id="logo">
        </div>
    </div>

    <div class="row" id="content">
        <div class="col-md-4">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10" id="opportunity">
                        <h3>OPPORTUNITIES</h3>
                        <marquee direction="up" scrollamount='4'>
                            <ul>
                                <?php
                                    $query = "SELECT * FROM `main` WHERE `End` >= CURDATE() AND `Display`=1 and `Type`='notice'";
                                    if ($result = mysqli_query($link, $query)) {
                                        while($row = mysqli_fetch_array($result)) {
                                            echo '<li>'.$row['Text'].'</li><br>';
                                        }
                                    }
                                ?> 
                            </ul>
                        </marquee>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <div class="row" id="calendar">
                    <div class="col-md-12">
                        <iframe src="https://calendar.google.com/calendar/embed?src=cs%40christuniversity.in&ctz=Asia%2FKolkata&amp;mode=AGENDA&amp;showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showNav=0&amp;showTz=0&amp;showTabs" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            
            <!-- <img src="media/1.png" class="poster"> -->
            
            <?php
                $query = "SELECT * FROM `main` WHERE `End` >= CURDATE() AND `Display`=1 and `Type` ='eventposter'";
                if ($result = mysqli_query($link, $query)) {
                    
                    $images = array();

                    while($row = mysqli_fetch_array($result)) {
                        array_push($images, $row['Image']);
                    }
                        
                    for($i=0; $i < sizeof($images); $i++) 
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($images[$i]).'" class="poster">';
                }
            ?>
              
        </div>
        <div class="col-md-4">
            <?php
                $query = "SELECT * FROM `main` WHERE `End` >= CURDATE() AND `Display`=1 and `Type`  ='sideposter'";
                if ($result = mysqli_query($link, $query)) {
                    
                    $images = array();

                    while($row = mysqli_fetch_array($result)) {
                        array_push($images, $row['Image']);
                    }
                        
                    for($i=0; $i < sizeof($images); $i++) 
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($images[$i]).'" class="research">';
                }
            ?>
        </div>
    </div>

    <div class="row" id="footer">
        <div class="col-md-12">
            <b>Digital Notice Board (v1.2)</b> &nbsp;  | &nbsp;  <b>Concept and Design:</b> Dr. Ashok Immanuel V  &nbsp; | &nbsp;  <b>Software:</b> Neelesh Sharma (2040176), Nayan L. Badolla (2040147)
        </div>
    </div>

</div>

    <script src="slideshow.js"></script>
    <script src="slideshow2.js"></script>
</body>
</html>