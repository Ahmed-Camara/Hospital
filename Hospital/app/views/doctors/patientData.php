<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/form.css">
</head>
<body>
<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require 'sidemenu/header.php';?>
        <section class="sidebar-content">

            <?php
                if(!empty($data['success'])){
                    echo '<div class="successMessagess">';
                        echo $data['success'];
                    echo '</div>';
                }else if(!empty($data['error'])){
                    echo '<div class="errorMessage">';
                        echo $data['error'];
                    echo '</div>';
                }
            ?>
            <section class="card">
                <div class="form-control">
                    <h1 style="text-align:center; text-transform:uppercase;">patient data</h1>
                </div>
                <form action="<?php echo URLROOT;?>/doctors/setPatientData" method="post">

                <div>
                    <div>
                        <label for="patientID">Patient ID</label>
                        <input type="text" value="<?php echo $data['patientID'];?>" name="patientID">
                        <span class="invalid"><?php echo $data['patientID_err'];?></span>
                    </div>

                    <div>
                        <label for="patientName">Patient Name</label>
                        <input type="text" value="<?php echo $data['patientName'];?>" name="patientName">
                    </div>


                    <div>
                        <label for="date">Date</label>
                        <input type="date" value="<?php echo $data['date'];?>" name="date">
                    </div>

                    <div>
                        <label for="details" style="display:block; margin-top:15px;">Details</label>
                        <textarea maxlength="100" style="width:100%;" id="" cols="35" rows="5" value="<?php echo $data['details'];?>" name="details"></textarea>
                    </div>

                    <div>
                        <label for="prescription" style="display:block; margin-top:15px;">Prescription</label>
                        <textarea maxlength="200" style="width:100%;" name="prescription" id="" cols="35" rows="5" value="<?php echo $data['prescription'];?>" name="prescription"></textarea>
                    </div>

                    <div>
                        <label for="cost" style="display:block; margin-top:15px;">Cost</label>
                        <input type="text" name="cost">
                    </div>

                    <div class="loginButton" style="margin-top:15px;">
                        <input type="submit" value="Save" class="btn">
                    </div>
                </div>
                </form>
            </section>
        </section>
    <?php require 'sidemenu/footer.php';?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>