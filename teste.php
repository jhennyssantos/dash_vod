<?php
include('Execution.php');
include('BufferLevel.php');
include('ThroughSeg.php');

		$arq_json = '{"bufferLevelMetrics":[{"t":"2015-01-09T19:09:02.517Z","level":0},{"t":"2015-01-09T19:09:02.562Z","level":4.0867109298706055},{"t":"2015-01-09T19:09:02.617Z","level":4.0867109298706055},{"t":"2015-01-09T19:09:02.621Z","level":8.173422813415527},{"t":"2015-01-09T19:09:02.683Z","level":8.173422813415527},{"t":"2015-01-09T19:09:02.849Z","level":8.095888813415527},{"t":"2015-01-09T19:09:02.996Z","level":7.947818813415528},{"t":"2015-01-09T19:09:03.097Z","level":7.8470778134155275},{"t":"2015-01-09T19:09:03.361Z","level":7.589824813415527},{"t":"2015-01-09T19:09:03.603Z","level":7.345244813415527},{"t":"2015-01-09T19:09:03.848Z","level":7.096329813415528},{"t":"2015-01-09T19:18:49.896Z","level":301.0311750429687},{"t":"2015-01-09T19:18:50.151Z","level":300.77678704296875},{"t":"2015-01-09T19:18:50.400Z","level":300.53020904296875},{"t":"2015-01-09T19:18:50.648Z","level":300.27967504296873},{"t":"2015-01-09T19:18:50.898Z","level":300.0291090429688}], "throughSegMetrics":[{"index":null,"stream":"audio","currentTime":"2015-01-09T19:09:02.503Z","startTime":"2015-01-09T19:09:02.456Z","responseTime":"2015-01-09T19:09:02.492Z","finishTime":"2015-01-09T19:09:02.500Z","range":"3622-56041","duration":4.040272108843538,"quality":0,"bandwidth":100,"throughSeg":50503.40136054422},{"index":null,"stream":"audio","currentTime":"2015-01-09T19:09:02.552Z","startTime":"2015-01-09T19:09:02.532Z","responseTime":"2015-01-09T19:09:02.546Z","finishTime":"2015-01-09T19:09:02.549Z","range":"56042-108275","duration":4.08671201814059,"quality":0,"bandwidth":100,"throughSeg":136223.73393801966},{"index":null,"stream":"audio","currentTime":"2015-01-09T19:09:04.462Z","startTime":"2015-01-09T19:09:04.444Z","responseTime":"2015-01-09T19:09:04.456Z","finishTime":"2015-01-09T19:09:04.458Z","range":"108276-160642","duration":4.08671201814059,"quality":0,"bandwidth":100,"throughSeg":204335.6009070295}]}';
		
		$obj_php = json_decode($arq_json);		
	
/*Insercao de Execution*/
		$execution_time = date('Y-m-d H:i:s');
		$algorithm = "TESTE";
		$execution = new Execution;
		$execution->insertExecution($execution_time, $execution_time, $algorithm, "teste", "teste", "teste");		
		$id_execution = mysql_insert_id();

/*Insercao de BufferLevel*/
		
		$bufferLevelMetrics = $obj_php->bufferLevelMetrics;
		$bufferLevel = new BufferLevel;

		echo "BufferMetrics"; 
		foreach ( $bufferLevelMetrics as $buffer ) { 
			echo $buffer->t, $buffer->level, $id_execution; 
			$bufferLevel->insertBufferLevel($buffer->t, $buffer->level, $id_execution);
		}

/*Insercao de ThroughSeg*/

		$throughSegMetrics = $obj_php->throughSegMetrics;
		$throughSeg = new ThroughSeg;
		echo "throughSegMetrics"; 
		foreach ( $throughSegMetrics as $through ) { 
			echo $through->stream, $through->currentTime, $through->startTime, $through->responseTime, $through->finishTime, $through->range, $through->duration, $through->quality, $through->bandwidth, $through->throughSeg, $id_execution; 
			$throughSeg->insertThroughSeg($through->stream, $through->currentTime, $through->startTime, $through->responseTime, $through->finishTime, $through->range, $through->duration, $through->quality, $through->bandwidth, $through->throughSeg, $id_execution );	
		}
	

?>
