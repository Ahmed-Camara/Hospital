<header>
    <div class="menu">
        <img src="<?php echo URLROOT;?>/image/hospital-logo.png" alt="">
        <div>
            <ul class="links" id="top">
                <?php if( !isset($_SESSION['current_admin']->email) && !isset($_SESSION['current_doctor']->email) &&
                !isset($_SESSION['current_patient']->email) ) : ?>
                    <li class="item"><a href="<?php echo URLROOT;?>/home">HOME</a></li>
                    <li class="item"><a href="<?php echo URLROOT;?>/home/about">ABOUT</a></li>
                    <li class="item"><a href="<?php echo URLROOT;?>/home/contactUs">CONTACT</a></li>
                
                <?php else : ?>
                    <?php if(isset($_SESSION['current_admin']->email)) : ?>
                        <li class="item"><a href="<?php echo URLROOT;?>/users/logout">LOG OUT</a></li>
                    <?php elseif(isset($_SESSION['current_doctor']->email)) :  ?>
                        <li class="item"><a href="<?php echo URLROOT;?>/users/logout">LOG OUT</a></li>
                    <?php elseif(isset($_SESSION['current_patient']->email)) :  ?>
                        <li class="item"><a href="<?php echo URLROOT;?>/users/logout">LOG OUT</a></li>
                    <?php endif;?>
                <?php endif;?>
            </ul>
        </div>
        <a onclick="displayRespnsiveMenu()" class="icon">
            <i class="fa fa-bars">
            </i>
        </a>
    </div>
</header>