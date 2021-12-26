<?php
	require_once(__DIR__."/../vendor/autoload.php");

	use ETL\Load\Loader;
	use ETL\Load\JSON;
	use ETL\Load\CSV;


	$csv = new ETL\Extract\CsvIterator("persona.csv");
	$excel = new ETL\Extract\ExcelIterator("masiva.xlsx");

	$fieldsIN = ["destinatario","provincia","canton","distrito|rule:DropText","direccion_exacta","telefono1","telefono2","envia","usuario"];
	$fieldsDelete = ["provincia" => "","canton" => ""];

	$ChainExcel = new ETL\Transform\ChainProcess($excel,$fieldsIN,$fieldsDelete);
	$ChainExcel->addRules("DropText",function($value){
		return preg_replace("/[^0-9]/", "", $value );
	});

	$fieldsINCSV = ["nro_identificacion","nombre_completo","foto","tlf_fijo","celular","provincia","canton","distrito","direccion","correo","fecha_ingreso","sexo","fecha_nac","estado_civil"];
	$fieldsDeleteCSV = ["foto" => "","tlf_fijo" => "","celular" => "","direccion" => "","correo" => ""];
	$ChainCSV = new ETL\Transform\ChainProcess($csv,$fieldsINCSV,$fieldsDeleteCSV);

	$finalDataExcel = $ChainExcel->process()->getData();
	$finalDataJSON = $finalDataExcel->convertTo(new Loader(new JSON()));
	$finalDataCSV = $finalDataExcel->convertTo(new Loader(new CSV()));

	echo $finalDataJSON;