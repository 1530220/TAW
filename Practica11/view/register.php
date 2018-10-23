<?php 
	include_once "header.php";
	$before_login=true;
	include_once "menu.php";
?>

<?php
	if($status=="before_submission" or $status=="failure")
	{
?>

	<div class="row">
	<div class="col s3"></div>
	<div class="col s6">
	<br><br><h5>Please fill up the following form to register yourself</h5>
	<br>
	<form method="post">
		<fieldset>
			
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="<?php echo $_REQUEST["name"]; ?>">
			<font color="red"><?php echo $errors["name"]; ?></font>
			<br>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?php echo $_REQUEST["username"]; ?>">
			<font color="red"><?php echo $errors["username"]; ?></font>
			<br>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			<font color="red"><?php echo $errors["password"]; ?></font>
			<br>
			<input type="hidden" name="page" value="register">
			<input type="hidden" name="caller" value="self"><br>
			<center><button class="btn btn-large waves-effect waves-light" type="submit" name="action">Sign up</button></center>
		</fieldset>
	</form>
	</div>
	</div>
<?php
	}
	else
	{
?>
		<br><center><h3>Registration Successful</h3></center>
<?php
	}
?>

<?php
	include_once "footer.php";
?>
