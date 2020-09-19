<?php require APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <?php if( !isset($_SESSION['current_admin']->email) && !isset($_SESSION['current_doctor']->email) &&
                !isset($_SESSION['current_email']->email) ) : ?>
    <div class="container">
        <main>
            <section>
                <div class="slideShow-container">
                    <div class="slide fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="<?php echo URLROOT?>/image/doc1.jpg" style="width:100%">
                    </div>

                    <div class="slide fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="<?php echo URLROOT?>/image/dc.jpg" style="width:100%">
                    </div>

                    <div class="slide fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="<?php echo URLROOT?>/image/doc3.jpg" style="width:100%">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </section>
        </main>
    </div>

    <section class="login" data-aos="fade-up">
        <div class="container">
            <h3>Choose an option to login in the System</h3>
            <div class="login-container">
                <div class="system-user-login">
                    <img src="<?php echo URLROOT;?>/image/admin.png" alt="">

                    <a href="<?php echo URLROOT?>/users/login/admin">Admin</a>
                </div>
                
                <div class="system-user-login">
                    <img src="<?php echo URLROOT;?>/image/patient.png" alt="">
                    <a href="<?php echo URLROOT?>/users/login/patient">Patients</a>
                </div>
                
                <div class="system-user-login">
                    <img src="<?php echo URLROOT;?>/image/doctor.png" alt="">
                    <a href="<?php echo URLROOT?>/users/login/doctors">Doctors</a>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
    
</div>
<script src="<?php echo URLROOT;?>/js/main.js"></script>
    <?php else: ?>
        <?php if(isset($_SESSION['current_admin']->email)) : ?>
            <?php redirect('admin');?>
        <?php elseif(isset($_SESSION['current_doctor']->email)) :  ?>
            <?php redirect('doctor');?>
        <?php elseif(isset($_SESSION['current_patient']->email)) :  ?>
            <?php redirect('patient');?>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>