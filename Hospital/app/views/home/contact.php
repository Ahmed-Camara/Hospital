<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php
        if(!empty($data['error'])){
            echo "<div style='margin:20px auto;' class='errorMessage'>";
                echo $data['error'];
            echo "</div>";
        }else if(!empty($data['success'])){
            
            echo "<div style='margin:20px auto;' class='succesMessage'>";
                echo $data['success'];
            echo "</div>";
        }
    ?>
    <section class="contact">

    <div class="card">
        <h1>CONTACT US</h1>


        <form action="<?php echo URLROOT;?>/home/contactUs" method="post" id="form">

            <div class="form-control space">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                
            </div>
            <div class="form-control space">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                
            </div>

            <div class="form-control space">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone">
                
            </div>

            <div class="form-control space">
                <label for="id">ID</label>
                <input type="text" name="id" id="id">
                
            </div>

            <div class="form-control space">
                <label for="message" >Message Body (Maximum 100 characters)</label>
                <textarea style="width:100%;" maxlength="100" name="message" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="loginButton">
                <input type="submit" value="Send Message" class="btn">
            </div>
        </form>
    </div>
    </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>