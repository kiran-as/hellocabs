<?php
include('../application/conn.php');
$idlocaltravel = $_GET['idcabs'];
$result = mysql_query("Select a.*
from tbl_outstationcabs as a  where a.idcabs='$idlocaltravel'");
$i=0;	
	while($row = mysql_fetch_assoc($result))
	{
		 $carname = $row['carname'];
		$cartype = $row['cartype'];
		$perkm = $row['perkm'];
		$perhour = $row['perhour'];
		$carimage = $row['carimage'];
		$idcabs = $row['idcabs'];
		$i++;
	}
if($_POST)
{
  print_r($_POST);
  $carname = $_POST['carname'];
		$cartype = $_POST['cartype'];
		$perkm = $_POST['perkm'];
		$perhour = $_POST['perhour'];
		$carimage = $_POST['carimage'];
		$idcabs = $_GET['idcabs'];
		mysql_query("update tbl_cabs set carname='$carname',cartype='$cartype',perkm='$perkm',perhour='$perhour',
		carimage='$carimage' where idcabs=$idcabs");
		
}
?>
<html>
<head>
</head>
<body>
<form action='' id='addlocaldeaitails' name='addlocationdetails' method='POST'>
   <table>
      <tr>
	     <td><input type='text' name='carname' id='carname' value='<?php echo $carname;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='cartype' id='cartype' value='<?php echo $cartype;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='perkm' id='perkm' value='<?php echo $perkm;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='perhour' id='perhour' value='<?php echo $perhour;?>'></td>
	  </tr>
	  
	   <tr>
	     <td><input type='text' name='carimage' id='carimage' value='<?php echo $carimage;?>'></td>
	  </tr>
	 
	   <tr>
	     <td><input type='submit' name='Save' id='Save' value='Save'></td>
	  </tr>
   </table>
   </form>
</body>
</html>