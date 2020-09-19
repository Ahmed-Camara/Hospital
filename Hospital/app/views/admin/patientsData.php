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
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Doctor Email</th>
                        <th>Doctor ID</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Prescription</th>
                        <th>Cost</th>
                    </tr>
                    <?php if($data['patientData']) : ?>
                        <?php foreach($data['patientData'] as $appointment) : ?>
                            <td><?php echo $appointment->patient_id;?></td>
                            <td><?php echo $appointment->patient_name;?></td>
                            <td><?php echo $appointment->doctor_name;?></td>
                            <td><?php echo $appointment->doctor_email;?></td>
                            <td><?php echo $appointment->doctor_id;?></td>
                            <td><?php echo $appointment->date;?></td>
                            <td><?php echo $appointment->details?></td>
                            <td><?php echo $appointment->prescription?></td>
                            <td><?php echo $appointment->cost?></td>
                        <?php endforeach; ?>
                    <?php endif;?>

            </table>
            </section>
                
            <?php require 'sidemenu/footer.php';?>
        
    </body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>