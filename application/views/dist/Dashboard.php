<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--script src="JS/main.js"></script-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="../src/main.js"></script>
<script src="../src/dashboard.js"></script>
<link rel="stylesheet" href="../src/dashboard.css">
	<!--link rel="stylesheet" href="css/bootstrap.css"/-->
	<title>Dashboard</title>
</head>
<body>
	<div id="dash" class="page">
	<h3>Welcome Grader 123</h3>


	<nav>
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">INFSCI 2020</a>
	    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">INFSCI 0000</a>
	    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">INFSCI 0001</a>
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		  	<div class="classes">

					<?php
					SESSION_Start();
					$uname = $_SESSION['login_user'];
							echo "Hi, .$uname. ". "Welcome!";
					//if($uname)
					//
						$myAssignment = fopen("Data/CS-401-ConfigFiles/Assn2ExpSrcFiles.txt", "r") or die("Unable to open file!");
					//}
					//$myAssignment = fopen("Data/CS-401-ConfigFiles/Assn2ExpSrcFiles.txt", "r") or die("Unable to open file!");

					$AssName = array();

					while(!feof($myAssignment)){
						$AssName[]=fgets($myAssignment);
					}

					foreach($AssName as $key=>$value) { ?>
						<div class='card'>
						  <div class='card-body'>
							<h5>
					<?php
		      $Assignment=strstr($value, '	', true);

					echo "<a href=''>$Assignment</a>";
					?>
					<p>
				    		<span class="m-r-15">Urgent: 20</span>
				    		<span>Ungraded: 30</span>
				    	</p>
				    	<p>
				    		<span class="m-r-15">Graded: 20</span>
				    		<span>Total: 70</span>
				    	</p>
						</h5>
						</div>
					</div>

						    <?php
					}
					fclose($myAssignment);
					 ?>

			</div>
			<div class="students">
				<h5> List of Students </h5>
				<ul class="list-group">
					<div class="ex1">
						<form>
							<input type="text" id="myInput" onkeyup="mySearchFunction()" placeholder="Search for names.." title="Type in a name">
<ul id="myUL">

	<?php
	//$usrname='mph47';
	//if($usrname == 'mph47') {
	$myfile = fopen("Data/CS-401-ConfigFiles/student_list/mph47_Students.txt", "r") or die("Unable to open file!");
	$pitt_id = array();
//}

	while(!feof($myfile)){
		$pitt_id[]=fgets($myfile);

	}
	foreach($pitt_id as $key=>$value) {
		echo "<li>";
		echo "<a href='$value.php'>$value</a>";
		echo "<a href='Data/backReader/handin-hierarachy/handin-hierarachy/401-handin/$value/$value-grades.html'>Grades</a>";
		echo "</li><br>";

	}
	fclose($myfile);
	 ?>
</ul>
						</form>

				 </div>

				</ul>

			</div>
			<!--button type="button" class="btn btn-primary open-sub">Open Submissions</button-->
		</div>
	    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
	    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
	</div>

	</div>
	<!--script src="main.js"></script-->
</body>
</html>
