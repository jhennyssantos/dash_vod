<?php
include('Conect.php');

class BufferLevel{

    function BufferLevel()
	{
	}
	function insertBufferLevel($time, $level, $fk_execution)
	{
            $query="INSERT INTO dash_db2.dash_bufferlevel (time, level, fk_execution) values ('$time', '$level', '$fk_execution')";
            mysql_query($query);
			//echo $query;
    	}
	
	function deleteBufferLevel($fk_execution)
	{
		$query = "DELETE  FROM dash_db2.dash_bufferlevel WHERE fk_execution = '$fk_execution'";
		mysql_query($query);
	}
	
	
	function findBufferLevelExecution($id_execution)
	{
		$query = "SELECT * FROM dash_db2.dash_bufferlevel WHERE fk_execution = '$id_execution'";
		return $result = mysql_query($query);
	}	
	
	function getBufferLevel()
	{
		$query = " SELECT * FROM  dash_db2.dash_bufferlevel";
		return $result = mysql_query($query);
	}

}

?>
