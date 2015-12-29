<?php
include('../application/conn.php');
$selecteddate = date('Y-m-d',strtotime($_POST['selecteddate']));

if(date('Y-m-d') == $selecteddate)
    {
        $curdate = 0;

    }
    else
    {
        $curdate =1;
    }

if($curdate==0)
{
       $selecteddate = date('Y-m-d H:i:s');
       $curdate = date('Y-m-d');
    $timesql = mysql_query("Select DATE_ADD('$selecteddate' , INTERVAL 60 MINUTE ) as curtimes");
    while($row = mysql_fetch_assoc($timesql))
    {
        $datetimesql = explode(' ',$row['curtimes']);
        $date = $datetimesql[0];
        $curtime = $datetimesql[1];
        if(date('Y-m-d') == $date)
        {
            $curdate = 0;

        }
        else if(date('Y-m-d')== $curdate)
        {
            $curdate =2;
        }
        else 
        {
            $curdate =1;
        }
     
    }

    if($curdate==0)
    {

        $curtimearray = explode(':',$curtime);
        $curtime = $curtimearray[0];
        if($curtime<6)
        {
            $curtime=6;
        }
       $table = "<div class='form-group col-sm-12'>
                            <label class='fw-normal'>At</label>
                           <select class='form-control' name='airporttime' id='airporttime'>";  
        for($i=$curtime;$i<=23;$i++)
        {
            $displaytime = $i;
             $timeformat ='AM';
            if($i>12)
            {
                $displaytime = $i-12;
                $timeformat ='PM';
            }
            if($i==12)
            {
                $timeformat ='PM';
            }

            $table.="<option value='$i:00'>$displaytime:00 $timeformat</option>";
        }
             $table.="</select>
                          </div>";
    }
}
if($curdate==1)
{
 
     $table = "<div class='form-group col-sm-12'>
                        <label class='fw-normal'>At</label>
                       <select class='form-control' name='airporttime' id='airporttime'>
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
                      </div>";
}
if($curdate==2)
{
 
     $table = "<div class='form-group col-sm-12'>
                        <label class='fw-normal'>At</label>
                       <select class='form-control' name='airporttime' id='airporttime'>
                            <option value=''>Select</option>                                               
                        </select>
                      </div>";
}

echo $table;
?>