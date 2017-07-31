<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
</head>

<body>

<h1 align="center">Admin Dashboard</h1>

<h2 align="center"><b>Welcome <?php $name = $this->session->userdata('usernames'); if(isset($name)){echo $name;}?></b></h2>

<p align="center"><b>Most Active user : </b><?php echo $mau; ?></br></br>
   <b>Most Given Exam : </b><?php echo $mge; ?></br></br>
   <b>Total User : </b><?php echo $total; ?>
</p>

   <a href="http://localhost/MidAtp/admin/addTestView">Add Test</a><br><br>
   <a href="http://localhost/MidAtp/admin/addMoreQuestionView">Add Test Question</a><br><br>
   <a href="http://localhost/MidAtp/admin/edit_questionInfoView">Edit Test Question Info</a><br><br>
   <a href="http://localhost/MidAtp/admin/edit_testQuestionsView">Edit Or Delete Test Questions</a><br><br>
   <a href="http://localhost/MidAtp/admin/viewResult">Mark History</a><br><br>
   <a href="http://localhost/MidAtp/admin/logOut">Log Out</a><br><br>

</body>

</html>