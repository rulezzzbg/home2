<?php
include("include/config.inc.php");
include("include/logged.inc.php");

$html_title = "Качване на файл";
$nav_tab = "upload";
include("include/header.inc.php");

if ( $_POST )
{
	$error = "";
	$success = "";
	
	if ( !is_dir($_upload_dir) ) mkdir($_upload_dir);

	$target_file = $_upload_dir.$_FILES['file']['name'];
	
	if ( $_FILES['file']['name'] == "" )
	{
		$error .= "Моля изберете файл за качване.<br>";		
	}
	elseif ( $_FILES['file']['error'] > 0 )
	{
		$error .= "Грешка при качването. Моля опитайте отново.<br>";
	}
	elseif ( file_exists($target_file) )
	{
		$error .= "Файл <b>\"".$_FILES['file']['name']."\"</b> вече е качен на сървъра.";
	}
	
	if ( $error == "" )
	{
		if ( move_uploaded_file($_FILES['file']['tmp_name'], $target_file) )
		{
			$success .= "Файл <b>\"".$_FILES['file']['name']."\"</b> беше успешно качен на сървъра. <a href=\"members.php\">Вижте всички качени.</a>";
		}
		else
		{
			$error .= "Неуспешно качване, моля опитайте отново.";
		}
	}
}
?>

<div class="panel panel-default">
	<div class="panel-heading"><b>Качване на файл</b></div>
	<div class="panel-body">
		
		<?php
		if ( isset($error) ) show_error($error);
		if ( isset($success) ) show_success($success);
		?>

		<form role="form" enctype="multipart/form-data" method="post" action="upload.php">
			<div class="form-group">
				<input type="file" name="file">
				<p class="help-block">Изберете файл за качване.</p>
			</div>
			
			<input type="hidden" name="action" value="upload" class="hidden">
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	
	</div>
</div>

<?php
include("include/footer.inc.php");
?>