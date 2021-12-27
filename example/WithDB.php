<?php

	header("content-type:application/json");
	require_once(__DIR__."/../vendor/autoload.php");

	$config = require_once("config.php");

	use ETL\Load\Loader;
	use ETL\Load\JSON;
	use ETL\Load\CSV;
	use Lib\Connection;
	use Lib\MySQL;
	use Lib\PostgreSQL;

	$MySQL = new Connection(MySQL::class,$config);
	$Customer = $MySQL->query("SELECT * FROM T_CUSTOMER")->fetchList();

	$iterator = new ETL\Extract\SQLIterator($Customer);

	$ChainProcess = new ETL\Transform\ChainProcess($iterator);

	$finalData = $ChainProcess->setData()->getData();
	echo $finalDataJSON = $finalData->convertTo(new Loader(JSON::class));
	$finalDataCSV = $finalData->convertTo(new Loader(CSV::class)); //generate a csvData in the example Folder