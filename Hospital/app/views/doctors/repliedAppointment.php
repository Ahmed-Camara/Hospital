<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <table class="table">
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>email</th>
                    <th>Phone</th>
                </tr>

                <?php
                    
                    foreach($data as $value){
                ?>
                    <tr>
                        <td><?php echo $value->patient_id;?></td>
                        <td><?php echo $value->patient_name;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->phone;?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>