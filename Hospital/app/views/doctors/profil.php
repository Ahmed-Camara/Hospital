<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">
            <div class="card">
                <h1>Doctor Profile</h1>

                <form action="<?php echo URLROOT;?>/doctors/updateProfile">
                    <label for="">ID</label>
                    <input value="<?php echo $data->id;?>" disabled>
                    <label for="">Name</label>
                    <input value="<?php echo $data->name;?>" disabled>
                    <label for="">Specialization</label>
                    <input value="<?php echo $data->specialisation;?>" disabled>
                    <label for="">Date of Birth</label>
                    <input value="<?php echo $data->dateOfBirth;?>" disabled>
                    <label for="">Address</label>
                    <input value="<?php echo $data->address;?>" disabled>
                    <label for="">Phone</label>
                    <input value="<?php echo $data->phone;?>" disabled>

                    <div class="loginButton">
                        <input type="submit" value="Update" class="btn">
                    </div>
                </form>
            </div>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>