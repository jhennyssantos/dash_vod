<?php
include('Conect.php');

class Execution{

    function Execution()
	{
	}
	
	function insertExecution($execution_inicial_time, $execution_final_time, $algorithm, $url_mpd, $stream, $scenario)
	{
            	$query="INSERT INTO dash_db2.dash_execution (execution_inicial_time, execution_final_time, algorithm, url_mpd, stream, scenario) values ('$execution_inicial_time', '$execution_final_time', '$algorithm', '$url_mpd', '$stream', '$scenario')";
           	 mysql_query($query);
	    	//echo $query;
    	}
	
	function deleteExecution($id)
	{
		$query = "DELETE  FROM dash_db2.dash_execution WHERE id = '$id'";
		mysql_query($query);
	}
	
	
	function findExecution($id)
	{
		$query = "SELECT * FROM dash_db2.dash_execution WHERE id = '$id'";
		return $result = mysql_query($query);
	}	
	
	function getExecutions()
	{
		$query = " SELECT * FROM  dash_db2.dash_execution";
		return $result = mysql_query($query);
	}

}

?>
