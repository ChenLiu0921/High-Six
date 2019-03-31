<!DOCTYPE HTML>
<html>
	<head>
	  <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	  <link href="css/signup.css" rel="stylesheet" type="text/css" />

	  <style>
	  	.error {color: #FF0000;}
	  </style>
	  <title>Sign Up</title>
	</head>
	<body class="bg-light">
		<header>
	    <div class="link">
	      <div class="form">
	        <input class="searchinput" type="text" name="uname" placeholder="  Find your services here...">
	        <button id ="btn" onclick="changeImg(event)" value="SEARCH">Search</button>
	      </div>
	      <a class = "log" href="login.html">
	        <img src="https://i.imgur.com/oZfpJS0.png" alt="login"/> Log In
	      </a>
	      <a class = "log" href="sign_up.php">
	        <img src="https://farm1.staticflickr.com/933/39857309810_3ecc814f9d_z.jpg" alt="signup"/> Sign Up
	      </a>
	      <br>
	    </div>
	  </header>
	  <br>
	  <div class="navi">
	    <div class="logo">
	      <a href="index.html" style="text-decoration:none;"><img src="https://i.imgur.com/UrhCoqa.png" width="250" height="80" /></a>
	    </div>
	    <div class="navg">
	      <ul>
	        <li><a href="index.html">HOME</a></li>
	        <li><a href="search.html">SEARCH</a></li>
	        <li><a href="about.html">ABOUT</a></li>
	        <li><a href="servicelist.html">SERVICE LIST</a></li>
	      </ul>
	    </div>
	  </div>

	<?php
	require_once("config.php");
	// input
	// define variables and set to empty values
	$usernameErr = $passwordErr = $lnameErr = $fnameErr = $emailErr = $dobErr = $genderErr = "";
	$username = $password = $lname = $fname = $email = $dob = $gender = "";
	$validu = $validp = $validl = $validf = $valide = $validd = $validg = 1;
	$valid = false;

	// Select all Username information from database
	$all_username = "SELECT Username FROM USERS_INFO";
	$result = $conn->query($all_username);


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["username"])) {
		$usernameErr = "Username is required";
	  } else {
		$username = test_input($_POST["username"]);
		if($result->num_rows > 0){
		  while($row = $result->fetch_assoc()){
			if($row["Username"] == $username){
					$usernameErr = "Username has been used";
		  }
		}
	  }
	}

	  if (empty($_POST["password"])) {
		$passwordErr = "Password is required";
	  } else {
		$password = test_input($_POST["password"]);
	  }

	  if (empty($_POST["lname"])) {
		$lnameErr = "Last name is required";
	  } else {
		$lname = test_input($_POST["lname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
		  $lnameErr = "Only letters and white space allowed";
		  $validl = 0;
		}
	  }

	  if (empty($_POST["fname"])) {
		$fnameErr = "First name is required";
	  } else {
		$fname = test_input($_POST["fname"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
		  $fnameErr = "Only letters and white space allowed";
		  $validf = 0;
		}
	  }

	  if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	  } else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		  $valide = 0;
		}
	  }

	  if (empty($_POST["dob"])) {
		$dobErr = "Date of birth is required";
	  } else {
		$dob = test_input($_POST["dob"]);
	  // check if name only contains letters and whitespace
		if (!preg_match("/^[0-9 ]*$/",$dob)) {
		  $dobErr = "Only number allowed";
		  $validd = 0;
		}
	  }

	  if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	  } else {
		$gender = test_input($_POST["gender"]);
	  }
	}

	if ($validu == 1 and $validp == 1 and $validl == 1 and $validf == 1 and
	$valide == 1 and $validd == 1 and $validg == 1){
	  $valid = true;
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?>
	<div class="container" style='width:50%;margin-top:50px;margin-bottom:50px; border:1px solid black; padding:15px;'>
		<h1 style="text-align:center;">SIGN UP</h1>
		<hr>

		<p><span class="error">* required field.</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

			<div  class="col-md-12">
			  <label>Username:</label><span class="error">* <?php echo $usernameErr;?></span>
			  <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
			  <br>
			</div>

			<div  class="col-md-12">
				<label>Password:</label> <span class="error">* <?php echo $passwordErr;?></span>
				<input type="password" name="password" value="<?php echo $password;?>" class="form-control">
				<br>
			</div>

			<div class="col-md-12">
			  <label>Last Name:</label> <span class="error">* <?php echo $lnameErr;?></span>
			  <input type="text" name="lname" value="<?php echo $lname;?>" class="form-control">

			  <br>
			</div>

			<div class="col-md-12">
			  <label>First Name:</label><span class="error">* <?php echo $fnameErr;?></span>
			  <input type="text" name="fname" value="<?php echo $fname;?>" class="form-control">
			  <br>
			</div>

			<div class="col-md-12">
				<label>DOB:</label><span class="error">*</span>
				<span class="error"><?php echo $dobErr;?></span>
				<input type="text" name="dob" value="<?php echo $dob;?>" class="form-control">
				<span class="error">Date Format: DDMMYYYY</span>
				<br>
			</div>

			<div class="col-md-12">
			  <label>E-mail:</label><span class="error">* <?php echo $emailErr;?></span>
			  <input type="text" name="email" value="<?php echo $email;?>" class="form-control">
			  <br>
			</div>

			<div class="col-md-12">
				  <label>Gender:</label> <span class="error">* <?php echo $genderErr;?></span>
				  <div class="radio">
					<label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female</label>
				  </div>
				  <div class="radio">
					<label><input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male</label>
				  </div>
				  <br>
			</div>
		  <input class="btn btn-success btn-block" type="submit" name="submit" value="Submit">
		</form>
	</div>
	<?php
	// record data to the database
	$fill = false;
	if ($username != "" and $password != "" and $lname != "" and $fname != ""
	and $email != "" and $dob != "" and $gender != ""){
	  $fill = true;
	}
	if ($valid == false or $fill == false){
	  echo "";
	}
	else{
	  $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
	  $sql = "INSERT INTO USERS_INFO" . "(Username, Password, Gender, Mail, DOB, Last_name, First_name)"
	  . "VALUES" . "('$username','$param_password','$gender','$email','$dob','$lname','$fname')";

	  if (mysqli_query($conn, $sql)) {
		echo "<script language=\"JavaScript\">location.replace(\"successful.html\");\r\n</script>";
	  } else {
		echo "<script language=\"JavaScript\">alert(\"Registered Fail, Please check validation!\");</script>";
	  }
	}
	mysqli_close($conn);
	?>

	<footer>
	<p>Copyright (c) High Five Health</p>
	</footer>

	</body>
</html>
