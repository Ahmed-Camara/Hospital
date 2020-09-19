<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <table class="table">
                <tr>
                    <th>User Email</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>ID Number</th>
                    <th>Message</th>
                </tr>

                <?php
                    
                    foreach($data as $value){
                ?>
                    <tr>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->name;?></td>
                        <td><?php echo $value->phone;?></td>
                        <td><?php echo $value->patient_id;?></td>
                        <td><?php echo $value->message_body;?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>