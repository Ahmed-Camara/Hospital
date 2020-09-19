<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <table class="table">
                <tr>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Doctor Specialisation</th>
                    <th>Date of Birth</th>
                    <th>Registration Date</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                </tr>

                <?php
                    
                    foreach($data as $value){
                ?>
                    <tr>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->name;?></td>
                        <td><?php echo $value->specialisation;?></td>
                        <td><?php echo $value->dateOfBirth;?></td>
                        <td><?php echo $value->registrationDate;?></td>
                        <td><?php echo $value->email;?></td>
                        <td><?php echo $value->address;?></td>
                        <td><?php echo $value->phone;?></td>
                        <td><?php echo $value->gender;?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>