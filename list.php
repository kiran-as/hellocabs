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
    $localarray[$i]['fourhour'] = $row['fourhour'];  
    $localarray[$i]['eighthour'] = $row['eighthour'];      
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
$(function() {
    $( "#datepicker" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });
    $( "#datepicker1" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });
    $( "#datepicker2" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });

});

function fnValidateFormList()
{
   var flag=0;
   var areavalue = document.getElementById('area').value;
   var address = document.getElementById('address').value;
   var email = document.getElementById('email').value;
   var phone = document.getElementById('phone').value;
   var contanctname = document.getElementById('contanctname').value;
   var type = "<?php echo $_GET['type'];?>";
    var timeduration = "<?php echo $_GET['timeduration'];?>";
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
	   formData='contanctname='+contanctname+'&phone='+phone+'&email='+email+'&address='+address+'&journeydate='+journeydate+'&localtime='+localtime+'&type='+type+'&timeduration='+timeduration+'&areavalue='+areavalue;
	   $.ajax({
		url : "ajax/ajax_saveContactData.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
		    alert('Thanks for Submitting the data, Our executive will call you as soon as possible');
		    ///$('#contactForm'+id).html(data);
			  window.location='index.php';
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
	     
		}
	});
   }
   
}

function fnValidateFormListOutstations()
{
   var flag=0;
   var areavalue = document.getElementById('area').value;
   var address = document.getElementById('address').value;
   var email = document.getElementById('email').value;
   var phone = document.getElementById('phone').value;
   var contanctname = document.getElementById('contanctname').value;

   
   if(areavalue=='')
   {
      alert('Please Enter the Destination'); 
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
    url : "ajax/ajax_saveContactDataOutstation.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
        alert('Thanks for Submitting the data, Our executive will call you as soon as possible');
        ///$('#contactForm'+id).html(data);
          window.location='index.php';
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
   }
   
}
function fnGetFormAppend(id)
{
	//alert(id);
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

function fnGetFormAppendAirport(id)
{
  //alert(id);
  $( ".ajaxformclass" ).remove();
 formData='';   
  $.ajax({
    url : "ajax/ajax_formoutstation.php",
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
function fnGetLocalTime(selecteddate)
{

  formData='selecteddate='+selecteddate;   
  $.ajax({
    url : "ajax/ajax_fetchlocaltime.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
      
        $('#localajaxtime').html(data);
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
}


function fnGetAirportTime(selecteddate)
{
  formData='selecteddate='+selecteddate;   
  $.ajax({
    url : "ajax/ajax_fetchairporttime.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
      
        $('#airportajaxtime').html(data);
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
}

function fnOnloadAirpott()
{
      var times = "<?php  echo $_GET['localtime'];?>";
    var selecteddate = "<?php  echo $_GET['datepkr'];?>";
  formData='times='+times+'&selecteddate='+selecteddate;   
  $.ajax({
    url : "ajax/ajax_onloadairporttime.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
      
       
        $('#airportajaxtime').html(data);
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
}

function fnOnloadLocal()
{
    var times = "<?php  echo $_GET['localtime'];?>";
    var selecteddate = "<?php  echo $_GET['datepkr'];?>";
  formData='times='+times+'&selecteddate='+selecteddate;   
  $.ajax({
    url : "ajax/ajax_onloadlocaltime.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
      
        $('#localajaxtime').html(data);
        
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
}

function onloadtime()
{
  var fncall = "<?php echo $_GET['type'];?>";
  if(fncall=='1')
  {
  fnOnloadLocal();
  }
  else  
  {
      fnOnloadAirpott();
  }
}
   </script>
</head>


  <body onload='onloadtime()'>
<?php include('include/includelist.php');?>
    
 <?php if($_GET['type']=='1'){
     include('include/local.php');
     }?>
    <?php if($_GET['type']=='3'){
     include('include/outstation.php');
     }?>
      <?php if($_GET['type']=='2'){
  
     include('include/airport.php');
     }?>

    <?php include('include/footer.php');?>
    
    <script>
       $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>    
  </body>
</html>
