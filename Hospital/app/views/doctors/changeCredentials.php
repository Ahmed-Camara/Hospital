<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/login.css">
</head>
<body>
<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <?php
                if(!empty($data['success'])){
                    echo '<div class="successMessagess">';
                        echo $data['success'];
                    echo '</div>';
                }
            ?>
            <div class="card">
                <h1>CHANGE DOCTOR INFORMATION</h1>

                <form action="<?php echo URLROOT;?>/doctors/changeCredentials" method="post">
                    <div class="booking">
                        <label for="email">Email</label>
                        <input type="email" name="email"
                        value="<?php echo $data['email'];?>">
                        <span class="invalid"><?php echo $data['email_err'];?></span>
                    </div>

                    <div class="booking">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                        <span class="invalid"><?php echo $data['password_err'];?></span>
                    </div>

                    <div class="booking">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password">
                        <span class="invalid"><?php echo $data['confirm_password_err'];?></span>
                    </div>

                    <div class="loginButton">
                        <input type="submit" value="Submit" class="btn">
                    </div>
                </form>
            </div>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>