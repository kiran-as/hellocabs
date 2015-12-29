<script>

function showcalendar()
{
	$('#datepicker').datepicker('show');
}

function showcalendar1()
{
	$('#datepicker1').datepicker('show');
}
function showcalendar2()
{
	$('#datepicker2').datepicker('show');
}

function fnshowvalue(id)
{
   if(id==1)
   {
      $('#airport').show();
	  $('#local').hide();
	  $('#outstation').hide();
   }
   if(id==0)
   {
      $('#airport').hide();
	  $('#local').show();
	  $('#outstation').hide();
   }
   if(id==2)
   {
      $('#airport').hide();
	  $('#local').hide();
	  $('#outstation').show();
   }
}

function validatelocalbookcar()
{
   var flag=0;
   var datepkr = document.getElementById('datepicker').value;
   var localvenue = document.getElementById('localvenue').value;
   var localtime = document.getElementById('localtime').value;
   var timeduration = document.getElementById('timeduration').value;
   
   if(datepkr=='')
   {
      alert('Please select the Journey Date');
	  flag=1;
   }
   
   else if(localvenue=='')
   {
      alert('Please select the Journey Date');
	  flag=1;
   }
   else if(localtime=='')
   {
      alert('Please select the time');
	  flag=1;
   }
   else if(timeduration=='')
   {
      alert('Please select the time');
	  flag=1;
   }
else 
{
   flag=0;
}   
   var type=1;
//document.getElementById("localvenueform").submit();   
if(flag==0)
{
parent.location='../list.php?datepkr='+datepkr+'&venue='+localvenue+'&type='+type+'&localtime='+localtime+'&timeduration='+timeduration;
   }
}


function validateairportbookcar()
{
   var flag=0;
   var datepkr = document.getElementById('datepicker1').value;
var place = 'Bangalore';
   var localtime = document.getElementById('airporttime').value;
   var radiovalue = $("input[name=airport]:checked").val();
   
   if(datepkr=='')
   {
      alert('Please select the Journey Date');
	  flag=1;
   }
   else if(place=='')
   {
      alert('Please Select the Place');
	  flag=1;
   }
else if(localtime=='')
   {
      alert('Please Select the Time');
	  flag=1;
   }
else 
{
   flag=0;
}   
   var type=2;
//document.getElementById("localvenueform").submit();   
if(flag==0)
{
parent.location='../list.php?datepkr='+datepkr+'&type='+type+'&localtime='+localtime+'&place='+place+'&radiovalue='+radiovalue;
   }
}


function validateOutstationDetails()
{
  var flag=0;
   var datepkr = document.getElementById('datepicker2').value;
var outstationfrom = document.getElementById('outstationfrom').value;
var outstationto = document.getElementById('outstationto').value;
var localtime = document.getElementById('outstationtime').value;

   if(outstationfrom==outstationto)
   {
      alert('From and To are of same location please change the one');
	  flag=1;
   }
   else if(datepkr=='')
   {
      alert('Please select the Journey Date');
	  flag=1;
   }
	else 
	{
	   flag=0;
	}   
   var type=3;
//document.getElementById("localvenueform").submit();   
if(flag==0)
{
parent.location='../list.php?datepkr='+datepkr+'&type='+type+'&localtime='+localtime+'&outstationfrom='+outstationfrom+'&outstationto='+outstationto;
   }
}
  </script>
</script>