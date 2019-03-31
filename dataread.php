<!DOCTYPE html>
<html>
<head>
<title>My Account</title>
<link href="css/dataread.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php
  require_once("config.php");

  $Username = $_REQUEST["Username"];
  $Password = $_REQUEST["Password"];
  $sql = "SELECT * FROM USERS_INFO WHERE Username = '$Username'";
  if($result = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($result) > 0) {
        // output data
        $row = mysqli_fetch_assoc($result);
        if(password_verify($Password, $row['Password'])){
          $get_username = $row["Username"];
          $get_lastname = $row["Last_name"];
          $get_firstname = $row["First_name"];
          $get_mail = $row["Mail"];
        }
        else{
          echo "Username or Password is wrong!";
        }
      } else {
        echo "Users is not existed!";
    }
  }else{
    echo mysqli_error($conn);
  }
  mysqli_close($conn);
  ?>
  <script language="JavaScript" type="text/javascript">
  function success(){
   alert("The submition is successful!");
  }
  </script>
  <header>
    <div class="link">
      <div class="form">
        <input type="text" name="uname" placeholder="  Find your services here...">
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
  <br>
  <div class="details">
    <h1>Hi <?php echo $get_username ?>!</h1>
    <div class="rate">
      <p>Current Point: <span style="font-size:24px">50</span> points.
        <span><a href="#" style="font-size:16px">Redeem Gifts</a></span></p>

    </div>
    <div>
      <hr>
      <h2>Personal Information</h2>
      <p>Name: <?php echo $get_firstname . ' ' . $get_lastname?></p>
      <p>Mail: <?php echo $get_mail?></p>
    </div>
    <hr>
    <h3>Recent Rating</h3>
  </div>
  <div>

    <a href ="details.html"><img  class="search" src="https://farm1.staticflickr.com/966/41773665452_71d06541d2_o.png"></a>
  </div>
  <div class="submit">
    <a class ="sub" href="index.html"><input type="submit" name="submit" value="START A NEW RATING"></a>
  </div>
</article>
<br>
<br>
<footer>
  <p>Copyright (c) High Five Health</p>
</footer>
</body>
</html>
