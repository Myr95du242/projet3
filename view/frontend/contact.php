
<?php $title='Contact'; ?>

<?php ob_start(); ?>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2"> <!-- name="sentMessage" id="contactForm" -->
                    <form action="index.php?action=checkContact" method="post" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"
                                value="<?php if(isset($_POST['name']) AND !empty($_POST['name'])){ echo $_POST['name'] ;} ?>" placeholder="Name" id="name" >
                                <p class="help-block text-danger"></p><required data-validation-required-message="Please enter your name.">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>First Name</label>
                                <input type="tel" class="form-control" name="firstname" value="<?php if(isset($_POST['firstname']) AND !empty($_POST['firstname'])){ echo $_POST['firstname'] ;} ?>"  placeholder="First Name" id="firstname" >
                                <p class="help-block text-danger"></p><required data-validation-required-message="Please enter your phone number.">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email_adress" value="<?php if(isset($_POST['email_adress']) AND !empty($_POST['email_adress'])){ echo $_POST['email_adress'] ;} ?>"  placeholder="Email Address" id="email_adress">
                                <p class="help-block text-danger"></p><required data-validation-required-message="Please enter your email address.">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="1" class="form-control" name="message" placeholder="Message" id="message" ></textarea><required data-validation-required-message="Please enter a message."-->
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                               <button type="submit" name="envoi" class=" btn "> Send</button>
                            </div>
                        </div>                     
                    </form>
                    <div>
	                    <?php 
	                    	if(isset($_GET['err_login']) AND !empty($_GET['err_login']))
	                  		echo '<br/><font color="red">'.$_GET['err_login']. '</font>';
	                    ?> 
                    </div>  
                </div>
            </div>
        </div>
    </section>

    <?php $content=ob_get_clean(); ?>
    <?php require('template.php'); ?>
