<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
	<style type="text/css">
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
</style>
</head>
<body>
	<h2>Exam History</h2></br>

	<table style="width:100%">
		<tr>
			<th>Test Name</th>
			<th>Mark</th>
			<th>Time</th>
			<th>Date</th>
			
		</tr>
		<?php foreach ($history as $exam){ ?>
		<tr>
			<td><?php echo $exam['test_name']; ?></td>
			<td><?php echo $exam['mark']; ?></td>
			<td><?php echo $exam['time']; ?></td>
			<td><?php echo $exam['date']; ?></td>
		</tr>
		<?php } ?>
	</table><br><br>

<a href="http://localhost/MidAtp/userController/index/<?php echo $all['user_id'];?>">Back To Dashboard</a> <br><br>
	
</body>
</html>