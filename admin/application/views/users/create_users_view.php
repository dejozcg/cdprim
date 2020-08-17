<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/header_mobile'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<!-- PAGE CONTAINER-->
<div class="page-container">

    <?php $this->load->view('includes/header_desktop'); ?>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row center">
                    <div class="col-lg-6 mr-auto ml-auto">
                        <div class="card">
                            <div class="card-header">Podaci o korisniku</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <!-- <h3 class="text-center title-2">Podaci o korisniku</h3> -->
                                </div>
                                <hr>
                    <?php echo form_open('createuesrs'); ?>
                    <span class="badge badge-danger"><?php echo validation_errors(); ?><?php echo isset($errors) ? $errors : ""; ?></span>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input class="au-input au-input--full" value="<?php echo set_value('email') ? set_value('email') : ''; ?>" type="email" name="email" placeholder="Unesite email adresu" required>
                    </div>
                    <div class="form-group">
                        <label>Ime i prezime</label>
                        <input class="au-input au-input--full" type="text" name="fullname" placeholder="Unesite ime i prezime" value="<?php echo set_value('fullname') ? set_value('fullname') : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="au-input au-input--full" type="text" name="username" placeholder="Unesite username" required value="<?php echo set_value('username') ? set_value('username') : ''; ?>">
                    </div>
                    <div class="row row-xs">
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input class="au-input au-input--full " type="password" name="password" placeholder="Unesite password" required value="<?php echo set_value('password') ? set_value('password') : ''; ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Confirm Password</label>
                            <input class="au-input au-input--full" type="password" name="conpassword" placeholder="Unesite password" required value="<?php echo set_value('conpassword') ? set_value('conpassword') : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Rola:</label>
                        <select class="form-control select2" name="role" data-placeholder="Choose role" required>
                            <?php echo (set_value('role') == "") ?
                                "<option label='Choose role'></option><option value='1'>Admin</option><option value='2'>Editor</option>" : ((set_value('role') == 1) ? "<option value='1'>Admin</option><option value='2'>Editor</option>" : "<option value='2'>Editor</option><option value='1'>Admin</option>") ?>
                        </select>
                    </div>
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Napravi korisnika</button>
                    </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('includes/copyright'); ?>
        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>
<!-- end document-->