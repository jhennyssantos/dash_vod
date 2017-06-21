<?php

	//$hostname = '10.208.200.92';
	//$username = 'root';
	//$senha = 'vod102030';
	//$banco1 = 'dash_db';

	$hostname = 'localhost';
	$username = 'root';
	$senha = 'root';
	$banco1 = 'dash_db2';

	$db = mysql_connect ($hostname, $username, $senha)or die ('Erro ao Conectar com database');

	mysql_select_db ($banco1) or die ('Erro ao Selecionar Banco');

?>
