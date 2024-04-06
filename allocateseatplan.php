<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

		.hr{
			margin-top: 10px;
			margin-left: 20px;
			margin-right: 20px;
			height: 3px;
			background: darkgreen;
		}
		 .title{
			font-size: 20px;
			
			font-weight: bold;
			margin-top: 20px;
		}
		.border{
			margin-right: 50px;
			border: 2px solid black;
			height: 400px;
		}
		.space{
			margin: 10px;
		}
		.img{
			float: left;
			margin-left: 50px;
			margin-top: 40px;
			
		}
		#form{
			margin-left: 350px;
			margin-top: 50px;
			font-size: 15px;

		}
	</style>
	<script type="text/javascript" src="js/allocateseatplan.js"></script>
</head>
<body>
		  <?php include "adminSlide.php"; ?>
		  <div style="margin-left: 220px; margin-top: 60px; margin-bottom: 30px;">

	<ul class="start">
		<li>
			<div class="container">
				<h1 class="title" style="margin-left: 300px;"><p><b>Row seat plan management</b></p></h1>
			</div>
		</li>
	</ul>

	<div class="container">
		<hr class="hr">
	</div>
<!-- -------------------------------------------------------------------------- -->
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

        $countSQL2="SELECT COUNT(id) as 'r' FROM seatplan ";
        $countRES2=mysqli_query($con, $countSQL2);
        $count2=mysqli_fetch_array($countRES2);
        $Tid=$count2['r'];

   $roomsql="select * from seatplan";
   $resultsql=mysqli_query($con,$roomsql);
   $rowsql=mysqli_num_rows($resultsql);

   $rno =array($Tid);
   $i=1;

    if($rowsql>0){
    while($rowsql = mysqli_fetch_array($resultsql)){ 
    		$rno[$i]= $rowsql['roomno'];
    		$i++;
		}
	}

// for ($i=1; $i<=$Tid ; $i++) { 
// 	echo $rno[$i];echo " |	";
// }
// // ------------------------row/seat left or not-----------------------
// 	$dep1diff=0;
// 	$dep2diff=0;
// 	$rowT=0;
// 	$rowremain=0;
// 	$roomonSP=0;

// 	      $MAXid="SELECT MAX( id ) as 'maxid' FROM `seatplan`";
//           $resultMAXid= mysqli_query($con,$MAXid);
//           $rowMAXid=mysqli_fetch_array($resultMAXid);
//           $idMAX=$rowMAXid['maxid'];
// echo "$idMAX  ";

// echo "$dep1diff  ";
// 		$rmsql="select * from room where roomno=$roomonSP";
// 		$restrmsql=mysqli_query($con,$rmsql);
// 		$row=mysqli_num_rows($restrmsql);
// 		if($row>0){
// 			while($row = mysqli_fetch_array($restrmsql)){
// 				$rowT=$row['row'];
// 			}
// 		}
// echo "$rowT  ";
// 		if ($dep1diff<$rowT) {
// 			$Column=1;
// 			$rowremain=$rowT-$dep1diff;
// 			echo $rowremain." at column 1";
// 		}else{
// 			$Column=2;
// 			$rowremain=$rowT*2-$dep1diff;
// 			echo $rowremain." at column 2";
// 		}
		

?> 

<!-- ---------------------------------------------------------------------- -->
	<div class="border">
		<div style="margin-top: 20px; margin-left: 450px;font-size: 15px;">
				<label><b><u>Row Seat Plan</u></b></label>
		</div>
		<div class="img">
			<div >
				<img src="image/hor.png">
			</div>
		</div>
<!-- -----------------------------form --------------------------------------->
		<div id="form">
			  <form  action="rowseatplan.php" method="POST">
				 <div class="space">
					<label>start room-no : 
						<select name="room" required style="width: 150px;">
							<option value="">room no</option>
			<?php	
							$sql="SELECT roomno,block FROM room ";
							$result=mysqli_query($con,$sql);
							$row=mysqli_num_rows($result);
							if($row>0){
							while($row = mysqli_fetch_array($result)){
								$room=$row['roomno'];

								$reserve=0;
								for ($a=1; $a<=$Tid; $a++) { 
									if($rno[$a]==$room){
										$reserve=1;;
									}
								}
            ?>
                    <option value="<?php echo $row['roomno']; ?>" <?php if($reserve == 1) {
                    	//if ($roomonSP!=$room && $rowremain!=0) {
                    		echo "disabled";
                    	//}
                    } ?> >
            <?php 
              			echo $row['roomno'];
              			if ($reserve == 1) {
              				echo "  -  Reserve";
              			}
            ?>  
               		</option>
               			<?php   						
             				  }
							}
						?>
						</select>

						<!-- <input type="number" name="room" required >-->     
					 </label> 
				</div>

				<div class="space">
					<label>department :
						<select name="dep1" id="dep1" required="required"  onclick="subject1()">
							<option value="">Select Department</option>
							<option value="IT">IT</option>
							<option value="SE">SE</option>
							<option value="CE">CE</option>
						</select>
						 &
						 <select name="dep2" id="dep2" required="required"  onclick="subject2()">
							<option value="">Select Department</option>
							<option value="IT">IT</option>
							<option value="SE">SE</option>
							<option value="CE">CE</option>
						</select>

					<!--  <input type="text" name="dep1" id="dep1" required> & <input type="text" name="dep2" id="dep2" required></label> -->

				</div>

				<div class="space">
					 <label> Semester : 
                		<input type="number" name="sem1" id="sem1" required style="width: 150px;" onclick="subject1()" > & 
               			 <input type="number" name="sem2" id="sem2" style="width: 150px;" required onclick="subject2()" >   
          			</label>
				</div>
<!------ ------------------value of department ,semester and subject------ -->
				
	<?php 	
	$d=1;
	$sem=500;
	$sub=1000;
	    $countSQL1="SELECT COUNT( id) as 'i' FROM subject ";
        $countRES1=mysqli_query($con, $countSQL1);
        $count1=mysqli_fetch_array($countRES1);
        $totalid=$count1['i'];

			$sql="SELECT * FROM subject";
			$result=mysqli_query($con,$sql);
			$row=mysqli_num_rows($result);
			for ($i=1; $i <=$totalid; $i++) { 
				if($row>0){
					while($row = mysqli_fetch_array($result)){
	?>
	<input type="text" id="<?php echo $d; ?>" value="<?php echo $row['department']; ?>" hidden>
	<input type="text" id="<?php echo $sem; ?>" value="<?php echo $row['semester']; ?>" hidden>
	<input type="text" id="<?php echo $sub; ?>" value="<?php echo $row['subject']; ?>" hidden>
	<?php
						break;
					}
				}
				$d++;
				$sem++;
				$sub++;
			}
	?>

	<input type="text" name="idpass" id="id" value="<?php echo $totalid; ?>" hidden>
 <!-- --------------------------------------------------------------------- -->
        		<div class="space">
         			<label>Subject : 
         			 <select name="sub1" id="s1" required="required" style="width: 150px;">
         			 </select>
         			 		&
         			 <select name="sub2" id="s2" required="required" style="width: 150px;">
         			 </select>
         			</label>
       			 </div>

				<div class="space">
					<button type="submit" name="OK" style="margin-left: 35%;">OK</button>
				</div>
<!-- ----------------------------------------------- -->
			</form>
		</div>
	</div>
<!-- -------------------------------------------------------------------------------- -->
</div>

</body>
</html>