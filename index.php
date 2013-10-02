<?php
include("include/config.inc.php");

if ( is_logged() )
{
	go_members();
}

if ($_POST)
{
	$error = "";
	$user = get_var($_POST['user']);
	$pass = get_var($_POST['pass']);
	
	if ( login($user, $pass) )
	{
		go_members();
	}
	else
	{
		$error .= "Невалидно потребителско име или парола!";
	}
}

$html_title = "Вход";
include("include/header.inc.php");

if ( isset($error) ) show_error($error);
?>

	<form class="form-signin" method="post" action="index.php">
		<input type="text" class="form-control" placeholder="Потребителско име" autofocus name="user">
		<input type="password" class="form-control" placeholder="Парола" name="pass">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
	</form>

<?php
include("include/footer.inc.php");
?>