<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <section class="dashboard">
                <div class="dashboard-item">
                    <h2>DOCTORS</h2>
                    <h4><?php echo $data['numberOfDoctor'];?></h4>
                    <a href="<?php echo URLROOT;?>/admin/doctorRecords">View doctors</a>
                </div>
                
                <div class="dashboard-item">
                    <h2>Patients</h2>
                    <h4><?php echo $data['numberOfPatients'];?></h4>
                    <a href="<?php echo URLROOT;?>/admin/patientBooks">View patients</a>
                </div>

                <div class="dashboard-item">
                    <h2>Appointments</h2>
                    <h4><?php echo $data['numberOfAppointment'];?></h4>
                    <a href="<?php echo URLROOT;?>/admin/appointment">View appointments history</a>
                </div>


                <div class="dashboard-item">
                    <h2>Messages</h2>
                    <h4><?php echo $data['numberOfMessages'];?></h4>
                    <a href="<?php echo URLROOT;?>/admin/messages">See Messages</a>
                </div>

                <div class="dashboard-item">
                    <h2>Patients Data</h2>
                    <h4><?php echo $data['numberOfDataForPatient'];?></h4>
                    <a href="<?php echo URLROOT;?>/admin/patientData">See Patients Data</a>
                </div>
                
            </section>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>