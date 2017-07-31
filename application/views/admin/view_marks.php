<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
</style>
</head>
<body>

<h1>Search Marks By User Name</h1>

<form method="post" action="http://localhost/MidAtp/admin/searchResult">

<label> User Name* </label><br>
  <input type="text" id="user_id" name="users_name" required /><br><br>

  <input type="submit" name="submit_form" value="Search">

</form> <br>

<table style="width:100%">
  <?php if(isset($all_mark)) { foreach($all_mark as $mark) {   ?>
  <tr>
    <td><?php echo $mark['user_name']?></td>
    <td><?php echo $mark['mark']?></td>
    <td><?php echo $mark['date']?></td>
    <td><?php echo $mark['time']?></td>
    <td><?php echo $mark['test_name']?></td>
  </tr>
   <?php } } ?>

</table> 

<?php 

    if (isset($message))
    {
      echo "<p>".$message."</p>";
    }

 ?>

<h1>All Users Mark History</h1>
<table style="width:100%">
  <tr>
    <th>User Name</th>
    <th>Mark</th> 
    <th>Date</th>
    <th>Time</th>
    <th>Test Name</th>
  </tr>

   <?php if(isset($all_marks)) { foreach($all_marks as $marks) {   ?>
  <tr>
    <td><?php echo $marks['user_name']?></td>
    <td><?php echo $marks['mark']?></td>
    <td><?php echo $marks['date']?></td>
    <td><?php echo $marks['time']?></td>
    <td><?php echo $marks['test_name']?></td>
  </tr>
   <?php } } ?>

</table> <br><br>

<a href="http://localhost/MidAtp/admin">Back To Dashboard</a> <br><br>

</body>
</html>
