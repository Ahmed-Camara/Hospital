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
        <?php if(!isset($_SESSION['current_doctor']->email)) : ?>
            <section>
                <div>
                    <?php
                        if(!empty($data['success'])){
                            echo '<div class="successMessagess">';
                                echo $data['success'];
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="card">
                    <div class="title">
                        <h3>Change Doctor Password</h3>
                    </div>
                    <form action="<?php echo URLROOT?>/users/forgotPassword/doctors" class="form" method="post">
                        <div class="form-control">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                            <i class="fas fa-check-circle itag"></i>
                            <i class="fa fa-exclamation-circle itag"></i>
                            
                            <small>Error message</small>
                        </div>

                        <div class="form-control">
                            <label for="email">Re-enter Email</label>
                            <input type="email" name="new_email" id="newEmail">
                            <i class="fas fa-check-circle itag"></i>
                            <i class="fa fa-exclamation-circle itag"></i>
                            <span class="invalid"><?php echo $data['email_error'];?></span>
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

                        <div class="loginButton flex-button">
                            <button type="submit" class="btn" onclick="return changeCredentials()">Save</button>
                            
                        </div>
                    </form>
                </div>
            </section>
        <?php else : ?>
          <?php redirect('doctors');?>
        <?php endif;?>
    </body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>