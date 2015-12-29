<?php
include('application/conn.php');
include('include/dropdown.php');
 $i = 0;
 if($_GET['type']==1)
 {
    $result = mysql_query("Select * from tbl_cabs where type in ('local','all')");
	while($row = mysql_fetch_assoc($result))
	{
	  $localarray[$i]['idcabs'] = $row['idcabs'];
	  $localarray[$i]['carname'] = $row['carname'];
	  $localarray[$i]['carimage'] = $row['carimage'];
	  $localarray[$i]['cartype'] = $row['cartype'];
	  $localarray[$i]['perkm'] = $row['perkm'];	 
	  $localarray[$i]['perhour'] = $row['perhour'];	 
	  $i++;	  
	}
 }	

 if($_GET['type']==2)
 {
    $result = mysql_query("Select * from tbl_cabs where type in ('airport','all') and idcabs not in (11)");
	while($row = mysql_fetch_assoc($result))
	{
	  $airportarray[$i]['idcabs'] = $row['idcabs'];
	  $airportarray[$i]['carname'] = $row['carname'];
	  $airportarray[$i]['carimage'] = $row['carimage'];
	  $airportarray[$i]['cartype'] = $row['cartype'];
	  $airportarray[$i]['perkm'] = $row['perkm'];	 
	  $airportarray[$i]['perhour'] = $row['perhour'];	 
	  $i++;	  
	}
 }

  if($_GET['type']==3)
 {
	$result = mysql_query("Select * from tbl_cabs where type in ('outstation','all')");
	while($row = mysql_fetch_assoc($result))
	{
	  $outstationarray[$i]['idcabs'] = $row['idcabs'];
	  $outstationarray[$i]['carname'] = $row['carname'];
	  $outstationarray[$i]['carimage'] = $row['carimage'];
	  $outstationarray[$i]['cartype'] = $row['cartype'];
	  $outstationarray[$i]['perkm'] = $row['perkm'];	
	  $outstationarray[$i]['totalfare'] = ceil($row['perkm'] * $totalkilometers);		  
	  $outstationarray[$i]['perhour'] = $row['perhour'];	 
	   $outstationarray[$i]['minfare'] = $row['minfare'];	
	  $i++;	  
	}

    
 }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Cabs</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src='include.js' type='text/javascript'></script>
   <?php include('include/jsvalidations.php');?>	
<script type='text/javascript'>
function fnValidateFormList()
{
   var flag=0;
   var areavalue = document.getElementById('area').value;
   var address = document.getElementById('address').value;
   var email = document.getElementById('email').value;
   var phone = document.getElementById('phone').value;
   var contanctname = document.getElementById('contanctname').value;

   
   if(areavalue=='')
   {
      alert('The area should not be empty'); 
      flag=1;	  
   }
   else if(address=='')
   {
      alert('The Address should not be empty'); 
      flag=1;
   }
   else if(email=='')
   {
      alert('The Email should not be empty'); 
      flag=1;
   }
   else if(phone=='')
   {
      alert('The Phone should not be empty'); 
      flag=1;
   }
   else if(contanctname=='')
   {
      alert('The ConactName should not be empty'); 
      flag=1;
   }
   else{
      flag = 0;
	  journeydate = '<?php echo $_GET['datepkr'];?>';
	  localtime = '<?php echo $_GET['localtime'];?>';
	   formData='contanctname='+contanctname+'&phone='+phone+'&email='+email+'&address='+address+'&journeydate='+journeydate+'&localtime='+localtime;
	   $.ajax({
		url : "ajax/ajax_saveContactData.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
		    alert('Data saved');
		    ///$('#contactForm'+id).html(data);
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
	     
		}
	});
   }
   
}
function fnGetFormAppend(id)
{
	alert(id);
   document.getElementById('idcabs').value=id;
  //$('#idcabs').val(id);
  $( ".ajaxformclass" ).remove();
 formData='';   
	$.ajax({
		url : "ajax/ajax_form.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
		  
		    $('#contactForm'+id).html(data);
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
	     
		}
	});
}
</script>	

  </head>

  <body>
    <header>
        <div class="navbar navbar-inverse top--header clearfix" role="navigation">
          <div class="container">
            <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
              <a href="index.php" class="navbar-brand "><img src="img/logo.png" /></a>              
            </div>                
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav header-left-nav">
                    <li>
                      <a href="list.php?&type=1">Local</a>
                    </li>
                    <li>
                      <a href="list.php?&type=2">Airport Transfer</a>
                    </li>
                    <li>
                      <a href="list.php?&type=3">Out Station</a>
                    </li>
                </ul>               
                <ul class="nav navbar-nav navbar-right header-right pad-t5">
                  <li class="pad-t15 phone pad-l30">0 90 4545 0000 </li>
                  <li><a href="#" class="email-icon mar-l15">Send Enquiry</a></li>
                </ul>
              </div>                   
          </div>
        </div>      
    </header>
	<?php if($_GET['type']==1)
	{?>
		<section class="brd-btm">
			<div class="container mar-t10 mar-b10">
				<form role="form" class="row">
				  <div class="form-group col-sm-3">
					<label class="fw-normal">I want a car in</label>
					 <select class="form-control" id='localvenue' name='localvenue'>
                          <?php for($i=0;$i<count($arraycity);$i++){?>
			<option value='<?php echo $arraycity[$i]['idcity'];?>' 
			<?php if($_GET['venue']==$arraycity[$i]['idcity']) { echo "selected=selected";}?>><?php echo $arraycity[$i]['cityname'];?></option>
			<?php }?>
			</select>
				  </div>    
						  <div class="form-group col-sm-2">
							 <label class="fw-normal">For</label>
                        <select class="form-control" id='timeduration' name='timeduration'>
                            <option value='8' <?php if($_GET['timeduration']=='8'){echo "selected=selected";}?>>8 hours</option>
							<option value='10' <?php if($_GET['timeduration']=='10'){echo "selected=selected";}?>>10 hours</option>
							<option value='4' <?php if($_GET['timeduration']=='4'){echo "selected=selected";}?>>Half Day</option>
							<option value='8' <?php if($_GET['timeduration']=='8'){echo "selected=selected";}?>>Full Day</option>
                        </select>
							
						  </div>  
						  <div class="form-group col-sm-3 pos-rel">
							 <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker" value="<?php echo $_GET['datepkr'];?>">
                        <span class="date" onclick='showcalendar()'></span>
						  </div> 
						  <div class="form-group col-sm-2">
							<label class="fw-normal">At</label>
                         <select class="form-control" name='localtime' id='localtime'>
                            <option value='6:00' <?php if($_GET['localtime']=='6:00') { echo "selected=selected";}?>>6:00 AM</option>
							<option value='7:00'  <?php if($_GET['localtime']=='7:00') { echo "selected=selected";}?>>7:00 AM</option>
							<option value='8:00'  <?php if($_GET['localtime']=='8:00') { echo "selected=selected";}?>>8:00 AM</option>
							<option value='9:00'  <?php if($_GET['localtime']=='9:00') { echo "selected=selected";}?>>9:00 AM</option>
                            <option value='10:00' <?php if($_GET['localtime']=='10:00') { echo "selected=selected";}?> >10:00 AM</option>
							<option value='11:00'  <?php if($_GET['localtime']=='11:00') { echo "selected=selected";}?>>11:00 AM</option>
							<option value='12:00'  <?php if($_GET['localtime']=='12:00') { echo "selected=selected";}?>>12:00 PM</option>
							<option value='13:00'  <?php if($_GET['localtime']=='13:00') { echo "selected=selected";}?>>1:00 PM</option>
                            <option value='14:00'  <?php if($_GET['localtime']=='14:00') { echo "selected=selected";}?>>2:00 PM</option>
							<option value='15:00'  <?php if($_GET['localtime']=='15:00') { echo "selected=selected";}?>>3:00 PM</option>
							<option value='16:00'  <?php if($_GET['localtime']=='16:00') { echo "selected=selected";}?>>4:00 PM</option>
							<option value='17:00'  <?php if($_GET['localtime']=='17:00') { echo "selected=selected";}?>>5:00 PM</option>
							<option value='18:00'  <?php if($_GET['localtime']=='18:00') { echo "selected=selected";}?>>6:00 PM</option>
							<option value='19:00'  <?php if($_GET['localtime']=='19:00') { echo "selected=selected";}?>>7:00 PM</option>
							<option value='20:00'  <?php if($_GET['localtime']=='20:00') { echo "selected=selected";}?>>8:00 PM</option>		
							<option value='21:00'  <?php if($_GET['localtime']=='21:00') { echo "selected=selected";}?>>9:00 PM</option>
							<option value='22:00'  <?php if($_GET['localtime']=='22:00') { echo "selected=selected";}?>>10:00 PM</option>
							<option value='23:00'  <?php if($_GET['localtime']=='23:00') { echo "selected=selected";}?>>11:00 PM</option>							
						</select>
						  </div>                                                    
				  <button type="button" class="btn btn-primary mar-l10 mar-t25" onclick='validatelocalbookcar();'>Search</button>
				  <button type="button" class="btn btn-link mar-t25">Cancel</button>
				</form>
			</div>                 
			</section><!-- /.Modify Search -->
		<?php }?>
	<?php if($_GET['type']==2){?>
			<section class="brd-btm">
			<div class="container mar-t10 mar-b10">
				<form role="form" class="row">
				  <div class="form-group col-sm-3">
					<label class="fw-normal">I want a car for</label>
					 <div class="radio">
                                <input type="radio" name="airport" value="PickUp" <?php if($_GET['radiovalue']=='PickUp') { echo "checked=checked";}?>>Pick Up from Airport<br>
								<input type="radio" name="airport" value="DropTo" <?php if($_GET['radiovalue']=='DropTo') { echo "checked=checked";}?>>Drop to Airport
                              </div>
				  </div>    
						  <div class="form-group col-sm-2">
							 <label class="fw-normal">Place</label>
                        <select class="form-control" id='airportplace' name='airportplace'>
                                <?php for($i=0;$i<count($arraygroundadmin);$i++){?>
			<option value='<?php echo $arraygroundadmin[$i]['idairportdestination'];?>'
			   <?php if($_GET['place'] == $arraygroundadmin[$i]['idairportdestination']) {echo "selected=selected";}?>><?php echo $arraygroundadmin[$i]['locationname'];?></option>
			<?php }?>
			</select>
							
						  </div>  
						  <div class="form-group col-sm-3 pos-rel">
							 <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker1" value="<?php echo $_GET['datepkr'];?>">
                        <span class="date" onclick='showcalendar()'></span>
						  </div> 
						  <div class="form-group col-sm-2">
							<label class="fw-normal">At</label>
                         <select class="form-control" name='airporttime' id='airporttime'>
                            <option value='6:00' <?php if($_GET['localtime']=='6:00') { echo "selected=selected";}?>>6:00 AM</option>
							<option value='7:00'  <?php if($_GET['localtime']=='7:00') { echo "selected=selected";}?>>7:00 AM</option>
							<option value='8:00'  <?php if($_GET['localtime']=='8:00') { echo "selected=selected";}?>>8:00 AM</option>
							<option value='9:00'  <?php if($_GET['localtime']=='9:00') { echo "selected=selected";}?>>9:00 AM</option>
                            <option value='10:00' <?php if($_GET['localtime']=='10:00') { echo "selected=selected";}?> >10:00 AM</option>
							<option value='11:00'  <?php if($_GET['localtime']=='11:00') { echo "selected=selected";}?>>11:00 AM</option>
							<option value='12:00'  <?php if($_GET['localtime']=='12:00') { echo "selected=selected";}?>>12:00 PM</option>
							<option value='13:00'  <?php if($_GET['localtime']=='13:00') { echo "selected=selected";}?>>1:00 PM</option>
                            <option value='14:00'  <?php if($_GET['localtime']=='14:00') { echo "selected=selected";}?>>2:00 PM</option>
							<option value='15:00'  <?php if($_GET['localtime']=='15:00') { echo "selected=selected";}?>>3:00 PM</option>
							<option value='16:00'  <?php if($_GET['localtime']=='16:00') { echo "selected=selected";}?>>4:00 PM</option>
							<option value='17:00'  <?php if($_GET['localtime']=='17:00') { echo "selected=selected";}?>>5:00 PM</option>
							<option value='18:00'  <?php if($_GET['localtime']=='18:00') { echo "selected=selected";}?>>6:00 PM</option>
							<option value='19:00'  <?php if($_GET['localtime']=='19:00') { echo "selected=selected";}?>>7:00 PM</option>
							<option value='20:00'  <?php if($_GET['localtime']=='20:00') { echo "selected=selected";}?>>8:00 PM</option>		
							<option value='21:00'  <?php if($_GET['localtime']=='21:00') { echo "selected=selected";}?>>9:00 PM</option>
							<option value='22:00'  <?php if($_GET['localtime']=='22:00') { echo "selected=selected";}?>>10:00 PM</option>
							<option value='23:00'  <?php if($_GET['localtime']=='23:00') { echo "selected=selected";}?>>11:00 PM</option>							
						</select>
						  </div>                                                    
				  <button type="button" class="btn btn-primary mar-l10 mar-t25" onclick='validateairportbookcar();'>Search</button>
				  <button type="button" class="btn btn-link mar-t25">Cancel</button>
				</form>
			</div>                 
			</section><!-- /.Modify Search -->
    <?php }?>	
	
    <div class="container mar-t10">
    <div class="table-responsive">
     <table class="table v-align-mid">      
          
          <?php if($_GET['type']==1 && $_GET['datepkr']!=''){?>
          <thead>
            <tr>
              <th>Car Image</th>
              <th>Car Name &amp; Model</th>
              <th class="txtr">Fare</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
		  <tbody>
		  <?php for($i=0;$i<count($localarray);$i++){?>
            <tr>
              <td><img src="img/imgTata_Indica-Mid.jpg" /></td>
              <td>
                  <h4 class="font16-sm"><?php echo $localarray[$i]['carname'];?></h4>
                  <p><?php echo $localarray[$i]['cartype'];?></p>
                  <p class="font12">Per hr Rs <?php echo $localarray[$i]['perhour'];?></p>
              </td>
			  <?php $totalfare = $_GET['timeduration']*$localarray[$i]['perhour'];?>
              <td class="txtr"><p class="font24-sm">Rs. <?php echo $totalfare;?></p><a href="#" data-toggle="tooltip" data-placement="bottom" title="Package Details">Fare Breakup</a></td>
              <td class="txtr"><button type="button" class="btn btn-inverse mar-b5" onclick='fnGetFormAppend(<?php echo $localarray[$i]['idcabs'];?>)'>Book Now</button></td>
            </tr> 
			<tr class="current" id='contactForm<?php echo $localarray[$i]['idcabs'];?>'>    
            </tr>   
	      <?php }?>
             <input type='hidden' name='idcabs' id='idcabs' value=''>                                                                                            
          </tbody>
		  <?php }?>
		  
		  <?php if($_GET['type']==2 && $_GET['datepkr']!=''){?>
		  <thead>
            <tr>
              <th>Car Image</th>
              <th>Car Name &amp; Model</th>
              <th class="txtr">Fare</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
		  <tbody>
		  <?php for($i=0;$i<count($airportarray);$i++){?>
            <tr>
              <td><img src="img/imgTata_Indica-Mid.jpg" /></td>
              <td>
                  <h4 class="font16-sm"><?php echo $airportarray[$i]['carname'];?></h4>
                  <p><?php echo $airportarray[$i]['cartype'];?></p>
                  <p class="font10">Toll + parking charges excluded</p>
              </td>
			 
		   <?php 
		        
				$idplace = $_GET['place'];
				$idcabs = $airportarray[$i]['idcabs'];
		        $groundsql = mysql_query("Select a.* from tbl_airportcabsprice as a
										 where a.idcabs = $idcabs and a.idcabs not in (11)");
		      
				$amount ='';
				$kilometer = '';
                while($row = mysql_fetch_assoc($groundsql))
				{
					$amount = $row['airportamount'];
					
				}
		   ?>
		 
			  <?php $totalfare = $amount;?>
              <td class="txtr"><p class="font24-sm">Rs. <?php echo $totalfare;?></p><a href="#" data-toggle="tooltip" data-placement="bottom" title="Package Details">Fare Breakup</a></td>
              <td class="txtr"><button type="button" class="btn btn-inverse mar-b5" onclick='fnGetFormAppend(<?php echo $airportarray[$i]['idcabs'];?>)'>Book Now</button></td>
            </tr> 
			<tr class="current" id='contactForm<?php echo $airportarray[$i]['idcabs'];?>'>    
            </tr>   
	      <?php }?>
             <input type='hidden' name='idcabs' id='idcabs' value=''>                                                                                            
          </tbody>
		  <?php }?>
		  
		  
		   <?php if($_GET['type']==3){?>
		   <thead>
            <tr>
              <th>Car Image</th>
              <th>Car Name</th>
              <th>Car Type and Fare</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
		  <tbody>
		  <?php for($i=0;$i<count($outstationarray);$i++){?>
            <tr>
              <td><img src="img/imgTata_Indica-Mid.jpg" /></td>
              <td>
                  <h4 class="font16-sm"><?php echo $outstationarray[$i]['carname'];?></h4>
                      <p class="font12"><?php echo $outstationarray[$i]['minfare'];?> km Min fare</p>
               
              </td>
              <td>
                  
                  <h4 class="font16-sm"><?php echo $outstationarray[$i]['cartype'];?></h4>
                  <p class="font12">Per Km Rs <?php echo $outstationarray[$i]['perkm'];?></p>
              </td>
             <td class="txtr"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Package Details">Fare Breakup</a></td>
              <td class="txtr"><button type="button" class="btn btn-inverse mar-b5" onclick='fnGetFormAppend(<?php echo $outstationarray[$i]['idcabs'];?>)'>Book Now</button></td>
            </tr> 
			<tr class="current" id='contactForm<?php echo $outstationarray[$i]['idcabs'];?>'>    
            </tr>   
	      <?php }?>
             <input type='hidden' name='idcabs' id='idcabs' value=''>                                                                                            
          </tbody>
		  <?php }?>
        </table> 
        </div>
      </div>   
   <?php include('include/footer.php');?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="js/bootstrap.min.js"></script>
    <script>
       $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>    
  </body>
</html>
