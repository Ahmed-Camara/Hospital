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
                        <th>Doctor Name</th>
                        <th>Doctor Email</th>
                        <th>Doctor ID</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Prescription</th>
                        <th>Cost</th>
                        <th>PDF</th>
                    </tr>

                    <?php
                    
                        foreach($data as $value){
                    ?>
                    <tr>
                        <td><?php echo $value->patient_id;?></td>
                        <td><?php echo $value->doctor_name;?></td>
                        <td><?php echo $value->doctor_email;?></td>
                        <td><?php echo $value->doctor_id;?></td>
                        <td><?php echo $value->date;?></td>
                        <td><?php echo $value->details?></td>
                        <td><?php echo $value->prescription?></td>
                        <td><?php echo $value->cost?></td>
                        <td><a href="<?php echo URLROOT;?>/patient/printPdfFile/
                        <?php echo $value->patient_id;?>/<?php echo $value->doctor_name;?>/
                        <?php echo $value->doctor_email;?>/
                        <?php echo $value->doctor_id;?>/
                        <?php echo $value->date;?>/
                        <?php echo $value->details;?>/
                        <?php echo $value->prescription;?>/
                        <?php echo $value->cost;?>/">print</a></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
            </section>
                
            <?php require 'sidemenu/footer.php';?>
        
    </body>
</html>
<?php require APPROOT . '/views/inc/footer.php'; ?>