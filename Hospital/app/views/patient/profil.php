<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <div class="card">
                <h1>Patient Profile</h1>

                <form action="<?php echo URLROOT;?>/patient/updateProfil">
                    <label for="">Patient ID</label>
                    <input value="<?php echo $data['id'];?>" disabled>
                    <label for="">First Name</label>
                    <input value="<?php echo $data['firstName'];?>" disabled>
                    <label for="">Last Name</label>
                    <input value="<?php echo $data['lastName'];?>" disabled>
                    <label for="">Permanent Address</label>
                    <input value="<?php echo $data['permanentAddress']?>" disabled>
                    <label for="">Email Address</label>
                    <input value="<?php echo $data['email'];?>" disabled>
                    <label for="">Phone</label>
                    <input value="<?php echo $data['phone'];?>" disabled>

                    <label for="">Date of Birth</label>
                    <input value="<?php echo $data['DOB'];?>" disabled>

                    <label for="">Blood Group</label>
                    <input value="<?php echo $data['blood_group'];?>" disabled>

                    <div class="loginButton">
                        <input type="submit" value="Update" class="btn">
                    </div>
                </form>
            </div>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>