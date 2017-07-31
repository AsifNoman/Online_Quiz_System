<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
</head>
<body>
	<h1 align="center">User Panel</h1>

	<h2 align="center">Welcome <?php $name = $this->session->userdata('usernames'); if(isset($name)){echo $name;}?> </h2>
	
	<b>User Name:</b> <?php echo $udata['user_name']?> </br></br>
	<b>User Email:</b> <?php echo $udata['user_email_id']?></br></br>
	<b>Gender:</b> <?php echo $udata['user_gender']?></br></br>
	<b>Total Given Exams:</b> <?php echo $no ?><br/><br/>
	<a href="http://localhost/MidAtp/userController/examHistory/<?php echo $udata['user_name']?>">View Exam History</a><br><br>
	<a href="http://localhost/MidAtp/userController/viewExams/<?php echo $udata['user_name']?>">Take Exam</a><br><br>
	<a href="http://localhost/MidAtp/userController/logOut">Log Out </a>
</body>
</html>