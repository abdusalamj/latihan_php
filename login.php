<?php
session_start();
$x = [];
$x['email']="";
$x['password']="";
	//echo "<pre>".print_r($_POST,1)."</pre>";
if(isset($_POST['email'])){

$email = $_POST['email'];
$password = $_POST['password'];

if(trim($email)==""){
	$x['email'] = 'error_empty';
}
else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
	$x['email'] = "error_format";
}else{
	$x['email'] = "no_error";
}

if(trim($password)==""){
	$x['password'] = "password_empty";
}else if(strlen($password)<8){
	$x['password'] = 'password_length';
}//else if(){
// 	$x['password'] = 'password_restrict';
// }
	


if($email=="abdu"){
	if($password=="abdu") {
		$_SESSION['isLoggedIn'] = true;
		$_SESSION['email'] = $email;
		header("location:index.php?l=succes");
	}else{
		$_SESSION['isLogedIn'] = false;
		
	}
	}else{
		$_SESSION['isLogedIn'] = false;
		
	}

}

?>





<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
		<table>
			<tr>
				<td>E-Mail</td>
				<td><input type="text" 
				name="email"></td>
			</tr>

<?php
if($x['email']!="no_error"){ ?>
<tr>
	<td></td>
	<td>
	<?php switch($x['email']){
		case 'error_empty': ?>
		<span style="color:red">
		E-Mail Cannot be Blank
		</span>
		<?php break;
		case 'error_format': ?>
		<span style="color:red">
		E-Mail Format error
		</span>
		<?php break;
	}
	?>
	</td>
	</tr>	

<?php } ?>

			<tr>
				<td>Password</td>
				<td><input type="Password"
			 	name="password"></td>
			</tr>

<?php
if($x['password']!="no_error"){ ?>
<tr>
	<td></td>
	<td>
	<?php switch($x['password']){
		case 'password_empty': ?>
		<span style="color:red">
		Password Cannot be Blank
		</span>
		<?php break;
		case 'error_format': ?>
		<span style="color:red">
		Password Format error
		</span>
		<?php break;
	}
	?>
	</td>
	</tr>	

<?php } ?>

			<tr>
				<td></td>
				<td><button type="submit">Sign In</button></td>
			</tr>
		</table>
	</form>
</body>
</html>