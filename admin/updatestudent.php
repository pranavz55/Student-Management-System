<?php
session_start();
if(isset($_SESSION['uid'])){
	echo "";
}
else{
	header('location:../login.php');
}

?>

<?php
include('header.php');
include('titlehead.php');
?>

<table align="center">
<form method="post" action="updatestudent.php">
	<tr>
		<th>Enter Standard</th>
		<td><input type="number" name="standard" placeholder="Enter standard" required></td>
	</tr>
	<tr>
		<th>Enter Name</th>
		<td><input type="text" name="stuname" placeholder="Enter Name" required></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Search" required></td>
	</tr>
	
</form>
</table>
<table align="center" width="80%" border="1" style="margin-top: 10px;">
	<tr style="background-color: #000;color: #fff;">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>
	</tr>
	<?php
	if(isset($_POST['submit'])){
		include('../dbcon.php');
		$std=$_POST['standard'];
		$name=$_POST['stuname'];

		$sql="select * from studentnew where standard='$std' and name like '%$name%';";
		$run=mysqli_query($con,$sql);
		$row=mysqli_num_rows($run);
		

		if($row<1){
			echo "<tr><td colspan='5'>No Records Found</tr></td>";
		}
		else{
			$count=0;
			while($data=mysqli_fetch_assoc($run)){
				$count++;
				?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['name']; ?></td>
					<td><a href="updateform.php?sid=<?php echo $data['id'];?>">Edit</a></td>
	</tr>
				<?php
			}
		}

	}
	?>


</table>
