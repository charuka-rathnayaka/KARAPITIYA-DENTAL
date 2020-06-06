<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
.button1{
	background-color:#F03;
}
</style>
</head>
<body>
<?php 
include('appointment.php');
if(isset($_POST['check'])){
	$app = new Appointment();
	$array = $app->createAppointment();
	$error=$app->pendingAppointment($array[0],$array[1]);
}
?>
<script>
var count=0;
function toogle(_this){
	if(count==0){
	_this.style.backgroundColor="#66FF99";
	count++;
	}else{
		alert("Have insert one already");
	}
}
function warning(){
	alert("No time in this slot");
}
$(document).ready(function() {
    $('input[id="timebtn"]').click(function(){
		if(count==1){
			var time=$(this).val();
			var choice=$('#select1').val();
			var date=$('#datepicker').val();
			$.ajax({
				url:"process2.php",
				method:"POST",
				data:{time:time,choice:choice,date:date},
				success: function(data){
					$('.aaa').html(data);
				}
			});
			count++;
		}
	});
});
</script>
<?php if(isset($_POST['check'])):?>
<h3><font color="#3300FF">Select your free time slot</font></h3>
<input type="button" name="time" id="timebtn" value="8.00-9.00a.m"<?php if($error=="Sorry1..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="9.00-10.00a.m"<?php if($error=="Sorry2..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="10.00-11.00a.m"<?php if($error=="Sorry3..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="11.00-12.00a.m"<?php if($error=="Sorry4..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/><br><br>
<input type="button" name="time" id="timebtn" value="12.00-1.00p.m"<?php if($error=="Sorry5..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="1.00-2.00p.m"<?php if($error=="Sorry6..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="2.00-3.00p.m"<?php if($error=="Sorry7..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<input type="button" name="time" id="timebtn" value="3.00-4.00p.m"<?php if($error=="Sorry8..."):?> class="button1" onClick="warning()"<?php else:?>onClick="toogle(this)" <?php endif?>/>
<?php endif?>
</body>
</html>