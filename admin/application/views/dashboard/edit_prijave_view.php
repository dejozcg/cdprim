<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/header_mobile'); ?>
<?php $this->load->view('includes/sidebar'); ?>


<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php $this->load->view('includes/header_desktop'); ?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Detalji podnijete</strong> prijave
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">ID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['id']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Datum primjedbe</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['datum_i']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Status</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['status']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Kategorija</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['kategorija']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Opis kategorije</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['opis']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Grad</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['grad']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class=" form-control-label">Primjedba</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $prijava['primjedba']; ?></p>
                                        </div>
                                    </div>
                                    <!-- <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Text Input</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control">
                                            <small class="form-text text-muted">This is a help text</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email Input</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control">
                                            <small class="help-block form-text">Please enter your email</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control">
                                            <small class="help-block form-text">Please enter a complex password</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="disabled-input" class=" form-control-label">Disabled Input</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Textarea</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Select</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="select" id="select" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="selectLg" class=" form-control-label">Select Large</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="selectSm" class=" form-control-label">Select Small</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                                <option value="4">Option #4</option>
                                                <option value="5">Option #5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="disabledSelect" class=" form-control-label">Disabled Select</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                                <option value="0">Please select</option>
                                                <option value="1">Option #1</option>
                                                <option value="2">Option #2</option>
                                                <option value="3">Option #3</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="<?=base_url()?>create/<?php echo $prijava['id']; ?>" class="btn btn-dark btn-sm">
                                    <i class="fa fa-print"></i> Stampa prijave
                                </a>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <?php $this->load->view('includes/copyright'); ?>

            </div>
        </div>
    </div>
</div>

</div>

<?php $this->load->view('includes/footer'); ?>