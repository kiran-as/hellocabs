<?php
include('../application/conn.php');
$result = mysql_query("Select a.*,b.* 
from tbl_localtravel as a, tbl_location as b 
where a.idlocation=b.idlocation and a.status='Active' group by b.idlocation");
$i=0;	
	while($row = mysql_fetch_assoc($result))
	{
		$localarraydetails[$i]['city'] = $row['city'];
		$localarraydetails[$i]['idlocation'] = $row['idlocation'];
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
		    <td><?php echo $localarraydetails[$i]['city'];?></td>
			<td><?php echo $localarraydetails[$i]['city'];?></td>
			<td><a href='localindex.php?idlocation=<?php echo $localarraydetails[$i]['idlocation'];?>'>Edit</td>
		</tr>
	   <?php }?>
   </table>
</body>
</html>