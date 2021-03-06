<?php
include('application/conn.php');
include('include/dropdown.php');	


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
    	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='include.js' type='text/javascript'></script>
   <?php include('include/jsvalidations.php');?>
   
   <script>
$(function() {
    $( "#datepicker" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });
    $( "#datepicker1" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });
	 
});

function fnGetLocalTime(selecteddate)
{
  formData='selecteddate='+selecteddate;   
  $.ajax({
    url : "ajax/ajax_fetchtime.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
      
        $('#localajaxtime').html(data);
        $('#airporttime').html(data);
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
}

function fnOnload()
{
  formData='';
  $.ajax({
    url : "ajax/ajax_fetchtime.php",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
      
        $('#localajaxtime').html(data);
        $('#airporttime').html(data);
      
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
       
    }
  });
}
   </script>
  </head>

  <body onload='fnOnload()'>
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
              <a href="#" class="navbar-brand "><img src="img/logo.png" /></a>              
            </div>              
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav header-left-nav home-nav-center">
                    <li>
                      <a href="#">Out Station</a>
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
    <section>
        <div class="container">
           <div class="row mar-t30">
            <div class="bs-example bs-example-tabs col-sm-5 col-md-4" role="tabpanel">
                <ul id="myTab" class="nav nav-tabs custom-tabs-nav font16-sm" role="tablist">
                  <li role="presentation" class="active"><a href="#local" role="tab" data-toggle="tab" aria-controls="local" aria-expanded="false">Local</a></li>
                  <li role="presentation"><a href="#airport" role="tab" data-toggle="tab" aria-controls="airport" aria-expanded="true">Airport Transfer</a></li>      
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in cutsom--tab" id="local" aria-labelledby="local-tab">
                    <div class="row">
                      <div class="form-group col-sm-12">
                        <label class="fw-normal">I want a car in</label>
                         <select class="form-control" id='localvenue' name='localvenue'>
                          <?php for($i=0;$i<count($arraycity);$i++){?>
			<option value='<?php echo $arraycity[$i]['idcity'];?>'><?php echo $arraycity[$i]['cityname'];?></option>
			<?php }?>
			</select>
                      </div> 
                      <div class="form-group col-sm-12">
                        <label class="fw-normal">For</label>
                       <select class="form-control" id='timeduration' name='timeduration'>
                            <option value='8'>8 hours</option>
							<option value='10'>10 hours</option>
							<option value='4'>Half Day</option>
                        </select>
                      </div>  
                      <div class="form-group col-sm-12 pos-rel">
                        <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker" value="" onchange="fnGetLocalTime(this.value);">
                        <span class="date" onclick='showcalendar()' ></span>
                      </div> 
                      <div id='localajaxtime'>
                        <div class='form-group'>
                        <label class='fw-normal'>At</label>
                       <select class='form-control' name='airporttime' id='airporttime'>
                       <option value=''>Select</option>
                       </select>
                       </div>
                       </div>
                      <div class="col-sm-12">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick='validatelocalbookcar();'>Book Car</button>
                      </div>                                                                   
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade cutsom--tab" id="airport" aria-labelledby="airport-tab">
                    <div class="row">
                        <form class="form-horizontal col-xs-12" role="form">
                          <div class="form-group">
                            <label class="control-label  txtl">I want a car for</label>
                            <div class="">
                                <label class="radio-inline">
                                  <input type="radio" name="airport" value="PickUp" checked> Pickup from Airport
                                </label> 
                                <label class="radio-inline">
                                  <input type="radio" name="airport" value="DropTo"> Drop at Airport
                                </label>                                                              
                            </div>                           
                          </div>
                        </form> 
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group">
                                <label class="fw-normal">In</label>
                                <input type="email" class="form-control" value="Any where in Bangalore!! Whoa" readonly=readonly>
                              </div>                                 
                            </div>
                        </div>                     
                      <div class="form-group pos-rel">
                        <label class="fw-normal">On</label>
                         <input type="datepicker1" class="form-control" placeholder="Select Date" id="datepicker1" value="" onchange="fnGetLocalTime(this.value);">
                        <span class="date" onclick='showcalendar1()'></span>

                      </div> 
                      <div id='airporttime'>
                      <div class="">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick='validateairportbookcar()'>Book Car</button>
                      </div>                                                                   
                    </div>
                  </div>                  
                </div>
              </div>
              <div class="col-sm-7 col-md-8 mar-t40">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <a href="#"><img src="img/banner1.jpg" alt="..." /></a>
                    </div>
                    <div class="item">
                      <a href="#"><img src="img/banner1.jpg" alt="..." /></a>
                    </div>
                  </div>
                </div>                  
              </div>
              </div>
              
              <div class="row mar-t40 txtc">
              <div class="col-sm-3">
                 <div class="ft-block">                                      
                  <img src="img/features_icon1.png" alt="" />
                  <h4>Clean Car</h4>
                  <p class="pad-t10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare ligula ligula, eget laoreet est venenatis tempor. </p>
                  </div>
              </div>
              <div class="col-sm-3 mar-xs-t30">
                 <div class="ft-block">                                      
                  <img src="img/features_icon2.png" alt="" />
                  <h4>On Time Service</h4>
                  <p class="pad-t10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare ligula ligula, eget laoreet est venenatis tempor. </p>
                  </div>                  
              </div>
              <div class="col-sm-3 mar-xs-t30">
                 <div class="ft-block">                                      
                  <img src="img/features_icon3.png" alt="" />
                  <h4>Courteous Driver</h4>
                  <p class="pad-t10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare ligula ligula, eget laoreet est venenatis tempor. </p>
                  </div>                  
              </div>
              <div class="col-sm-3 mar-xs-t30">
                 <div class="ft-block">                                      
                  <img src="img/features_icon4.png" alt="" />
                  <h4>Complimentary</h4>
                  <p class="pad-t10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare ligula ligula, eget laoreet est venenatis tempor. </p>
                  </div>                  
              </div>                                          
              </div>
        </div>               
    </section>
    
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
