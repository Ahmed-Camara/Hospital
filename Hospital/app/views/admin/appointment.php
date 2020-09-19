<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sideMenu/header.php';?>
        <section class="sidebar-content">
            <table class="table">
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor ID</th>
                    <th>Specialization</th>
                    <th>App Date</th>
                    <th>App Time</th>
                    <th>Status</th>
                </tr>

                <?php
                    
                    foreach($data as $value){
                ?>
                    <tr>
                        <td><?php echo $value->patient_id;?></td>
                        <td><?php echo $value->patient_name;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->phone;?></td>
                        <td><?php echo $value->doctor_id;?></td>
                        <td><?php echo $value->doctor_specialization;?></td>
                        <td><?php echo $value->Appointment_date;?></td>
                        <td><?php echo $value->Appointment_time;?></td>
                        <td><?php echo $value->status;?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </section>
    <?php require 'sideMenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>