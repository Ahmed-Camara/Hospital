<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/form.css">
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
                <h1>CHANGE ADMIN INFORMATION</h1>

                <form action="<?php echo URLROOT;?>/admin/UpdateInformation" method="post" id="form">
                    <div class="form-control">
                        <label for="email">New Email</label>
                        <input type="email" name="email" id="email">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="email">Confirm New Email</label>
                        <input type="email" name="new_email" id="newEmail">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="confirm_password">New Password</label>
                        <input type="password" name="new_password" id="new_password">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" id="confirm_new_password" name="confirm_new_password">
                        <i class="fas fa-check-circle itag"></i>
                        <i class="fa fa-exclamation-circle itag"></i>
                        <small>Error message</small>
                    </div>

                    <div class="loginButton">
                        <input type="submit" value="Submit" class="btn" onclick="return changeCredentials()">
                    </div>
                </form>
            </div>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>