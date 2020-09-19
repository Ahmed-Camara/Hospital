<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/form.css">
  <title><?php echo SITENAME?></title>
</head>
<body>
  <?php if(!isset($_SESSION['current_patient']->email)) : ?>

    <div class="hero">
        <div class="login-box">
            <h1 class="centered">Patient Log in</h1>
            <p class="centered">Please fill in your credentials to log in</p>
            <form action="<?php echo URLROOT;?>/users/login/patient" method="post" class="form" id="form" onsubmit="return validateLoginForm()">
                
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter email" value="<?php echo $data['email'];?>" 
                id="email" name="email">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <span class="invalid"><?php echo $data['email_err'];?></span>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter password" value="<?php echo $data['password'];?>" 
                 id="password" name="password">
                <i class="fas fa-check-circle itag"></i>
                <i class="fa fa-exclamation-circle itag"></i>
                <span class="invalid"><?php echo $data['password_err'];?></span>
            </div>
                
            <div class="loginButton flex-button" style="margin-top:60px;">
                <input type="submit" value="Login" class="btn" style="width:50%;">
                <a href="<?php echo URLROOT;?>/users/forgotPassword/patient">Forgot Password ?</a>
            </div>
            <div style="text-align:center; margin-top:10px;">
                <a href="<?php echo URLROOT;?>/users/registration">create an Account</a>
            </div>
            </form>
            
        </div>
  </div>
      <?php else : ?>
          <?php redirect('patient');?>
    <?php endif;?>

</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>