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
              <input type="email" class="form-control" value="Any where in Bangalore!! Whoa" readonly=readonly>

              </div>  
              <div class="form-group col-sm-3 pos-rel">
               <label class="fw-normal">On</label>
                        <input type="datepicker" class="form-control" placeholder="Select Date" id="datepicker1" value="<?php echo $_GET['datepkr'];?>" onchange="fnGetAirportTime(this.value);">
                        <span class="date" onclick='showcalendar()'></span>
              </div> 
              <div class="form-group col-sm-2">
               <div id='airportajaxtime'></div>
              </div>                                                    
          <button type="button" class="btn btn-primary mar-l10 mar-t25" onclick='validateairportbookcar();'>Search</button>
        </form>
      </div>                 
      </section><!-- /.Modify Search -->
         
    <div class="container mar-t10">
    <div class="table-responsive">
     <table class="table v-align-mid">      
              
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
      </table>
      </div>
      </div>
