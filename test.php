<?php
	require ('ExportCsv.php');

	$csv = new ExportCsv();
	$csv->file('files/sales.csv')
	    ->driver('mysql')
	    ->table('salse')
	    ->transform()
	    ->exportSQL('exported/sales.sql');
?>