<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Registration</b>Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input name="username" id="username" class="form-control" placeholder="User Name" type="text" required>
        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="email" id="email" class="form-control" placeholder="Email" type="text" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="password" name="password2" id="password" class="form-control" placeholder="Confirm Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <select id="gender" name="gender" class="form-control">
                <option value="Male">male</option>
                <option value="Female">female</option>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <input type="submit" name="register" value="Register" class="btn btn-primary btn-block btn-flat">
        </div>
      </div>
    </form><br>

    <p class="text-danger"><?php if (isset($message)) { echo $message; } ?> </p>

    <a href="<?php echo base_url();?>" class="text-center">Click Here To LogIn</a>

  </div>
</div>

</body>
</html>
