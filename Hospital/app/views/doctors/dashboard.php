<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <section class="dashboard">
                <div class="dashboard-item">
                    <h2>Appointments</h2>
                    <h4><?php echo $data['numberOfAppointment'];?></h4>
                    <a href="<?php echo URLROOT;?>/doctors/appointment">view appointments</a>
                </div>


                <div class="dashboard-item">
                    <h2>Replied Appointments</h2>
                    <h4><?php echo $data['numberOfRepliedApp'];?></h4>
                    <a href="<?php echo URLROOT;?>/doctors/repliedAppointment">view replied Appointments</a>
                </div>

                <div class="dashboard-item">
                    <h2>Profil</h2>
                    <a href="<?php echo URLROOT;?>/doctors/profil">view</a>
                </div>
                
            </section>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>