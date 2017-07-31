<!DOCTYPE html>
<html>
<head>
	<title>Edit Test Info</title>
</head>

<body>

<form method="post" action="http://localhost/MidAtp/admin/editTestInfo" enctype="multipart/form-data">

   <h1>Edit Test Info</h1>

	<label> Select Test* </label><br>
	<select name="categoryTest" required>
		<?php foreach($all_test as $test){?>
		<option value="<?php echo $test['test_name'];?>"><?php echo $test['test_name'];?></option>
		<?php }?>
	</select><br><br>

	<label> Category* </label><br>
	<select name="category" required>
	    <option value="Same">No Change</option>
	    <option value="Programming">Programming</option>
	    <option value="Web Development">Web Development</option>
	    <option value="Web Development">Web Designing</option>
		<option value="Networking">Networking</option>
        <option value="Graphics Designing">Graphics Designing</option>														
	</select><br><br>

	<label> Select Time (Minutes) </label><br>
	<input type="number" id="time_id" name="minutes" /><br><br>

    <label> Details About Test: </label><br>
	<textarea name="details" rows="5" cols="40"></textarea><br><br>

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