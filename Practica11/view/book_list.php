<?php 
	include_once "header.php";
	if($logged_in)
	{
		$after_login=true;
		include_once "menu.php";
?>
	<div class="row">
	<div class="col s2"> </div>
	<div class="col s8"> 
	<br><br><br>
		<table class="highlight">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
<?php
		foreach($books as $book)
		{
?>
			<tr>
				<td><?php echo $book["title"]; ?></th>
				<td><?php echo $book["author"]; ?></th>
				<td><?php echo $book["description"]; ?></th>
				<td><a href="index.php?page=book_edit&id=<?php echo $book["id"]; ?>">Edit</a></th>
				<td><a href="index.php?page=book_delete&id=<?php echo $book["id"]; ?>">Delete</a></th>
			</tr>
<?php
		}
?>
		</table>
	</div>
	</div>
<?php
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
