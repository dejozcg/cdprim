<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/header_mobile'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<!-- PAGE CONTAINER-->
<div class="page-container">

    <?php $this->load->view('includes/header_desktop'); ?>
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-form">
                        <?php echo form_open('editusers'); ?>
                        <span class="badge badge-danger"><?php echo validation_errors(); ?><?php echo isset($errors) ? $errors : ""; ?></span>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="au-input au-input--full" value="<?php echo set_value('email') ? set_value('email') : $users['email'] ; ?>" type="email" name="email" placeholder="Unesite email adresu" required>
                            <input type="hidden" name="id" class="form-control" placeholder="" required value="<?php echo set_value('id') ? set_value('id') : $users['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Ime i prezime</label>
                            <input class="au-input au-input--full" type="text" name="fullname" placeholder="Unesite ime i prezime" value="<?php echo set_value('fullname') ? set_value('fullname') : $users['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="au-input au-input--full" type="text" name="username" placeholder="Unesite username" required value="<?php echo set_value('username') ? set_value('username') : $users['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Unesite password" required value="<?php echo set_value('password') ? set_value('password') : $users['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Rola:</label>
                            <select class="form-control select2" name="role" data-placeholder="Choose role" required>
                                <?php if (isset($users['roleId'])) {
                                    echo $users['roleId'] == 1 ? "<option value='1'>Admin</option><option value='2'>Editor</option>" : "<option value='2'>Editor</option><option value='1'>Admin</option>";
                                } else {
                                    echo (set_value('role') == 1) ? "<option value='1'>Admin</option><option value='2'>Editor</option>" : "<option value='2'>Editor</option><option value='1'>Admin</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Edit user</button>
                        </form>
                    </div>
                </div>
                <?php $this->load->view('includes/copyright'); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>
<!-- end document-->