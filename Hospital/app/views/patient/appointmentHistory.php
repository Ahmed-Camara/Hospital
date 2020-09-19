<?php require APPROOT . '/views/inc/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body id="body">
        
            <?php require 'sidemenu/header.php';?>
                <section class="sidebar-content">
                    <table class="table">
                        <tr>
                            <th>Patient ID</th>
                            <th>Doctor ID</th>
                            <th>Doctor Name</th>
                            <th>Doctor Email</th>
                            <th>Doctor Phone</th>
                            <th>Doctor Specialization</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                        </tr>
                        <?php if($data['appointments']) : ?>
                            <?php foreach($data['appointments'] as $appointment) : ?>
                            <tr>
                                <td><?php echo $appointment->patient_id;?></td>
                                <td><?php echo $appointment->doctor_id;?></td>
                                <td><?php echo $appointment->doctor_name;?></td>
                                <td><?php echo $appointment->doctor_email;?></td>
                                <td><?php echo $appointment->doctor_phone;?></td>
                                <td><?php echo $appointment->doctor_specialization;?></td>
                                <td><?php echo $appointment->Appointment_date;?></td>
                                <td><?php echo $appointment->Appointment_time;?></td>
                                <td><?php echo $appointment->status;?>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </table>
                </section>
            <?php require 'sidemenu/footer.php';?>
        
    </body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>