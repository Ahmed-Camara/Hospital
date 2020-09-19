<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <table class="table">
                <tr>
                    <th>Patient ID</th>
                    <th>Patient First Name</th>
                    <th>Patient Last Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Blood Group</th>
                </tr>

                <?php
                    
                    foreach($data as $value){
                ?>
                    <tr>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->firstName;?></td>
                        <td><?php echo $value->lastName;?></td>
                        <td><?php echo $value->permanentAddress;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->phone;?></td>
                        <td><?php echo $value->dateOfBirth;?></td>
                        <td><?php echo $value->bloodGroup;?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>