<!DOCTYPE html>
<html>
<head>
	<title></title>		

	<link rel="stylesheet" type="text/css" href="css/viewData.css">
	<script type="text/javascript" src="js/delete.js">
	</script>

</head>
<body>

		  <?php include "adminSlide.php"; ?>
		  <div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">

     <ul class="start">
		<li>
			<div class="container">
				<a href="#" class="title"> View Student Data</a>
					<button class="button" type="submit" name="delete" onclick="confirmDeleteAll()">Delete All</button>
			</div>
		</li>
		<li>
    	<div style="float: right;margin-right: 20px;height: 40px;">
    		<form action="viewData.php" method="post">
    			<label style="height: 40px;"><input type="text" name="search" placeholder="  Enter student name"  style="height: 40px;">
    			</label>
    			<button type="submit" name="submit"  style="height: 40px;">Search</button>
    		</form>
    	</div>

		</li>
	</ul>
<!-- ------------------------------------------------------------- -->
<div class="backgr">
	<div class="it">
		<label>IT-Information Technology</label>
	</div>
	<div class="ce">
		<label>CE-Computer Engineering</label>
	</div>
	<div class="se">
		<label>SE-Software Engineering</label>
	</div>
</div>
<!-- ------------------------------------------------------------ -->

	<div class="container">
		<hr class="hr">
	</div>

	<div style="margin-right: 20px;">
	<div class="container">
		<table id="customers">
			<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Student Name</th>
				  		<th>Rollno</th>
				  		<th>Exam_Roll</th>
				  		<th>Gender</th>
				  		<th>Department</th>
				  		<th>Semester</th>	
				  		<th>Action</th>	
				  	</tr>	
				  </thead>

			<?php

			    $dbHost = "localhost";
			    $dbDatabase = "root";
			    $dbPassword = "";
			    $db = "dbphp";
			   $conn = mysqli_connect($dbHost,$dbDatabase,$dbPassword,$db);

			   if (!$conn) {
			   	# code...
			   	die("connection fail....".mysqli_connect_error());
			   }
//---------------------------------------------------
			   $Search=0;
			   if (isset($_POST['submit'])){ 

			   $Search++;
               $name=$_POST['search'];
               
               	$i=1;	
                $sql="SELECT * FROM stuData WHERE stu_name like '%$name%' ";
				$result_set =  mysqli_query($conn,$sql);
				if (mysqli_num_rows($result_set)>0) {
					while($row = mysqli_fetch_array($result_set)){
				?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['stu_name']; ?></td>
						<td><?php echo $row['rollno']; ?></td>
						<td><?php echo $row['eroll']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['department']; ?></td>
						<td><?php echo $row['semester']; ?></td>
						<td>
          <button name="delete" value="delete"><label onClick="confirmDelete(<?php echo $row['rollno']; ?>)"> -Delete- </label></button>

		  <button name="edit" value="edit"><label onClick="confirmEdit(<?php echo $row['rollno']; ?>)"> -Edit- </label>
							</button>
						</td>

					</tr>
				<?php
					}
				}
           	}

//------------------------------------------------------------
           	if($Search==0){

   				 $sql="select * from stuData ";
				$result_set =  mysqli_query($conn,$sql);
				if (mysqli_num_rows($result_set)>0) {
					# code...
					while($row = mysqli_fetch_array($result_set)){
				?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['stu_name']; ?></td>
						<td><?php echo $row['rollno']; ?></td>
						<td><?php echo $row['eroll']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['department']; ?></td>
						<td><?php echo $row['semester']; ?></td>
						<td>
          <button name="delete" value="delete"><label onClick="confirmDelete(<?php echo $row['rollno']; ?>)"> -Delete- </label></button>

		  <button name="edit" value="edit"><label onClick="confirmEdit(<?php echo $row['rollno']; ?>)"> -Edit- </label>
							</button>
						</td>

					</tr>
				<?php
					}
				}

		}
				mysqli_close($conn);
				
			?>
		</table>
	</div>
	<div style="margin-top: 20px;">
		<hr class="hr">
	</div>
</div>
</div>
</body>
</html>