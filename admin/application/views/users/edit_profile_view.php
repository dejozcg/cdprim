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
                            <div class="card-header">Podaci</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <!-- <h3 class="text-center title-2">Podaci o korisniku</h3> -->
                                </div>
                                <hr>
                                <?php echo form_open('editprofile', 'enctype="multipart/form-data"'); ?>
                                <span class="badge badge-danger"><?php echo validation_errors(); ?><?php echo isset($errors) ? $errors : ""; ?></span>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" value="<?php echo set_value('email') ? set_value('email') : $this->session->userdata('user')['email']; ?>" type="email" name="email" placeholder="Unesite email adresu" required>
                                    <input type="hidden" name="id" class="form-control" required value="<?php echo $this->session->userdata('user')['user_id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Ime i prezime</label>
                                    <input class="au-input au-input--full" type="text" name="fullname" placeholder="Unesite ime i prezime" value="<?php echo  set_value('fullname') ? set_value('fullname') : $this->session->userdata('user')['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Unesite username" required value="<?php echo set_value('username') ? set_value('username') : $this->session->userdata('user')['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Picture: </label>
                                    <input type="file" class="form-control-file" name="userPhoto" id="userPhoto">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#smallmodal">
                                        Reset password
                                    </button>
                                </div>


                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Edit user</button>
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
<!-- modal small -->
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Resset password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $attributes = array('name' => 'formRessetPass');
            echo form_open('ressetpwd', $attributes); ?>
            <div class="modal-body">
                <div class='error_msg'>
                    <span class="tx-danger"><?php echo validation_errors(); ?><?php echo isset($errors) ? $errors : ""; ?></span>
                </div>
                <input type="password" id="password" name="password" class="col col-md-12 form-control" placeholder="Type password" required>
                <input type="password" id="conpassword" name="conpassword" class="col col-md-12 form-control" placeholder="Retype password" required>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                <button type="submit" class="btn btn-primary">Potvrdi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal small -->

<?php $this->load->view('includes/footer'); ?>
<!-- end document-->


<script>
    function submitform() {
        document.formRessetPass.submit();
    }
</script>