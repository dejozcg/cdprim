<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('includes/header'); ?>
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?=base_url()?>theme/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <?php echo form_open('login', 'id = "login_form"'); ?>
                            <!-- <form action="" method="post"> -->
                            <span class="badge badge-danger"><?php echo validation_errors(); ?><?php echo isset($errors)? $errors:""; ?></span>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email"  value="<?php echo set_value('email'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                                </div>
                                <button id="btn_login" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('includes/footer'); ?>
<!-- end document-->