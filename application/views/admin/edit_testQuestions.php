<!DOCTYPE html>

<html>

<head>

<style>
table, th, td 
{
    border: 1px solid black;
    border-collapse: collapse;
}
th, td
{
    padding: 5px;
}
</style>

	<title>Edit Test Questions</title>

</head>

<body>

   <h1>Edit Test Questions</h1>

<form method="post" action="http://localhost/MidAtp/admin/testqstnShow" >

	<label> Select Test* </label><br>
	<select name="categoryTest" required>
		<?php foreach($all_test as $test){?>
		<option value="<?php echo $test['test_name'];?>"><?php echo $test['test_name'];?></option>
		<?php }?>
	</select><br><br>

	<input type="submit" name="search_form" value="Search Questions">

	<input type="submit" name="delete_form" value="Delete test">

</form>

<?php if(isset($testQstns)) {  ?>

<h2><?php echo $testQstns[0]['test_name']; ?> Questions</h2>

	<table style="width:100%;">

  <tr>
    <th>Question</th>
    <th>Option1</th> 
    <th>Option2</th>
    <th>Option3</th>
    <th>Option4</th>
    <th>Answer</th>
    <th>Edit Button</th>  
    <th>Delete Button</th>    
  </tr>

<?php foreach($testQstns as $question) { ?>

<form method="post" action="http://localhost/MidAtp/admin/editDeleteQstns" >

  <tr>
    <input type="hidden" id="qstn_ids" name="qstnId_name" value="<?php echo $question['id']?>">
    <input type="hidden" id="test_id" name="test_name" value="<?php echo $question['test_name']?>">
    <td><input type="text" id="question_id<?php echo $question['id']?>" name="question_name<?php echo $question['id']?>" value="<?php echo $question['question']?>"></td>
    <td><input type="text" id="option1_id<?php echo $question['id']?>" name="option1_name<?php echo $question['id']?>" value="<?php echo $question['option1']?>"></td>
    <td><input type="text" id="option2_id<?php echo $question['id']?>" name="option2_name<?php echo $question['id']?>" value="<?php echo $question['option2']?>"></td>
    <td><input type="text" id="option3_id<?php echo $question['id']?>" name="option3_name<?php echo $question['id']?>" value="<?php echo $question['option3']?>"></td>
    <td><input type="text" id="option4_id<?php echo $question['id']?>" name="option4_name<?php echo $question['id']?>" value="<?php echo $question['option4']?>"></td>
    <td><input type="text" id="answer_id<?php echo $question['id']?>" name="answer_name<?php echo $question['id']?>" value="<?php echo $question['answer']?>"></td>
    <td><input type="submit" name="edit_form<?php echo $question['id']?>" value="Edit"></td>
    <td><input type="submit" name="delete_form<?php echo $question['id']?>" value="Delete"></td>
  </tr>

</form>

  <?php } } ?>

</table><br><br>

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