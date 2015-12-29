<?php
include('../application/conn.php');
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
mysql_query('Insert into tbl_localtravel (carname,cartype,perkm,perhour,eighthours,tenhours,halfday,fullday,
  twoday,threeday,fourday,fiveday,sixday,sevenday,carimage,idlocation) values ("'.$carname.'","'.$cartype.'","'.$perkm.'",
  "'.$perhour.'","'.$eighthours.'","'.$tenhours.'","'.$halfday.'","'.$fullday.'","'.$twoday.'","'.$threeday.'","'.$fourday.'",
  "'.$fiveday.'","'.$sixday.'","'.$sevenday.'","'.$carimage.'","'.$idlocation.'")');
 
}
?>
<html>
<head>
</head>
<body>
<form action='' id='addlocaldeaitails' name='addlocationdetails' method='POST'>
   <table>
      <tr>
	     <td><input type='text' name='carname' id='carname' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='cartype' id='cartype' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='perkm' id='perkm' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='perhour' id='perhour' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='8hours' id='8hours' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='10hours' id='10hours' value=''></td>
	  </tr>
	        <tr>
	     <td><input type='text' name='halfday' id='halfday' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='fullday' id='fullday' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='2day' id='2day' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='3day' id='3day' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='4day' id='4day' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='5day' id='5day' value=''></td>
	  </tr>
	  	   <tr>
	     <td><input type='text' name='6day' id='6day' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='7day' id='7day' value=''></td>
	  </tr>
	   <tr>
	     <td><input type='text' name='carimage' id='carimage' value=''></td>
	  </tr>
	 
	   <tr>
	     <td><input type='submit' name='Save' id='Save' value='Save'></td>
	  </tr>
   </table>
   </form>
</body>
</html>