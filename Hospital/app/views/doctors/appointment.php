<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <table class="table">
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor specialization</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Action</th>
                </tr>

                <?php
                    
                    foreach($data as $value){
                ?>
                    <tr>
                        <td><?php echo $value->patient_id;?></td>
                        <td><?php echo $value->patient_name;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->phone;?></td>
                        <td><?php echo $value->doctor_specialization;?></td>
                        <td><?php echo $value->Appointment_date;?></td>
                        <td><?php echo $value->Appointment_time;?></td>
                        <td><a href="<?php echo URLROOT;?>/doctors/acceptAppoint/<?php echo $value->patient_id;?>/
                        <?php echo $value->Appointment_date;?>/<?php echo $value->Appointment_time;?>">Accept</a></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
           
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>