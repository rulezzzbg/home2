<?php
mb_internal_encoding("UTF-8");
session_start();

$_upload_dir = "uploads/".$_SESSION['user']."/";

$users[1]['user'] = "user";
$users[1]['pass'] = "qwerty";

$users[2]['user'] = "test";
$users[2]['pass'] = "test";

function is_logged()
{
	if ( isset($_SESSION) && get_var($_SESSION['is_logged']) == 1 )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function login($user, $pass)
{
	global $users;
	
	$valid = 0;
	
	if ( is_array($users) && count($users) > 0 )
	{
		foreach ( $users AS $key => $auth )
		{
			if ( $auth['user'] == $user && $auth['pass'] == $pass )
			{
				$valid = 1;
				break;
			}
		}
	}

	if ( $valid == 1 )
	{
		$_SESSION['is_logged'] = 1;
		$_SESSION['user'] = $user;

		return true;
	}
	else
	{
		return false;
	}
}

function go_members()
{
	Header("Location: members.php");
	exit;
}

function go_login()
{
	Header("Location: index.php");
	exit;
}

function get_var($var)
{
	return isset($var)?$var:"";
}

function show_error($error)
{
	if ( isset($error) && $error != "" )
	{
	?>
		<div class="alert alert-danger" style="width: 600px; clear: both; margin: auto;"><?=$error?></div>
	<?php
	}
}

function show_success($sucess)
{
	if ( isset($sucess) && $sucess != "" )
	{
	?>
		<div class="alert alert-info" style="width: 600px; clear: both; margin: auto;"><?=$sucess?></div>
	<?php
	}
}

function get_files()
{
	global $_upload_dir;

	$return = array();
	
	if ( is_dir($_upload_dir) )
	{
		$all = scandir($_upload_dir);
		$i = 0;

		foreach ( $all AS $key => $file )
		{
			$check = $_upload_dir.$file;

			if ( !is_dir($check) )
			{
				$return[$i]['name'] = $file;
				$return[$i]['size'] = filesize($check);
				$return[$i]['time'] = filemtime($check);
				$i++;
			}
		}
	}

	return $return;
}

function print_bytes($bytes)
{	
	$kb = 1024;
	$mb = 1024 * 1024;
	$gb = 1024 * 1024 * 1024;
	$tb = 1024 * 1024 * 1024 * 1024;
	
	if ( ($bytes >= 0) && ($bytes < $kb) )
	{
		return $bytes . ' B';
	}
	elseif ( ($bytes >= $kb) && ($bytes < $mb) )
	{
		return round($bytes/$kb, 2)." KB";
	}
	elseif ( ($bytes >= $mb) && ($bytes < $gb) )
	{
		return round($bytes/$mb, 2)." MB";
	}
	elseif ( ($bytes >= $gb) && ($bytes < $tb) )
	{
		return round($bytes/$gb, 2)." GB";
	}
	elseif ( $bytes >= $tb )
	{
		return round($bytes/$tb, 2)." TB";
	}
	else
	{
		return $bytes." B";
	}
}
?>