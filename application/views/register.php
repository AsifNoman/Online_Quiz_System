<!DOCTYPE html>
<head>
    <title>Register Page</title>
</head>
<body>

    <h1>Register Page</h1>

    <p>Fill in the details to register on our website!!</p>

    <form action="" method="POST">

            <label for="username">Username:</label><br>
            <input name="username" id="username" type="text"><br><br>

            <label for="email">Email</label><br>
            <input name="email" id="email" type="text"><br><br>

            <label for="password">Password</label><br>
            <input name="password" id="password" type="password"><br><br>

            <label for="password">Confirm Password:</label><br>
            <input name="password2" id="password" type="password"><br><br>

            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender">
                <option value="Male">male</option>
                <option value="Female">female</option>
            </select><br><br>

            <input type="submit" name="register" value="Register">

    </form><br><br>

    Already have an account !!!<a href="<?php echo base_url(); ?>"> Login Now</a><br><br>

    <?php if (isset($message)) { 
         echo $message; } ?>

</body>
</html>