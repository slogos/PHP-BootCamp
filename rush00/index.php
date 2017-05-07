<?php
session_start();
if ($_SESSION['loggued_on_user'] === "" || $_SESSION['loggued_on_user'] === null)
{
	$_SESSION['basket'][] = array();
?>
<html> 
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="side-container">
	<h1>Sign In</h1>
	<form action="login.php" method=POST>
		Username:<br>
		<input type='text' name='login' value="">
		<br>
		<br>
		Password:<br>
		<input type='password' name='passwd' value="">
		<br><br>
		<input type="submit" name='submit' value="OK">
	</form>
	<a href='create_login.html'>Create Account</a>
	<br>
<?php
}
else
{
	echo "<html>";
	echo "<head>";
	echo "<link rel='stylesheet' type='text/css' href='index.css'>";
	echo "</head>";
	echo "<body>";
	echo "<div class='side-container'>";
	echo "<h1>".$_SESSION['loggued_on_user']."</h1>";
	echo "<a href='lougout.php'>Log Out</a>";
	echo "<br>";
}
?>
	<a href='modif.html'>Change Password</a>
</div>
<div class="center-container">
	<form action="search.php" method=GET>
		<h2>Search</h2>
		<input id="search" type='text' name='item' value="">
		<input type="submit" name='submit' value="OK">
	</form>
	<hr/>
	<?php
	$items = unserialize(file_get_contents("private/items"));
	foreach($items as $item)
	{
		echo "<div class='item-container'>";
		echo "<p1>".$item['item']." - $".$item['price']."</p1>";
		echo "<form action='add_basket.php' method=GET>";
		echo "<input type='hidden' name='item' value='".$item."'>";
		echo "<input type='submit' name='submit' value='Add'>";
		echo "</form>";
		echo "</div>";
	}
	?>
</div>
<div class="side-container">
	<h2>Basket</h2>
	<?php
	foreach($_SESSION['basket'] as $item)
	{
		echo "<p>".$item['item']."</p>";
		echo "<br>";
	}
	?>
<div>
</body>
</html>
