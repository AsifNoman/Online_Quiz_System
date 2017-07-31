<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

    <h1>Login Page</h1>

    <p>Type Username and Password to login!!</p>

    <form action="" method="POST">

            <label for="username">Username:</label><br>
            <input name="username" id="username" type="text"><br><br>

            <label for="password">Password</label><br>
            <input name="password" id="password" type="password"><br><br>

            <input type="submit" name="login" value="Login">

    </form><br><br>


Don't have an account !!!<a href="<?php echo base_url(); ?>register"> Register Now</a><br><br>

         <?php if (isset($message)) { 
         echo $message; } ?>

</body>
</html>