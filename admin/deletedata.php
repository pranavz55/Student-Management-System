<?php 
		include('../dbcon.php');
		
		
		$sid=$_GET['sid'];

		echo "".$sid;
		$query="delete from studentnew where id='$sid'";
		$run=mysqli_query($con,$query);
		if($run==true){
			?>

			<script>
				alert('Data Deleted Successfully.');
			</script>
			<script>window.open('admindash.php','_self')</script>
			<?php
		}
?>