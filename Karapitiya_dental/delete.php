<?php 
$date=$_POST["date"];
$select=$_POST["treatment"];
$num=$_POST["app_num"];
$btn=$_POST["btnval"];
?>
<?php if(isset($btn)): ?>
<script>
var date= <?php echo $date?>;
var treatment=<?php echo $select?>;
var app_num=<?php echo $num?>;
$.ajax({
url:"appointment.php",
method:"POST",
data:{date:date,app_num:app_num,treatment:treatment},
success: function(data){
$('.bottom').html(data);
}
});
</script>
<?php endif?>
<?php
  include('appointment.php');
	if(isset($btn)){
		$app= new Appointment();
		$app->deleteAppointment();
	}
?>
