<?php
include('../application/conn.php');
$idlocaltravel = $_GET['idlocaltravel'];
$result = mysql_query("Select a.*,b.* 
from tbl_localtravel as a, tbl_location as b 
where a.idlocation=b.idlocation and a.status='Active' and a.idlocaltravel='$idlocaltravel'");
$i=0;	
	while($row = mysql_fetch_assoc($result))
	{
		 $carname = $row['carname'];
		$cartype = $row['cartype'];
		$perkm = $row['perkm'];
		$perhour = $row['perhour'];
		$eighthours = $row['eighthours'];
		$tenhours = $row['tenhours'];
		$halfday = $row['halfday'];
		$fullday = $row['fullday'];
		$twoday = $row['twoday'];
		$threeday = $row['threeday'];
		$fourday = $row['fourday'];
		$fiveday = $row['fiveday'];
		$sixday = $row['sixday'];
		$sevenday = $row['sevenday'];
		$carimage = $row['carimage'];
		$idlocation = $row['idlocation'];
		$i++;
	}
if($_POST)
{
  print_r($_POST);
  $carname = $_POST['carname'];
		$cartype = $_POST['cartype'];
		$perkm = $_POST['perkm'];
		$perhour = $_POST['perhour'];
		$eighthours = $_POST['8hours'];
		$tenhours = $_POST['10hours'];
		$halfday = $_POST['halfday'];
		$fullday = $_POST['fullday'];
		$twoday = $_POST['2day'];
		$threeday = $_POST['3day'];
		$fourday = $_POST['4day'];
		$fiveday = $_POST['5day'];
		$sixday = $_POST['6day'];
		$sevenday = $_POST['7day'];
		$carimage = $_POST['carimage'];
		$idlocation = $_POST['idlocation'];
		mysql_query("update tbl_localtravel set carname='$carname',cartype='$cartype',perkm='$perkm',perhour='$perhour',
		eighthours='$eighthours',tenhours='$tenhours',halfday='$halfday',fullday='$fullday',twoday='$twoday',
		threeday='$threeday',fourday='$fourday',fiveday='$fiveday',sixday='$sixday',sevenday='$sevenday',
		carimage='$carimage' where idlocaltravel=$idlocaltravel");
		
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
	     <td><input type='text' name='8hours' id='8hours' value='<?php echo $eighthours;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='10hours' id='10hours' value='<?php echo $tenhours;?>'></td>
	  </tr>
	        <tr>
	     <td><input type='text' name='halfday' id='halfday' value='<?php echo $halfday;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='fullday' id='fullday' value='<?php echo $fullday;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='2day' id='2day' value='<?php echo $twoday;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='3day' id='3day' value='<?php echo $threeday;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='4day' id='4day' value='<?php echo $fourday;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='5day' id='5day' value='<?php echo $fiveday;?>'></td>
	  </tr>
	  	   <tr>
	     <td><input type='text' name='6day' id='6day' value='<?php echo $sixday;?>'></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='7day' id='7day' value='<?php echo $sevenday;?>'></td>
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