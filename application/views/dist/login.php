<?php
session_start();
$uname = $_SESSION['login_user'];

 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<script src="./main.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css"/>

	<title>Welcome - Login</title>
</head>
<body class="text-center">
	<div id="login">
		<form class="form-signin" action="login.php" method="POST">
	      <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
	      <label for="inputEmail" class="sr-only">Pitt email address</label>
	      <input type="text" id="inputEmail" class="form-control" placeholder="Pitt Id" required="" autofocus="" name="PITT_Id">
	      <label for="inputPassword" class="sr-only">Password</label>
	      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">

	      <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
	      <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
	    </form>

      <?php
      //$email = $_POST["email"];
      //$usrname = $_POST['usrname'];

      $password = $_POST["password"];
      $username = $_POST["PITT_Id"];
      $_SESSION['login_user'] = $username;
      //$s = 'Posted On April 6th By Some Dude';
      //echo strstr($s, 'By', true);
      //$username=strstr($email, '@', true);
      //echo $username;
      //if($email == $password){
      if($password==$username){
        //echo "success";
        header('location: Dashboard.php');
      }
      else {
        echo "Your usernanme or password is not correct.";
      }


       ?>

	</div>

</body>
</html>
