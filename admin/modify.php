<?php

	$link = mysqli_connect("localhost", "id20113660_noticeboard", "ChristNoticeBoard@123",  "id20113660_admin");

	if (mysqli_connect_error()) {

		die("Error connecting database.");
	}

	if ($_GET) {
		if ($_GET['iden'] == 'main')
			$query = "DELETE FROM `main` WHERE `main`.`ID` = " . $_GET['ID'] . "";
		else if ($_GET['iden'] == 'side')
			$query = "DELETE FROM `main` WHERE `main`.`ID` = " . $_GET['ID'] . "";
		else if ($_GET['iden'] == 'opp')
			$query = "DELETE FROM `main` WHERE `main`.`ID` = " . $_GET['ID'] . "";

		if (mysqli_query($link, $query)) {
			header("Location: https://christnoticeboard.000webhostapp.com/admin/modify.php");
		} else {
			echo "Bleh.";
		}
	}

	if($_GET['changingdisplayid'] != NULL) {
		$query = "UPDATE `main` SET `Display` = '".$_POST['changedisplay']."' WHERE `main`.`ID` = '".$_GET['changingdisplayid']."'";
		if (mysqli_query($link, $query)) {
			header("Location: https://christnoticeboard.000webhostapp.com/admin/modify.php");
		} else {
			echo "Bleh.";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modify | Digital Notice Board</title>

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
            <div class="col-md-12 content content2">
                <div class="form">
                    <h2>Modify Data</h2>
                    <br>
                    <table>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 10%">Type</th>
                            <th>Title</th>
                            <th style="width: 15%">Image</th>
                            <th>Text</th>
                            <th style="width: 8%">Start Date</th>
                            <th style="width: 8%">End Date</th>
                            <th style="width: 8%">Remarks</th>
                            <th style="width: 5%">Display</th>
                            <th style="width: 5%">Delete</th>
                            <th style="width: 5%">Edit</th>
                        </tr>
                        <?php
											$query = "SELECT * FROM `main`";
											$i = 1;
											if ($result = mysqli_query($link, $query)) {                     //implementing the query and storing it in $result, and doing something if all this was successful
												while ($row = mysqli_fetch_array($result)) {
													echo "<tr>";
													echo "<td>";
													print_r($row['ID']);
													echo "</td>";
													echo "<td>";
													print_r($row['Type']);
													echo "</td>";
													echo "<td>";
													print_r($row['Title']);
													echo "</td>";
													echo "<td>";
													if ($row['Type'] != 'notice')
														echo '<img class="poster" src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" height="200px">';
													echo "</td>";
													echo "<td>";
													print_r($row['Text']);
													echo "</td>";
													echo "<td>";
													print_r($row['Start']);
													echo "</td>";
													echo "<td>";
													print_r($row['End']);
													echo "</td>";
													echo "<td>";
													print_r($row['Remarks']);
													echo "</td>";
													echo "<td>";
													if ($row['Display'] == 0)
														print_r("No");
													else
														print_r("Yes");
													echo "</td>";
													echo "<td>";
													printf("<a href=https://christnoticeboard.000webhostapp.com/admin/modify.php?iden=main&ID=%s><img src='/media/cross.png' height='20px'></a>", $row['ID']);    //change here
													echo "</td>";
													echo "<td>";
													printf("<a href=https://christnoticeboard.000webhostapp.com/admin/upload.php?ID=%s><img src='/media/edit.png' class='edit' height='20px'></a>", $row['ID']);    //change here
													echo "</td>";
													echo "</tr>";
												}
											}
											?>
                    </table>
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