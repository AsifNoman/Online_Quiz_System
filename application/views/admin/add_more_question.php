<!DOCTYPE html>
<html>
<head>
	<title>Add More Question</title>
</head>
<body>

<h1>Add More Question</h1>

<form enctype="multipart/form-data" action="http://localhost/MidAtp/admin/addMoreQuestion" method="post">
									
									<label> Select Test*  </label><br>
															
											<select name="category" required>
																<?php foreach($all_test as $test){?>
																<option value="<?php echo $test['test_name'];?>"><?php echo $test['test_name'];?></option>
																<?php }?>
											</select><br><br>
									
									<label> Upload File* </label><br>
											<input type="file" name="userfile" value="UPLOAD" required/><br><br>
																
									<input type="submit" name="submit_form" value="Submit">
</form><br><br>

<a href="http://localhost/MidAtp/admin/">Back To Dashboard</a> <br><br>

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