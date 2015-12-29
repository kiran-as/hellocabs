
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
              <option value='4' <?php if($_GET['timeduration']=='4'){echo "selected=selected";}?>>4 hours</option>
                        </select>
              
              </div>  
              <div class="form-group col-sm-3 pos-rel">
               <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker" value="<?php echo $_GET['datepkr'];?>" onchange="fnGetLocalTime(this.value);">
                        <span class="date" onclick='showcalendar()'></span>
              </div> 
               <div class="form-group col-sm-3 pos-rel">
               <div id='localajaxtime'>
               </div>
              </div>                                                    
          <button type="button" class="btn btn-primary mar-l10 mar-t25" onclick='validatelocalbookcar();'>Search</button>        </form>
      </div>                 
      </section><!-- /.Modify Search -->
 <div class="container mar-t10">
    <div class="table-responsive">
     <table class="table v-align-mid">      
           <?php if($_GET['type']==1 && $_GET['timeduration']=='4'){?>
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
        <?php $totalfare = $localarray[$i]['fourhour'];?>
              <td class="txtr"><p class="font24-sm">Rs. <?php echo $totalfare;?></p><a href="#" data-toggle="tooltip" data-placement="bottom" title="Package Details">Fare Breakup</a></td>
              <td class="txtr"><button type="button" class="btn btn-inverse mar-b5" onclick='fnGetFormAppend(<?php echo $localarray[$i]['idcabs'];?>)'>Book Now</button></td>
            </tr> 
      <tr class="current" id='contactForm<?php echo $localarray[$i]['idcabs'];?>'>    
            </tr>   
        <?php }?>
             <input type='hidden' name='idcabs' id='idcabs' value=''>                                                                                            
          </tbody>
      <?php }?>

      <?php if($_GET['type']==1 && $_GET['timeduration']=='8'){?>
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
        <?php $totalfare = $localarray[$i]['eighthour'];?>
              <td class="txtr"><p class="font24-sm">Rs. <?php echo $totalfare;?></p><a href="#" data-toggle="tooltip" data-placement="bottom" title="Package Details">Fare Breakup</a></td>
              <td class="txtr"><button type="button" class="btn btn-inverse mar-b5" onclick='fnGetFormAppend(<?php echo $localarray[$i]['idcabs'];?>)'>Book Now</button></td>
            </tr> 
      <tr class="current" id='contactForm<?php echo $localarray[$i]['idcabs'];?>'>    
            </tr>   
        <?php }?>
             <input type='hidden' name='idcabs' id='idcabs' value=''>                                                                                            
          </tbody>
      <?php }?>
      </table>
      </div>
      </div>
    

