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
	<form method="post">
		<input type="text" height="5" width="10" name="search" placeholder="write your test name">
		<input type="submit" value="search" name="srcbutton">
	</form>
	<h2>Running Test</h2></br>

	<table style="width:100%;">
		<tr>
			<th>Test Name</th>
			<th>Catagory</th>
			<th>Time(In Minute)</th>
			<th>Total Question</th>
			<th>Exam Button</th>
			<th></th>
			
		</tr>
		<?php foreach ($examlist as $exam){ ?>
		<tr>
			<td><?php echo $exam['test_name']; ?></td>
			<td><?php echo $exam['category']; ?></td>
			<td><?php echo $exam['time']; ?></td>
			<td><?php echo $exam['no_of_ques']; ?></td>
			<td> <a href="http://localhost/MidAtp/userController/questions/<?php echo $all['user_id'];?>/<?php echo $exam['test_name']; ?>">Take Exam</td>
		</tr>
		<?php } ?>
	</table><br><br>

<a href="http://localhost/MidAtp/userController/index/<?php echo $all['user_id'];?>">Back To Dashboard</a> 
	
</body>
</html>