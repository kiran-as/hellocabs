<?php
include('application/conn.php');
$resultgroundadmin = mysql_query("Select * from tbl_airportdestination");
$s=0;
while ($row = mysql_fetch_assoc($resultgroundadmin)) {
	  $arraygroundadmin[$s]["idairportdestination"]	= $row["idairportdestination"];
	  $arraygroundadmin[$s]["locationname"]	= $row["locationname"];
	  $s++;  
	}

	$sqlcity = mysql_query("Select * from tbl_city");
$s=0;
while ($row = mysql_fetch_assoc($sqlcity)) {
	  $arraycity[$s]["idcity"]	= $row["idcity"];
	  $arraycity[$s]["cityname"]	= $row["cityname"];
	  $s++;  
	}
	
$outstationarraysql = mysql_query("Select * from tbl_outstation");
$s=0;
while ($row = mysql_fetch_assoc($outstationarraysql)) {
	  $outstationcityname[$s]["idoutstation"]	= $row["idoutstation"];
	  $outstationcityname[$s]["outstationname"]	= $row["outstationname"];
	  $s++;  
	}

?>