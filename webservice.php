<?php

include('Execution.php');
include('BufferLevel.php');
include('ThroughSeg.php');
header('Content-Type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

switch($_SERVER['REQUEST_METHOD']){
	case 'POST':
		
		$obj_php = json_decode(file_get_contents('php://input'));		
		
/*Insercao de Execution*/
		$executionInicialMetrics = $obj_php->executionInicialMetrics;
		$executionFinalMetrics = $obj_php->executionFinalMetrics;
		$mpdMetrics = $obj_php->mpdMetrics;
		$streamMetrics = $obj_php->streamMetrics;		
		$scenMetrics = $obj_php->scenMetrics;

		$execution_inicial_time = $executionInicialMetrics;
		$execution_final_time = $executionFinalMetrics;
		$algorithm = "ATC";
		$execution = new Execution;
		$execution->insertExecution($execution_inicial_time, $execution_final_time, $algorithm, $mpdMetrics, $streamMetrics, $scenMetrics);		
		$id_execution = mysql_insert_id();

/*Insercao de BufferLevel*/
		
		$bufferLevelMetrics = $obj_php->bufferLevelMetrics;
		$bufferLevel = new BufferLevel;

		foreach ( $bufferLevelMetrics as $buffer ) { 
			$bufferLevel->insertBufferLevel($buffer->t, $buffer->level, $id_execution);
		}

/*Insercao de ThroughSeg*/

		$throughSegMetrics = $obj_php->throughSegMetrics;
		$throughSeg = new ThroughSeg;

		foreach ( $throughSegMetrics as $through ) { 
			$throughSeg->insertThroughSeg($through->stream, $through->currentTime, $through->startTime, $through->responseTime, $through->finishTime, $through->sizeSeg, $through->duration, $through->quality, $through->bandwidth, $through->throughSeg, $id_execution );	
		}
	
	break;
	case 'GET':
		//echo "sudo python ". $_GET['comando'];
		exec("sudo ipfw -q flush");				
		exec("sudo ipfw -q pipe flush");
		exec("sudo /home/vod/dash_cenarios_scripts/setupdummy");				
		exec("sudo nohup python ".$_GET['comando']." &");
		return;
	break;
}
?>
