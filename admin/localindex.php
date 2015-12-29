<?php
include('../application/conn.php');
$idlocation = $_GET['idlocation'];
$result = mysql_query("Select a.*,b.* 
from tbl_localtravel as a, tbl_location as b 
where a.idlocation=b.idlocation and a.status='Active' and b.idlocation='$idlocation'");
$i=0;	
	while($row = mysql_fetch_assoc($result))
	{
		$localarraydetails[$i]['carname'] = $row['carname'];
		$localarraydetails[$i]['cartype'] = $row['cartype'];
		$localarraydetails[$i]['perkm'] = $row['perkm'];
		$localarraydetails[$i]['perhour'] = $row['perhour'];
		$localarraydetails[$i]['8hours'] = $row['eighthours'];
		$localarraydetails[$i]['10hours'] = $row['tenhours'];
		$localarraydetails[$i]['halfday'] = $row['halfday'];
		$localarraydetails[$i]['fullday'] = $row['fullday'];
		$localarraydetails[$i]['2day'] = $row['twoday'];
		$localarraydetails[$i]['3day'] = $row['threeday'];
		$localarraydetails[$i]['4day'] = $row['fourday'];
		$localarraydetails[$i]['5day'] = $row['fiveday'];
		$localarraydetails[$i]['6day'] = $row['sixday'];
		$localarraydetails[$i]['7day'] = $row['sevenday'];
		$localarraydetails[$i]['carimage'] = $row['carimage'];
		$localarraydetails[$i]['idlocation'] = $row['idlocation'];
		$localarraydetails[$i]['idlocaltravel'] = $row['idlocaltravel'];
		$i++;
	}
print_r($localarraydetails);
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
			<td><a href='editlocationdetails.php?idlocaltravel=<?php echo $localarraydetails[$i]['idlocaltravel'];?>'>Edit</td>
		</tr>
	   <?php }?>
   </table>
</body>
</html>