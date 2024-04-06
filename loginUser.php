<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title>Login User</title>
<style type="text/css">
  
.boarder{
 align-content: center;
  margin-top: 30px;
  margin-left: 38%;
  border: 1px solid black;
  width: 400px;
  border-radius: 25px;
 
}

.panel-heading {
    padding: 5px 15px;
    font-size: 20px;
    align-self: center;
}
.myform{
    margin-top: 40px;
    align-content: center;

}
.row{
  margin-left: 80px;
  margin-top: 10px;
 
  align-content: center;
}
.form-control{
  height: 35px;
  width: 200px;
  font-size: 20px;
  align-self: center;
}
.profile-img {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    margin-top: 25px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.panel-footer {
  margin-top: 10px;
  margin-bottom: 10px;
    padding: 1px 15px;
    color: #A0A0A0;
}

.submitbtn {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left: 120px;
    margin-top: 10px;
}

</style>    
</head>

<body  >

   <?php include 'header.php'; ?> 

  <div class="boarder">
      <div class="panel-heading"  align="center">
                <strong><u>Sign in to continue User</u></strong>
      </div>

       <img  class="profile-img" src="image/prof.png" alt="">
    

<form class="myform" action="loginUser.php" method="POST">
    <div class="row" >
    <input class="form-control" placeholder="Username" name="username" type="text" autofocus   required>
    </div>

    <div class="row">
      <input class="form-control" placeholder="Password" name="pass" type="password" value="" required>
    </div>
    <div >
      <input type="submit" name="login" class="submitbtn" value="Sign in">
      </div>
</form>
    
  </div>

  
</body>
</html>


<?php

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if (isset($_POST['login'])) {
    $uname=$_POST['username'];
    $pass=$_POST['pass'];

     session_start();
    $_SESSION['uname']=$uname;

    $sql="select * from studata where rollno='$uname' and rollno='$pass'";
    $run=mysqli_query($con,$sql);
    $row=mysqli_num_rows($run);

    if($row == 1){
      if ($_SESSION['uname'] == true) {

      echo "
      <script>
      alert('you are sucessfully login..');
      location.href='userHome.php';
      </script>
        ";

     } 

    }else{
    	?>
      <script>
        alert('Username or Password does not match ! !');
        window.open('loginUser.php','_self');
      </script>
      <?php
    }

   
}

?>