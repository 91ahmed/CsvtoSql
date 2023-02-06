<?php
	require ('vendor/autoload.php');

	$csv = new Csv\Csvtosql\TransformCsv();
	$csv->file('files/sales.csv')
	    ->table('salse')
	    ->transform()
	    ->exportSQL('exported/sales.sql');
?>