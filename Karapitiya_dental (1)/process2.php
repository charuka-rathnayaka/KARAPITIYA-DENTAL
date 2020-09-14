<?php if (isset($_POST['time'])) :
	include_once('dbOperations/database_server.php');
	require_once('dbOperations/bussinesslayer.php');
	require_once('dbOperations/dataLayer.php') ?>
	<?php
	$var = $_POST['time'];
	$select = $_POST['choice'];
	$day = $_POST['date'];
	$date = date("d-m-Y", strtotime($day));
	$bus = new BusinessLayer();
	$bus->setvalues($date, $select, $var);
	$number = $bus->getnumber();
	$comment = $bus->getcomment();
	?>
	<?php echo "Your appointment number is " . $number . "<br>";
	echo $comment . "<br>";
	?>
	<input type="submit" name="subs" value="submit" />
<?php endif ?>
<html>

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
	<script>
		$(document).ready(function() {
			$('input[type="submit"]').click(function() {
				var x = $(this).val();
				var time = "<?php echo $var ?>";
				var num = "<?php echo $number ?>"
				var id = $('#id1').val();
				var choice = $('#select1').val();
				var date = $('#datepicker').val();
				$.ajax({
					url: "process1.php",
					method: "POST",
					data: {
						time: time,
						id: id,
						choice: choice,
						date: date,
						subs: x,
						number: num
					},
					success: function(data) {
						$('.bbb').html(data);
					}
				});
			});
		});
	</script>
</body>

</html>