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
                    <?php echo form_open('createkategorija'); ?>
                    <span class="badge badge-danger"><?php echo validation_errors(); ?><?php echo isset($errors) ? $errors : ""; ?></span>
                    <div class="form-group">
                        <label>Naziv kategorije</label>
                        <input class="au-input au-input--full" value="<?php echo set_value('naziv') ? set_value('naziv') : ''; ?>" type="text" name="naziv" placeholder="Unesite naziv kategorije" required>
                    </div>
                    <div class="form-group">
                        <label>Opis kategorije</label>
                        <textarea class="form-control" name="opis" id="opis" cols="30" rows="10" placeholder="Unesite iopis kategorije" value="<?php echo set_value('opis') ? set_value('opis') : ''; ?>" required></textarea>
                    </div>
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Unesi kategoriju</button>
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