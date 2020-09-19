
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body >
    <section class="sidebar">
        <div class="sidebar-title">
            <p>Admin</p>
            <img src="<?php echo URLROOT;?>/image/admin.png" alt="">
        </div>
        <a href="<?php echo URLROOT;?>/admin/dashboard">
        <img src="<?php echo URLROOT;?>/image/home.png" style="margin-right:2px;background-color:white;">
            Dashboard
        </a>
        <a href="<?php echo URLROOT;?>/admin/UpdateInformation">
            <img src="<?php echo URLROOT;?>/image/profil.png">
            Update profil
        </a>

        <a href="<?php echo URLROOT;?>/admin/patientBooks">
            <img src="<?php echo URLROOT;?>/image/data.png">
            Patient Records
        </a>
        <a href="<?php echo URLROOT;?>/admin/addDoctor">
            <img src="<?php echo URLROOT;?>/image/app.png" alt="">
            Add Doctors
        </a>

        <a href="<?php echo URLROOT;?>/admin/doctorRecords">
            <img src="<?php echo URLROOT?>/image/app.png" alt="">
            Doctors Record
        </a>

        <a href="<?php echo URLROOT;?>/admin/appointment">
            <img src="<?php echo URLROOT;?>/image/app.png" alt="">
            Appointment
        </a>
    </section>
</body>
</html>
