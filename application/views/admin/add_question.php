<!DOCTYPE html>
<html>
<head>
	<title>Add Question</title>
</head>

<body>

<form method="post" action="http://localhost/MidAtp/admin/addQuestion" enctype="multipart/form-data">

   <h1>Add Question</h1>

	<label> Test Name* </label><br>
	<input type="text" id="test_id" name="test_name" required /><br><br>

	<label> Category* </label><br>
	<select name="category" required>
	    <option value="Programming">Programming</option>
	    <option value="Web Development">Web Development</option>
	    <option value="Web Development">Web Designing</option>
		<option value="Networking">Networking</option>
        <option value="Graphics Designing">Graphics Designing</option>														
	</select><br><br>

	<label> Select Time (Minutes)* </label><br>
	<input type="number" id="time_id" name="minutes" required/><br><br>

    <label> Details About Test: </label><br>
	<textarea name="details" rows="5" cols="40"></textarea><br><br>

	<label> Upload File* </label><br>
	<input type="file" id="file_id" name="userfile" value="UPLOAD" required /><br><br>

	<input type="submit" name="submit_form" value="Submit">

</form> <br><br>

<a href="http://localhost/MidAtp/admin">Back To Dashboard</a> <br><br>

 <?php 

    if (isset($error))
    {
    	echo "<p>".$error."</p>";
    }

    else if (isset($success))
    {
    	echo "<p>".$success."</p>";
    }

 ?>


</body>

</html>