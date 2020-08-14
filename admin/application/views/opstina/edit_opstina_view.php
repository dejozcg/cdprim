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
                            <div class="card-header">Podaci o opštini</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <!-- <h3 class="text-center title-2">Podaci o korisniku</h3> -->
                                </div>
                                
                                <?php echo form_open('editopst'); ?>
                                <span class="badge badge-danger"><?php echo validation_errors(); ?><?php echo isset($errors) ? $errors : ""; ?></span>
                                <div class="form-group">
                                    <label>Naziv opštine</label>
                                    <input class="au-input au-input--full" value="<?php echo set_value('naziv') ? set_value('naziv') : $opstina['naziv_gr'];; ?>" type="text" name="naziv" placeholder="Unesite naziv opštine" required>
                                    <input type="hidden" name="id" class="form-control" placeholder="" required value="<?php echo set_value('id') ? set_value('id') : $opstina['id']; ?>">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Izmijeni opštinu</button>
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