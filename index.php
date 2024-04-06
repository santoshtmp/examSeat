<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
</head>
<link rel="stylesheet" type="text/css" href="css/loginAdmin.css">
<link href="css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<body>

   <?php include 'header.php'; ?> 

 
    <div class="container" style="margin-top:40px">
<!-- -------------------------------------------------------- -->

      <div style="float: right;width: 150px;height: 30px;border: 1px solid black; text-align: center;background-color: lightgreen;">
            <label>
              <a href="loginUser.php">login User</a>
            </label>
      </div>
<!-- -------------------------------------------------------- -->
    
   
      <div class="col-sm-6 col-md-4 col-md-offset-4">
       
          <div class="panel-heading">
            <strong style="float: right;width: 350px;height: 30px;border: 1px solid black; text-align: center;background-color: lightgreen; margin-bottom: 15px;"> <u>Sign in to continue Admin</u></strong>
          <div class="panel-body">

            <form  name="login_form" class="form-signin" action="index.php" method="post" >
             
                <div class="row">
                  <div class="card card-container">
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        
                         <input type="username" id="inputEmail" class="form-control" name="username" placeholder="admin name" required autofocus>
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="form-group">
                       <button class="btn btn-lg btn-primary btn-block btn-signin"
                       type="submit"  name="signin">Login</button>
                    </div>
                  </div>
                </div>
            
            </form>
          </div>
         <!--  <div class="panel-footer ">
            Don't have an account! <a href="admin-signup.php" onClick=""> Sign Up Here </a>
          </div> -->
                </div>
      </div>
    </div>
</body>
</html>



<?php

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "dbphp";

  $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if (isset($_POST['signin'])){ 
    $uname=$_POST['username'];
    $pass=$_POST['pass'];

     session_start();
    $_SESSION['name']=$uname;

    $sql="select * from loginadmin where username='$uname' and password='$pass'";
    $run=mysqli_query($con,$sql);
    $row=mysqli_num_rows($run);
    if($row == 1){

        if ($_SESSION['name'] == true) {
              echo " <script>
           alert('you are sucessfully login..');
          location.href='adminHome.php';
          </script> ";

          } 
      }
     else{

        ?>
       <script>
        alert('admin_name or Password does not match ! !');
        window.open('index.php','_self');
      </script>  
      <?php   
    }
}
?>