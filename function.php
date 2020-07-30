<?php

function showdetails($standard,$rollno){
	include('dbcon.php');
	$sql="select * from studentnew where rollno='$rollno' and standard='$standard';";
	$run=mysqli_query($con,$sql);
	$row=mysqli_num_rows($run);
	if($row>0){
		$data=mysqli_fetch_assoc($run);
		?>
		<table align="center" width="80%" border="1" style="margin-top: 10px;">
		<tr style="background-color: #000;color: #fff;">
			<th>RollNo</th>
			<th>Image</th>
			<th>Name</th>
			<th>Contact No</th>
			<th>Standard</th>
			<th>City</th>
		</tr>
		<tr>
			<td><?php echo $data['rollno']; ?></td>
			<td><img src="dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['pcont']; ?></td>
			<td><?php echo $data['standard']; ?></td>
			<td><?php echo $data['city']; ?></td>
	</tr>
		<?php
	}
	else{
		echo "<script>alert('No records Found!!!');</script>";
	}

}

?>