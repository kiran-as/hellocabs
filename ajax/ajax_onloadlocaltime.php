<?php
include('../application/conn.php');

$selecteddate = date('Y-m-d',strtotime($_POST['selecteddate']));
$times = $_POST['times'];

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
                           <select class='form-control' name='localtime' id='localtime'>";  
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
            if($i==$times)
            {
                $selected ="selected=selectecd";
            }
            else
            {
                $selected ="";
            }
            $table.="<option value='$i:00' $selected >$displaytime:00 $timeformat</option>";
        }
             $table.="</select>
                          </div>";
    }
}
if($curdate==1)
{
 
     $table = "<div class='form-group col-sm-12'>
                        <label class='fw-normal'>At</label>
                       <select class='form-control' name='localtime' id='localtime'>";
                       $curtime="6";
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
                                if($i==$times)
                                {
                                    $selected ="selected=selectecd";
                                }
                                else
                                {
                                    $selected ="";
                                }
                                $table.="<option value='$i:00' $selected >$displaytime:00 $timeformat</option>";
                            }
                                 $table.="                                   
                        </select>
                      </div>";
}    
if($curdate==2)
{
 
     $table = "<div class='form-group col-sm-12'>
                        <label class='fw-normal'>At</label>
                       <select class='form-control' name='localtime' id='localtime'>
                            <option value=''>Select</option>                                               
                        </select>
                      </div>";
}

echo $table;
?>