<?php
$user = $_POST['user'];
$name = $_POST['name'];
$date = $_POST["date"];
$select = $_POST["treatment"];
$num = $_POST["app_num"];
$btn = $_POST["btnval"];
?>
<?php if (isset($btn)) : ?>
	<script>
		var user = <?php echo $user ?>;
		var name = <?php echo $name ?>;
		var date = <?php echo $date ?>;
		var treatment = <?php echo $select ?>;
		var app_num = <?php echo $num ?>;
		$.ajax({
			url: "dbOperations/appointment.php",
			method: "POST",
			data: {
				user: user,
				name: name,
				date: date,
				app_num: app_num,
				treatment: treatment
			},
			success: function(data) {
				$('.bottom').html(data);
			}
		});
	</script>
<?php endif ?>
<?php
include('dbOperations/appointment.php');
if (isset($btn)) {
	$app = new Appointment();
	$app->deleteAppointment();
}
?>