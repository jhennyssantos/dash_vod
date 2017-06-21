<?php
include('Conect.php');

class ThroughSeg{

    function ThroughSeg()
	{
	}
	function insertThroughSeg($stream, $time, $start_time,  $response_time, $finish_time, $sizeSeg, $duration, $quality, $bandwidth, $throughseg, $fk_execution)
	{
            	$query="INSERT INTO dash_db2.dash_throughseg (stream, time, start_time,  response_time, finish_time, size_seg, duration, quality, bitrate , throughseg, fk_execution) values ('$stream', '$time', '$start_time', '$response_time', '$finish_time', '$sizeSeg', '$duration', '$quality', '$bandwidth', '$throughseg', '$fk_execution')";
            	mysql_query($query);
	    	//echo $query;
    	}
	
	function deleteThroughSeg($fk_execution)
	{
		$query = "DELETE  FROM dash_db2.dash_throughseg WHERE fk_execution = '$fk_execution'";
		mysql_query($query);
	}
	
	
	function findThroughSeg($fk_execution)
	{
		$query = "SELECT * FROM dash_db2.dash_throughseg WHERE fk_execution = '$fk_execution'";
		return $result = mysql_query($query);
	}	
	
	function getThroughSeg()
	{
		$query = " SELECT * FROM  dash_db2.dash_throughseg";
		return $result = mysql_query($query);
	}

}

?>
