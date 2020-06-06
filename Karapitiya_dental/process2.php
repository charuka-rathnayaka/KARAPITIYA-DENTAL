<?php if(isset($_POST['time'])):?>
<?php 
$var=$_POST['time'];
$select=$_POST['choice'];
$date=$_POST['date'];
?>

<?php
$db = mysqli_connect('localhost', 'root', '', 'dentalkarapitiya');
$query="SELECT * FROM booking WHERE date='$date' && category='$select' && time='$var'";
$result=mysqli_num_rows(mysqli_query($db,$query));
if($var=="8.00-9.00a.m"){
	$number=$result+1;
	if($result==0){
		$comment="Please come to the dental before 8.00 a.m";
	}
	if($result==1){
		$comment="Please come to the dental on 8.10 a.m";
	}
	if($result==2){
		$comment="Please come to the dental on 8.20 a.m";
	}
	if($result==3){
		$comment="Please come to the dental on 8.30 a.m";
	}
	if($result==4){
		$comment="Please come to the dental on 8.40 a.m";
	}
}
elseif($var=="9.00-10.00a.m"){
	$number=6+$result;
	if($result==0){
		$comment="Please come to the dental on 9.00 a.m";
	}
	if($result==1){
		$comment="Please come to the dental on 9.10 a.m";
	}
	if($result==2){
		$comment="Please come to the dental on 9.20 a.m";
	}
	if($result==3){
		$comment="Please come to the dental on 9.30 a.m";
	}
	if($result==4){
		$comment="Please come to the dental on 9.40 a.m";
	}
}
elseif($var=="10.00-11.00a.m"){
	$number=11+$result;
	if($result==0){
		$comment="Please come to the dental on 10.00 a.m";
	}
	if($result==1){
		$comment="Please come to the dental on 10.10 a.m";
	}
	if($result==2){
		$comment="Please come to the dental on 10.20 a.m";
	}
	if($result==3){
		$comment="Please come to the dental on 10.30 a.m";
	}
	if($result==4){
		$comment="Please come to the dental on 10.40 a.m";
	}
}
elseif($var=="11.00-12.00a.m"){
	$number=16+$result;
	if($result==0){
		$comment="Please come to the dental on 11.00 a.m";
	}
	if($result==1){
		$comment="Please come to the dental on 11.10 a.m";
	}
	if($result==2){
		$comment="Please come to the dental on 11.20 a.m";
	}
	if($result==3){
		$comment="Please come to the dental on 11.30 a.m";
	}
	if($result==4){
		$comment="Please come to the dental on 11.40 a.m";
	}
}
elseif($var=="12.00-1.00p.m"){
	$number=21+$result;
	if($result==0){
		$comment="Please come to the dental on 12.00 p.m";
	}
	if($result==1){
		$comment="Please come to the dental on 12.10 p.m";
	}
	if($result==2){
		$comment="Please come to the dental on 12.20 p.m";
	}
	if($result==3){
		$comment="Please come to the dental on 12.30 p.m";
	}
	if($result==4){
		$comment="Please come to the dental on 12.40 p.m";
	}
}
elseif($var=="1.00-2.00p.m"){
	$number=26+$result;
	if($result==0){
		$comment="Please come to the dental on 1.00 p.m";
	}
	if($result==1){
		$comment="Please come to the dental on 1.10 p.m";
	}
	if($result==2){
		$comment="Please come to the dental on 1.20 p.m";
	}
	if($result==3){
		$comment="Please come to the dental on 1.30 p.m";
	}
	if($result==4){
		$comment="Please come to the dental on 1.40 p.m";
	}
}
elseif($var=="2.00-3.00p.m"){
	$number=31+$result;
	if($result == 0){
		$comment="Please come to the dental on 2.00 p.m";
	}
	if($result==1){
		$comment="Please come to the dental on 2.10 p.m";
	}
	if($result==2){
		$comment="Please come to the dental on 2.20 p.m";
	}
	if($result==3){
		$comment="Please come to the dental on 2.30 p.m";
	}
	if($result==4){
		$comment="Please come to the dental on 2.40 p.m";
	}
}
else{
	$number=36+$result;
	if($result==0){
		$comment="Please come to the dental on 3.00 p.m";
	}
	if($result==1){
		$comment="Please come to the dental on 3.10 p.m";
	}
	if($result==2){
		$comment="Please come to the dental on 3.20 p.m";
	}
	if($result==3){
		$comment="Please come to the dental on 3.30 p.m";
	}
	if($result==4){
		$comment="Please come to the dental on 3.40 p.m";
	}
}
?>
<?php echo "Your appointment number is ".$number."<br>";
echo $comment."<br>";
?>
<input type="submit" name="subs" value="submit" />
<?php endif?>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<script>
$(document).ready(function() {
    $('input[type="submit"]').click(function(){
		var x=$(this).val();
		var time="<?php echo $var?>";
		var num="<?php echo $number?>"
		var id=$('#id1').val();
		var choice=$('#select1').val();
		var date=$('#datepicker').val();
		$.ajax({
			url:"process1.php",
			method:"POST",
			data:{time:time,id:id,choice:choice,date:date,subs:x,number:num},
			success: function(data){
				$('.bbb').html(data);
			}
		});
	});
});
</script>
</body>
</html>