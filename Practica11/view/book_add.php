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
	<br><br><h5>Please fill up the following form to add new book</h5>
	<br>
	<form method="post">
		<fieldset>
						<label for="title">Title</label>
			<input type="text" name="title" id="title" value="<?php echo $_REQUEST["title"]; ?>">
			<font color="red"><?php echo $errors["title"]; ?></font>
			<br>
			<label for="author">Author</label>
			<input type="text" name="author" id="author" value="<?php echo $_REQUEST["author"]; ?>">
			<font color="red"><?php echo $errors["author"]; ?></font>
			<br>
			<label for="description">Description</label>
			<input type="text" name="description" id="description" value="<?php echo $_REQUEST["description"]; ?>">
			<font color="red"><?php echo $errors["description"]; ?></font>
			<br>
			<input type="hidden" name="page" value="book_add">
			<input type="hidden" name="caller" value="self"><br>
			<center><button class="btn btn-large waves-effect waves-light" type="submit" name="action">Save</button></center>
			</form>
		</fieldset>
	</div>
	</div>

<?php
		}
		else
		{
?>
		<br><center><h3>Book Saved</h3></center>
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
