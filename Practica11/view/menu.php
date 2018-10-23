<?php
	if($before_login)
	{
?>


<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><i class="large material-icons" style="font-size: 50px">library_books</i>Book Management System</a>
	<br>
    </div>
    <div class="nav-content">
	<br>
      <ul class="tabs tabs-transparent hide-on-med-and-down">
        <li class="tab"><a href="index.php?page=index">Home</a></li>
        <li class="tab"><a href="index.php?page=register">Register</a></li>
        <li class="tab"><a href="index.php?page=login">Login</a></li>
        <li class="tab"><a href="index.php?page=forgot_password">Forgot Password</a></li>
      </ul>
    </div>
  </nav>
<?php
	}
	else if($after_login)
	{
?>

<nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><i class="large material-icons" style="font-size: 50px">library_books</i>Book Management System</a>
	<br>
    </div>
    <div class="nav-content">
	<br>
      <ul class="tabs tabs-transparent hide-on-med-and-down">
        <li class="tab"><a href="index.php?page=home">Home</a></li>
	<li class="tab"><a href="index.php?page=profile">Profile</a></li>
	<li class="tab"><a href="index.php?page=book_add">Add Book</a></li>
	<li class="tab"><a href="index.php?page=book_list">List Book</a></li>
	<li class="tab"><a href="index.php?page=logout">Logout</a></li>
      </ul>
    </div>
  </nav>
<?php
	}
?>
