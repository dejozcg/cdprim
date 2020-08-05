<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/header_mobile'); ?>
<?php $this->load->view('includes/sidebar'); ?>


<!-- PAGE CONTAINER-->
<div class="page-container">

    <?php $this->load->view('includes/header_desktop'); ?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table id="datatable1" class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Naziv</th>
                                        <th>Opis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($kategorije)) : foreach ($kategorije as $kategorija) : ?>
                                            <tr>
                                                <td class=""><?php echo $kategorija['naziv']; ?></td>
                                                <td class=""><?php echo $kategorija['opis']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>Nema korisnika</p>
                        <?php endif; ?>


                        </tbody>
                        </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
                <?php $this->load->view('includes/copyright'); ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('includes/footer'); ?>