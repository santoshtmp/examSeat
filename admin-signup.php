<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sign-up</title>
		  <?php include 'header.php'; ?>	
	           <link rel="stylesheet" href="css/sign-up.css">
	           <!-- <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script> -->
	          <script type="text/javascript" src="js/passvalid.js"></script> 

	          
</head>
<body>
	 <?php include "adminSlide.php"; ?>
	  <div style="margin-left: 20px; margin-top: 60px;">
	<!-- --------------------------------------------------- -->
	<br>
	<br>
	<div class="container">
			<form  class="border" id="form_check"  action="admin_form_insert.php" method="post"  >

				<div class="panel-heading" align="center">
	            	<strong> Sign up Form</strong>
    			</div>
    			<br>
				
				<div class="space">
					<label>User Name</label>
					
						<input type="text" class="form-control" placeholder="user-name" id="uname"  name="uname"  required>
						
					
				</div>
				
				<div class="space">
					<label >Password</label>
					<div >
						<input type="password" class="form-control" placeholder="Password" id="enter_pass" name="pass" required>
					</div>
				</div>

				<!-- <div class="space">
					<label >Re-Enter Password</label>
					<span style="color:red" id="pass_error_msg"></span>
						<input type="password" class="form-control" placeholder="Re-Enter Password" id="enter_retype_pass"   required onchange="fun()">
				</div>  -->
				
				<div id="pass_error">	
				</div>

				<div class="space">
					<button type="submit" class="submitbtn"  >Submit</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>

