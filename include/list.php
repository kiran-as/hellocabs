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
    
 <?php if($_GET['type']=='1'){
     include('include/local.php');
     }?>
    <?php if($_GET['type']=='3'){
     include('include/outstation.php');
     }?>
      <?php if($_GET['type']=='2'){
  
     include('include/airport.php');
     }?>

    <footer class="home-footer">
              <div class="container">
               <div class="sm-pull-right">
                    <ul class="footer-nav sm-pull-left pad-t5 mar-r20">
                        <li><a href="">About Us</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">Terms &amp; Conditions</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">FAQ</a></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div>            
                <p class="sm-pull-left pad-t5 pad-xs-t20">© 2015 <a href="http://www.hellocabs.com">Hello Cabs</a> All Rights Reserved.</p>               
              </div>          
        </footer> 
    
    <script>
       $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>    
  </body>
</html>
