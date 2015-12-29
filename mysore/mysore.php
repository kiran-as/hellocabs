<?php
include('../application/conn.php');
include('../include/dropdown.php');	


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Cabs</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='../include.js' type='text/javascript'></script>
   <?php include('../include/otherjsvalidations.php');?>
   
   <script>
$(function() {
    $( "#datepicker" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });
    $( "#datepicker1" ).datepicker({minDate: "+0D", maxDate: "+1M +1D" });
	 
});

function fnGetLocalTime(selecteddate)
{
  formData='selecteddate='+selecteddate;   
  $.ajax({
    url : "../ajax/ajax_fetchlocaltime.php",
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
    url : "../ajax/ajax_fetchairporttime.php",
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
  formData='';
  $.ajax({
    url : "../ajax/ajax_onloadairporttime.php",
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
  formData='';
  $.ajax({
    url : "../ajax/ajax_onloadlocaltime.php",
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
  fnOnloadLocal();
  fnOnloadAirpott();
}
   </script>
  </head>

  <body onload='onloadtime()'>
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
              <a href="#" class="navbar-brand "><img src="../img/logo.png" /></a>              
            </div>              
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav header-left-nav home-nav-center">
                    <li>
                      <a href="../list.php?&type=3">Out Station</a>
                    </li>
                </ul>                
                <ul class="nav navbar-nav navbar-right header-right pad-t5">
                  <li class="pad-t15 phone pad-l30">+91 80500 55544</li>
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
							<option value='4'>4 hours</option>
                            <option value='8'>8 hours</option>
			
                        </select>
                      </div>  
                      <div class="form-group col-sm-12 pos-rel">
                        <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker" value="" onchange="fnGetLocalTime(this.value);">
                        <span class="date" onclick='showcalendar()' ></span>
                      </div> 
                      <div id='localajaxtime'>
                         <div class="form-group">
                        <label class="fw-normal">At</label>
                        <select class="form-control" name='airporttime' id='airporttime'>
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
                         <input type="datepicker1" class="form-control" placeholder="Select Date" id="datepicker1" value="" onchange="fnGetAirportTime(this.value);">
                        <span class="date" onclick='showcalendar1()'></span>

                      </div> 
                      <div id='airportajaxtime'>
                         <div class="form-group">
                        <label class="fw-normal">At</label>
                        <select class="form-control" name='airporttime' id='airporttime'>
                            <option value=''>Select</option>                      
                        </select>
                      </div>
                      </div>
                      <div class="col-sm-12">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick='validateairportbookcar();'>Book Car</button>
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
                      <a href="#"><img src="../img/banner1.jpg" alt="..." /></a>
                    </div>
                    <div class="item">
                      <a href="#"><img src="../img/banner1.jpg" alt="..." /></a>
                    </div>
                  </div>
                </div>                  
              </div>
              </div>
              <div class="row mar-t40">
                <div class="bs-example bs-example-tabs col-sm-12" role="tabpanel">
                    <ul id="myTab" class="nav nav-tabs font16-sm" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab" aria-controls="local" aria-expanded="false">Bangalore Cab Booking</a>
                        </li>
                        <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab" aria-controls="airport" aria-expanded="true">Places to Visit in Bangalore</a>
                        </li>
                        <li role="presentation"><a href="#tab3" role="tab" data-toggle="tab" aria-controls="airport" aria-expanded="true">Popular Locations in Bangalore</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in cutsom--tab" id="tab1" aria-labelledby="tab1-tab">
                            <p>Bangalore is the Capital city of the Indian state of Karnataka and also the biggest IT hub in whole of South India due to which it is also called Silicon Valley of India. Now it is better known as the Startup hub of the country. Besides this the city is known by the acronym of the Garden city of India. Owing its foundation to Kempegowda, who ruled here in 16th century, the city is also associated with Tipu sultan and was the summer capital of his empire. The city is well connected by road, rail and air to rest of India and Kempegowda international airport is the largest hub in the region. Cabs are also one of the best means of transport for business, leisure and airport transfers. Owing to its location near hill stations, outstation cabs for weekend destinations are also sought after. Savaari offers cabs services in Bangalore at affordable fares. Available in all types of taxis like Tata Indica, Tata Indigo, Toyota Innova, Etios and even luxury cabs, Savaari Cab hire has made commuting in Bangalore safe, comfortable and reliable.</p>
                            <p>Local cab booking is available in both 8 Hr/80 and 4 Hr/40 Packages and effective cab fares stands at Rs9.5/Kms for Intra city Cab travel to any location in Bangalore. Savaari also offers cabs service in Bangalore for Business travelers, Airport transfers and MICE. Tourist Cabs for local Full day or half day sightseeing are also available. Travelers can books cabs online through website or call directly at 0 90 4545 0000 for more information. With largest inventory of brand new cabs, Savaari promises to offer best cab travel experience for all its customers. Book now and pay later facility exists for all local cab booking service in Bangalore.</p>
                            
                        </div>
                        <div role="tabpanel" class="tab-pane fade cutsom--tab" id="tab2" aria-labelledby="tab2-tab">
                            <p>Bangalore is a mix of both old and new. Whether it be monuments, exiting places to have fun or best markets to splurge Bangalore has something for all. Among the historical Monuments Tipu Sultan's Palace completed in 1791 is a must see. Bangalore Palace, built in 1887 by Chamaraja Wodeyar and inspired by England's Windsor Castle in Tudor style architecture, with fortified towers, arches, green lawns, and elegant woodcarvings in its interiors is also worth visiting. Cubbon Park, Lalbagh and Bannerghata national Park are place that are sure to attract nature Lovers. Among places offering entertainment, Neeladri Park, Lazer Castle, Wonderla and Flight4 Fantasy are notable. For religiously oriented ISKON and Suryanarayana temple can also be visited.</p>
                            <p>HAL Aerospace museum and Visvesvaraya technological museum is sure to amuse the scientifically oriented travelers. For art lovers there is National Gallery of Modern art.For traveling to all the places comfortably, one can book cabs with Savaari. Sightseeing cabs in Bangalore are available as a package for full or half day and cab pick and drop from airport or hotels can be made available. Travellers can have pre designed itinerary fixed as well for full days local cabs. Besides local cabs, the users can have intercity and Intra city cab packages from Bangalore as well. Cab services in Bangalore can also be booked on Mobile or app. For direct local city taxi booking call 0 90 4545 0000.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade cutsom--tab" id="tab3" aria-labelledby="tab3-tab">
                            <div class="clearfix">
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>               
    </section>
    
    <?php include('../include/footer.php');?>   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
