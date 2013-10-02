<!DOCTYPE html>
<html>
	<head>
		<title><?=$html_title?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">

		<!--[if lt IE 9]>
			<script src="../../assets/js/html5shiv.js"></script>
			<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			
			<?php
			if ( is_logged() )
			{
			?>
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<a class="navbar-brand">Здравейте, <?=$_SESSION['user']?>!</a>
					</div>

					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li<?=$nav_tab=="members"?" class=\"active\"":""?>><a href="members.php">Списък файлове</a></li>
							<li<?=$nav_tab=="upload"?" class=\"active\"":""?>><a href="upload.php">Качи нов файл</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php">Изход</a></li>
						</ul>
					</div>
				</nav>
			<?php
			}
			?>