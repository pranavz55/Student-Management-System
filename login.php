<?php
session_start();
if(isset($_SESSION['uid'])){
	header('location:admin/admindash.php');
}
?>

<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
	<h1 align="center">Admin Login</h1>
	<form method="post" action=login.php>
		<table align="center">
			<tr>
				<td>Username</td><td><input type="text" name="uname" required></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="Password" name="pass" required></td>
			</tr>
			<tr>
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
include('dbcon.php');

if(isset($_POST['login'])){
	$username=$_POST['uname'];
	$password=$_POST['pass'];

	echo "".$username;
	echo "".$password;
	$query="select * from admin where username = '$username' and password = '$password';";
	$run=mysqli_query($con,$query);
	$row=mysqli_num_rows($run);
	echo $row;

	if($row<1){
		?>
		<script>alert('Username or Password does not match !!')</script>
		<script>window.open('login.php','_self')</script>
		<?php 
	}
	else{
		$data=mysqli_fetch_assoc($run);

		$id=$data['id'];
		echo "id".$id;

		session_start();
		$_SESSION['uid']=$id;
		echo "".$_SESSION['uid'];
		header('location:admin/admindash.php');
	}
}
?>