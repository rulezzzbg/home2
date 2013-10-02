<?php
include("include/config.inc.php");
include("include/logged.inc.php");

$target_file = $_upload_dir.basename($_GET['file']);

if ( is_file($target_file) )
{
	Header("Content-Type: application/octet-stream");
	Header("Content-Disposition: attachment; filename=\"".basename($target_file)."\""); 
	Header('Content-Length: ' . filesize($target_file));

	readfile($target_file);
}
else
{
	Header("Location: members.php");
	exit;
}
?>