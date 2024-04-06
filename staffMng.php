<!DOCTYPE html>
<html>
<head>
	<title>Staff Manage</title>
	<link rel="stylesheet" type="text/css" href="css/staff.css">
	<script type="text/javascript" src="js/delete.js"></script>
</head>
<body>
	<?php include "adminSlide.php"; ?>
<div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">
<!-- ------------------------------------------------------------------ -->
	<div class="container">
			<p><b><u>Teaching Staff Detail</u></b></p>
	</div>
	<div class="container">
		<hr class="hr">
	</div>
<!-- ----------------------------------------------------------------- -->

	<div class="backgr">
		<div class="it">
			<label><a href="#">BE-Information Technology</a></label>
		</div>
		<div class="com">
			<label ><a href="#">BE-Computer</a></label>
		</div>
		<div class="sof">
			<label ><a href="#">BE-Software</a></label>
		</div>
	</div>		

	<div class="container">
		<hr class="hr">
	</div>
<!-- ------------------------------------------------------------------- -->
	<div class="border">
		<form action="" method="POST">
			<div class="space">
				<label>
					 Name : <input  type="text" name="name" required style="width: 270px;">
				</label>
			</div>
			<div class="space">
				<label>
					Address : <input type="text" name="address" required="required" style="width: 255px;">
				</label>
			</div>
			<div class="space">
				<label>
					Phone number : <input type="number" name="phno" required>
				</label>
			</div>
			<div class="space">
				<label>
					Department : 
					<input type="checkbox" name="dep[]" value="IT"> IT    
					<input type="checkbox" name="dep[]" value="SE"> SE    
					<input type="checkbox" name="dep[]" value="CE"> CE       
				</label>
			</div>
			<div class="space">
				<button type="submit" name="submit" style="margin-left: 40%;">Submit      </button>
			</div>
		</form>
	</div>

	<div style="margin-top: 20px;">
		<hr class="hr">
	</div>
<!-- ------------------------------------------------------------------- -->
	<?php

		$host = "localhost";
		$dbusername = "root";
 		$dbpassword = "";
 		$dbname = "dbphp";

	    $con = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

	    if (!$con) {
			   	# code...
			   	die("connection fail....".mysqli_connect_error());
			   }

	if (isset($_POST['submit'])){ 

		$name=$_POST['name'];
		$address=$_POST['address'];
		$phno=$_POST['phno'];
		$dep=$_POST['dep'];
		$department=implode(",", $dep);

		$INSERT="INSERT into staffdetail(name,address,phonenum,department) values('$name','$address','$phno','$department')";

		if(mysqli_query($con,$INSERT)){
			?>
      					<script>
        				alert('successfully save');
        				window.open('staffMng.php','_self');
      					</script>
      		<?php
		}else{
			?>
      					<script>
        				alert('Error   !!!');
        				window.open('staffMng.php','_self');
      					</script>
      		<?php
		}
	}
	?>

<!-- ------------------------------------------------------------------- -->
<div style="margin-right: 20px;">
		<table id="customers">
			<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Name</th>
				  		<th>Address</th>
				  		<th>Phone no</th>
				  		<th>Department</th>
				  		<th>Action</th>
				  	</tr>	
			 </thead>
		<?php
				$id=1;
				$sql="select * from staffdetail ";
				$result_set =  mysqli_query($con,$sql);
				if (mysqli_num_rows($result_set)>0) {
					# code...
					while($row = mysqli_fetch_array($result_set)){
		?>
					<tr>
						<td><?php echo $id++; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['phonenum']; ?></td>
						<td><?php echo $row['department']; ?></td>
						<td>
          <button name="delete" value="delete" onClick="conformDeletestaff(<?php echo $row['id']; ?>)"> -Delete- </button>
          				</td>
					</tr>
		<?php
					}
				}
		?>
		</table>
	
</div>
<div style="margin-top: 40px;">
		<hr class="hr">
	</div>

<!-- ------------------------------------------------------------------ -->
</div>
			
</body>
</html>