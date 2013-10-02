<?php
include("include/config.inc.php");
include("include/logged.inc.php");

$html_title = "Списък файлове";
$nav_tab = "members";
include("include/header.inc.php");

$files = get_files();
?>

<div class="panel panel-default">
	<div class="panel-heading"><b>Списък качени файлове</b></div>
	<div class="panel-body">
		
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Име</th>
					<th width="100">Големина</th>
					<th width="180">Дата</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if ( isset($files) && is_array($files) && count($files) > 0 )
			{
				foreach ( $files AS $key => $row )
				{
				?>
					<tr>
						<td><span class="glyphicon glyphicon-file"></span> <a href="download.php?file=<?=$row['name']?>" target="_blank"><?=$row['name']?></a></td>
						<td align="right"><?=print_bytes($row['size'])?></td>
						<td align="center"><?=date("d.m.Y H:i:s", $row['time'])?></td>
					</tr>
				<?php
				}
			}
			else
			{
			?>
				<tr>
					<td colspan="3" align="center">Няма качени файлове на сървъра. <a href="upload.php">Качете сега?</a></td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>

	</div>
</div>


<?php
include("include/footer.inc.php");
?>