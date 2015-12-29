<?php
include('../application/conn.php');
$result = mysql_query("Select a.*
from tbl_outstationcabs as a  where  a.status='Active'");
$i=0;	
	while($row = mysql_fetch_assoc($result))
	{
		$localarraydetails[$i]['idcabs'] = $row['idcabs'];
		$localarraydetails[$i]['carname'] = $row['carname'];
		$localarraydetails[$i]['cartype'] = $row['cartype'];
		$i++;
	}

?>
<html>
<head>
</head>
<body>
   <table>
      <tr>
	      <th>Name</th>
		  <th>car type</th>
		  <th>Action</th>
	   </tr>
	   <?php for($i=0;$i<count($localarraydetails);$i++){?>
	    <tr>
		    <td><?php echo $localarraydetails[$i]['carname'];?></td>
			<td><?php echo $localarraydetails[$i]['cartype'];?></td>
			<td><a href='editoutstationcars.php?idcabs=<?php echo $localarraydetails[$i]['idcabs'];?>'>Edit</td>
		</tr>
	   <?php }?>
   </table>
</body>
</html>