<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>

<?php
		if($status=="before_submission" or $status=="failure")
		{
?>


	<div class="row">
	<div class="col s3"></div>
	<div class="col s6">
	<br><br><h5>Please fill up the following form to update your profile</h5>
	<br>
	<form method="post">
		<fieldset>
			
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="<?php echo $profile[0]["name"]; ?>">
			<font color="red"><?php echo $errors["name"]; ?></font>
			<br>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="<?php echo $profile[0]["username"]; ?>" readonly="true">
			<font color="red"><?php echo $errors["username"]; ?></font>
			<br>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			<font color="red"><?php echo $errors["password"]; ?></font>
			<br>
			[Fill up only if you want to change it]
			<br>
			<input type="hidden" name="page" value="profile">
			<input type="hidden" name="caller" value="self"><br>
			<center><button class="btn btn-large waves-effect waves-light" type="submit" name="action">Update</button></center>
		</fieldset>
	</form>
	</div>
	</div>
<?php
		}
		else
		{
?>
		<br><center><h3>Profile Updated</h3></center>
<?php
		}
	}
	else
	{
		$before_login=true;
		include_once "menu.php";
?>
<h3>Invalid Login!!! Try Again.</h3>
<?php
	}
	include_once "footer.php";
?>
