<?php 
		include('../dbcon.php');
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
		
		$id=$_POST['sid'];
		


		echo "".$id;
		$query="update studentnew set rollno='$rollno',name='$name',city='$city',pcont='$pcon',standard='$std' where id=$id;";
		$run=mysqli_query($con,$query);
		if($run==true){
			?>

			<script>
				alert('Data Updated Successfully.');
			</script>
			<script>window.open('admindash.php','_self')</script>
			<?php
		}
?>