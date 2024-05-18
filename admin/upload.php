<?php

	$link = mysqli_connect("localhost", "id20113660_noticeboard", "ChristNoticeBoard@123",  "id20113660_admin");

	if (mysqli_connect_error()) {

		die("Error connecting database.");
	}

	if ($_POST) {

		if ($_POST['type'] == 'eventposter') {
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));

			$query = "INSERT INTO `main` (`ID`, `Type`, `Title`,`Image`, `Text`, `Start`, `End`, `Remarks`, `Display`) VALUES (NULL, '".$_POST['type']."', '".$_POST['title']."', '".$imgContent."', '".$_POST['text']."', '".$_POST['start']."', '".$_POST['end']."', '".$_POST['remarks']."', '".$_POST['display']."')";

			if (mysqli_query($link, $query)) {
				echo "<script>alert('Successful.')</script>";
			} else {
				echo "Bleh.";
			}
		} else if ($_POST['type'] == 'sideposter') {
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));

			$query = "INSERT INTO `main` (`ID`, `Type`, `Title`,`Image`, `Text`, `Start`, `End`, `Remarks`, `Display`) VALUES (NULL, '".$_POST['type']."', '".$_POST['title']."', '".$imgContent."', '".$_POST['text']."', '".$_POST['start']."', '".$_POST['end']."', '".$_POST['remarks']."', '".$_POST['display']."')";

			if (mysqli_query($link, $query)) {
				echo "<script>alert('Successful.')</script>";
			} else {
				echo "Bleh.";
			}
		} else if ($_POST['type'] == 'notice') {

			$query = "INSERT INTO `main` (`ID`, `Type`, `Title`,`Image`, `Text`, `Start`, `End`, `Remarks`, `Display`) VALUES (NULL, '".$_POST['type']."', '".$_POST['title']."', NULL, '".$_POST['text']."', '".$_POST['start']."', '".$_POST['end']."', '".$_POST['remarks']."', '".$_POST['display']."')";

			if (mysqli_query($link, $query)) {
				echo "<script>alert('Successful.')</script>";
			} else {
				echo "Bleh.";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Uploads | Digital Notice Board</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="index.css" rel="stylesheet">
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
                <img src="../media/Christ University Black.png" id="logo">
            </div>
        </div>

        <div class="row" id="container">
            <div class="col-md-12 content">
                <div class="form">
                    <h2>Upload Data</h2>
                    <br>
						<form id="upload" enctype="multipart/form-data" method="POST">	
                        <label for="type">Upload Type: </label>
										<select id="type" name="type">
											<?php
											$query = "SELECT * FROM `main_types`";
											if ($result = mysqli_query($link, $query)) {
												while ($row = mysqli_fetch_array($result)) {
													echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
												}
											}
											?>
										</select>
                        <br><br>
                        <label for="title">Title</label>
										<input type="text" name="title" <?php if($_GET['ID']!='') { $query = "SELECT * FROM `main` WHERE `ID`='".$_GET['ID']."'"; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); echo "value='".$row['Title']."'"; }?>>
									
                        <br><br>
                        <label for="image">Poster/Photo</label>
										<input type="file" name="image" value="">
                        <br><br>
                        <label for="text">Text</label>
										<input type="text" name="text" <?php if($_GET['ID']!='') { $query = "SELECT * FROM `main` WHERE `ID`='".$_GET['ID']."'"; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); echo "value='".$row['Text']."'"; }?>>
									
                        <br><br>
                        <label for="start">Start Date</label>
										<input type="date" name="start" <?php if($_GET['ID']!='') { $query = "SELECT * FROM `main` WHERE `ID`='".$_GET['ID']."'"; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); echo "value='".$row['Start']."'"; } else echo 'value="2000-01-01"'?>>
									
                        <br><br>
                        <label for="end">End Date</label>
										<input type="date" name="end" <?php if($_GET['ID']!='') { $query = "SELECT * FROM `main` WHERE `ID`='".$_GET['ID']."'"; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); echo "value='".$row['End']."'"; } else echo 'value="2000-01-01"'?>>
									
                        <br><br>
                        <label for="remarks">Remarks</label>
										<input type="text" name="remarks" <?php if($_GET['ID']!='') { $query = "SELECT * FROM `main` WHERE `ID`='".$_GET['ID']."'"; $result = mysqli_query($link, $query); $row = mysqli_fetch_array($result); echo "value='".$row['Remarks']."'"; }?>>
									
                        <br><br>
                        <label for="display">Display?</label>
										<select id="display" name="display">
											<option value="1">Yes</option>
											<option value="0">No</option>
										</select>
                        <br><br>
                        <input type="submit" name="submit" value="Continue">
                    </form>
                </div>
            </div>
        </div>

        <div class="row" id="footer">
            <div class="col-md-12">
                <b>Digital Notice Board (v1.2)</b> &nbsp;  | &nbsp;  <b>Concept and Design:</b> Dr. Ashok Immanuel V  &nbsp; | &nbsp;  <b>Software:</b> Neelesh Sharma (2040176), Nayan L. Badolla (2040147)
            </div>
        </div>
    
    </div>
</body>
</html>