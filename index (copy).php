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
    <style>
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
  </style>
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
              <a href="#" class="navbar-brand "><img src="img/logo.png" /></a>              
            </div>              
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right header-right pad-t5">
                  <li class="pad-t15 phone pad-l30">+91 8050 055 544 </li>
                  <li><a href="#" class="email-icon mar-l15">Send Enquiry</a></li>
                </ul>
              </div>                   
          </div>
        </div>      
    </header>
    <section>
        <div class="container">
           <div class="row mar-t30">
            <div class="bs-example bs-example-tabs col-sm-8" role="tabpanel">
                <ul id="myTab" class="nav nav-tabs custom-tabs-nav font16-sm" role="tablist">
                  <li role="presentation" class="active"><a href="#local" role="tab" data-toggle="tab" aria-controls="local" aria-expanded="false"  onclick='fnshowvalue(0);'>Local</a></li>
                  <li role="presentation" ><a href="#airport" role="tab" data-toggle="tab" aria-controls="airport" aria-expanded="true"  onclick='fnshowvalue(1);'>Airport Transfer</a></li>
                  <li role="presentation" ><a href="#outstation" role="tab" id="outstation-tab" data-toggle="tab" aria-controls="outstation" aria-expanded="true"  onclick='fnshowvalue(2);'>Out Station</a></li>      
                </ul>
                <div id="myTabContent" class="tab-content">
				<form name='localvenueform' id='localvenueform' action='list.php' method='POST'>
                  <div role="tabpanel" class="tab-pane fade active in cutsom--tab" id="local" aria-labelledby="local-tab">
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">I want a car in</label>
						 <select class="form-control" id='localvenue' name='localvenue'>
                          <?php for($i=0;$i<count($arraycity);$i++){?>
			<option value='<?php echo $arraycity[$i]['idcity'];?>'><?php echo $arraycity[$i]['cityname'];?></option>
			<?php }?>
			</select>
                      </div> 
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">For</label>
                        <select class="form-control" id='timeduration' name='timeduration'>
                            <option value='8'>8 hours</option>
							<option value='10'>10 hours</option>
							<option value='4'>Half Day</option>
							<option value='8'>Full Day</option>
                        </select>
                        
                      </div>  
                      <div class="form-group col-sm-6 pos-rel">
                        <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker" value="">
                        <span class="date" onclick='showcalendar()'></span>
                      </div> 
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">At</label>
                         <select class="form-control" name='localtime' id='localtime'>
                            <option value='6:00'>6:00 AM</option>
							<option value='7:00'>7:00 AM</option>
							<option value='8:00'>8:00 AM</option>
							<option value='9:00'>9:00 AM</option>
                            <option value='10:00'>10:00 AM</option>
							<option value='11:00'>11:00 AM</option>
							<option value='12:00'>12:00 PM</option>
							<option value='13:00'>1:00 PM</option>
                            <option value='14:00'>2:00 PM</option>
							<option value='15:00'>3:00 PM</option>
							<option value='16:00'>4:00 PM</option>
							<option value='17:00'>5:00 PM</option>
							<option value='18:00'>6:00 PM</option>
							<option value='19:00'>7:00 PM</option>
							<option value='20:00'>8:00 PM</option>		
							<option value='21:00'>9:00 PM</option>
							<option value='22:00'>10:00 PM</option>
							<option value='23:00'>11:00 PM</option>							
						</select>
                      </div>
                      <div class="col-sm-6 col-sm-offset-6">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick='validatelocalbookcar();'>Book Car</button>
                      </div>                                                                   
                    </div>
                  </div>
				  </form>
                  <div role="tabpanel" class="tab-pane fade cutsom--tab" id="airport" aria-labelledby="airport-tab" style='display:none'>
                    <div class="row">
                        <form class="form-horizontal col-xs-12" role="form">
                          <div class="form-group">
                            <label class="col-sm-3 control-label  txtl">I want a car for</label>
                            <div class="col-sm-4">
                              <div class="radio">
                                <input type="radio" name="airport" value="PickUp" checked>Pick Up from Airport<br>
								<input type="radio" name="airport" value="DropTo">Drop to Airport
                              </div>
                            </div>
                                                     
                          </div>
                        </form> 
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="form-group col-sm-6">
                                <label class="fw-normal">Place</label>
								 <select class="form-control" id='airportplace' name='airportplace'>
                                <?php for($i=0;$i<count($arraygroundadmin);$i++){?>
			<option value='<?php echo $arraygroundadmin[$i]['idairportdestination'];?>'><?php echo $arraygroundadmin[$i]['locationname'];?></option>
			<?php }?>
			</select>
                              </div>                                 
                            </div>
                        </div>                     
                      <div class="form-group col-sm-6 pos-rel">
                        <label class="fw-normal">On</label>
                         <input type="datepicker1" class="form-control" placeholder="Select Date" id="datepicker1" value="">
                        <span class="date" onclick='showcalendar1()'></span>
                      </div> 
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">At</label>
                            <select class="form-control" name='airporttime' id='airporttime'>
                            <option value='6:00'>6:00 AM</option>
							<option value='7:00'>7:00 AM</option>
							<option value='8:00'>8:00 AM</option>
							<option value='9:00'>9:00 AM</option>
                            <option value='10:00'>10:00 AM</option>
							<option value='11:00'>11:00 AM</option>
							<option value='12:00'>12:00 PM</option>
							<option value='13:00'>1:00 PM</option>
                            <option value='14:00'>2:00 PM</option>
							<option value='15:00'>3:00 PM</option>
							<option value='16:00'>4:00 PM</option>
							<option value='17:00'>5:00 PM</option>
							<option value='18:00'>6:00 PM</option>
							<option value='19:00'>7:00 PM</option>
							<option value='20:00'>8:00 PM</option>		
							<option value='21:00'>9:00 PM</option>
							<option value='22:00'>10:00 PM</option>
							<option value='23:00'>11:00 PM</option>													
                        </select>
                      </div>
                      <div class="col-sm-6 col-sm-offset-6">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick='validateairportbookcar()'>Book Car</button>
                      </div>                                                                   
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade cutsom--tab" id="outstation" aria-labelledby="outstation-tab" style='display:none'>
                    <div class="row">
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">I want a car from</label>
						<select class="form-control" id='outstationfrom' name='outstationfrom'>
                           <?php for($i=0;$i<count($outstationcityname);$i++){?>
			<option value='<?php echo $outstationcityname[$i]['idoutstation'];?>'><?php echo $outstationcityname[$i]['outstationname'];?></option>
			<?php }?>
			</select>
                      </div> 
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">To</label>
                        <select class="form-control" id='outstationto' name='outstationto'>
                             <?php for($i=0;$i<count($outstationcityname);$i++){?>
			<option value='<?php echo $outstationcityname[$i]['idoutstation'];?>'><?php echo $outstationcityname[$i]['outstationname'];?></option>
			<?php }?></option>
                        </select>
                      </div>  
                      <div class="form-group col-sm-6 pos-rel">
                        <label class="fw-normal">On</label>
                         <input type="datepicker1" class="form-control" placeholder="Select Date" id="datepicker2" value="">
                        <span class="date" onclick='showcalendar2()'></span>
                      </div> 
                      <div class="form-group col-sm-6">
                        <label class="fw-normal">For</label>
                        <select class="form-control" id='outstationtime' name='outstationtime'>
                             <option value='6:00'>6:00 AM</option>
							<option value='7:00'>7:00 AM</option>
							<option value='7:30'>7:30 AM</option>
							<option value='8:00'>8:00 AM</option>
							<option value='8:30'>8:30 AM</option>
							<option value='9:00'>9:00 AM</option>
                            <option value='9:30'>9:30 AM</option>
							<option value='10:00'>10:00 AM</option>
							<option value='10:30'>10:30 AM</option>
							<option value='11:00'>11:00 AM</option>
							<option value='12:00'>12:00 PM</option>
							<option value='12:30'>12:30 PM</option>
							<option value='13:00'>1:00 PM</option>
                            <option value='13:30'>1:30 PM</option>
							<option value='14:00'>2:00 PM</option>
							<option value='14:30'>2:30 PM</option>
							<option value='15:00'>3:00 PM</option>
							<option value='15:30'>3:30 PM</option>
							<option value='16:00'>4:00 PM</option>
							<option value='16:30'>4:30 PM</option>
                            <option value='17:00'>5:00 PM</option>
							<option value='17:30'>5:30 PM</option>
							<option value='18:00'>6:00 PM</option>
							<option value='18:30'>6:30 PM</option>
							<option value='19:00'>7:00 PM</option>
							<option value='19:30'>7:30 PM</option>
							<option value='20:00'>8:00 PM</option>		
							<option value='20:30'>8:30 PM</option>
							<option value='21:00'>9:00 PM</option>
							<option value='21:30'>9:30 PM</option>
                            <option value='22:00'>10:00 PM</option>
							<option value='22:30'>10:30 PM</option>
							<option value='23:00'>11:00 PM</option>
							<option value='23:30'>11:30 PM</option>
                        </select>
                      </div>
                      <div class="col-sm-6 col-sm-offset-6">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick='validateOutstationDetails()'>Book Car</button>
                      </div>                                                                   
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 mar-t40">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="img/ad1.png" alt="..." />
                    </div>
                    <div class="item">
                      <img src="img/ad2.png" alt="..." />
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
   <?php include('include/footer.php');?>  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script src="js/bootstrap.min.js"></script>
  </body>
</html>
