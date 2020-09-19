<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php require APPROOT . '/views/inc/header.php'; ?>
            <?php require 'sidemenu/header.php';?>
                <section class="sidebar-content">
                    <div class="dashboard">
                        <div class="dashboard-item">
                            <h2>Profil</h3>
                            <a href="<?php echo URLROOT;?>/patient/profil">See profil</a>
                        </div>
                        <div class="dashboard-item">
                            <h2>Appointments</h3>
                            <a href="<?php echo URLROOT;?>/patient/AppointmentHistory">view appointment history</a>
                        </div>
                        <div class="dashboard-item">
                            <h2>Book Appointment</h3>
                            <a href="<?php echo URLROOT;?>/patient/bookAppointment">Book appointment</a>
                        </div>
                    </div>
                </section>
            <?php require 'sidemenu/footer.php';?>
        <?php require APPROOT . '/views/inc/footer.php'; ?>
    </body>
</html>