<?php
include('../application/conn.php');
if($_POST)
{
        $carname = $_POST['carname'];
		$cartype = $_POST['cartype'];
		$perkm = $_POST['perkm'];
		$perhour = $_POST['perhour'];
		$carimage = $_POST['carimage'];
		$idlocation = $_POST['idlocation'];
		$type = $_POST['type'];
mysql_query('Insert into tbl_cabs (carname,cartype,perkm,perhour,status,carimage,type) values
 ("'.$carname.'","'.$cartype.'","'.$perkm.'","'.$perhour.'","Active","'.$carimage.'","'.$type.'")');
 
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
	  <td>
	  <select name='type' id='type' value=''>
	    <option value='airport'>Airport</option>
		<option value='outstation'>Outstation</option>
		<option value='both'>Both</option>
	  </select>
	  </td>
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