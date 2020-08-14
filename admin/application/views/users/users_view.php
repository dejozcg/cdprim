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
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">Pregled korisnika</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-right">
                                <a href="<?=base_url()?>createuesrs" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>novi korisnik</a>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <div class="input-group"> <span class="input-group-addon">Filter</span>
                                <input id="filter" type="text" class="form-control col-3" placeholder="Type here...">
                            </div>
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Ime</th>
                                        <th>Email</th>
                                        <th>Datum Kreiranja</th>
                                        <th>Kreirao</th>
                                        <th>Rola</th>
                                        <th>Akcija</th>
                                    </tr>
                                </thead>
                                <tbody class="searchable">
                                    <?php if (!empty($users)) : foreach ($users as $user) : ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $user['name']; ?></td>
                                                <td><span class="block-email"><?php echo $user['email']; ?></span></td>
                                                <td><?php echo $user['dateCreated']; ?></td>
                                                <td><?php echo $user['addedby']; ?></td>
                                                <td><?php echo $user['rname']; ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a class="item" href="<?= base_url() ?>showusers/<?php echo $user['id']; ?>" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a class="item" onclick="dellData(<?php echo $user['id']  . ',&#39;' . base_url() . 'deleteusr/&#39;'; ?>)" href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>Nema korisnika</p>
                        <?php endif; ?>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
                <?php $this->load->view('includes/copyright'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>
<script>
    $(document).ready(function() {
      
        (function($) {

            $('#filter').keyup(function() {

                var rex = new RegExp($(this).val(), 'i');
                $('.searchable tr').hide();
                $('.searchable tr').filter(function() {
                    return rex.test($(this).text());
                }).show();

            })

        }(jQuery));

    });

    function dellData(id, url) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
 
        Swal.fire({
            text: "Are you sure you want to delete?",
            showCancelButton: true,
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.value) {
                console.log('klik na yes u modal', id);
                $.ajax({
                    type: 'POST',
                    url: url + id,
                    //data: {
                    //    id: id
                    //},
                    success: function(data) {

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });

                        // window.location(url); 
                    },
                    error: function(data) {
                        swal("NOT Deleted!", "Something blew up.", "error");
                    }
                });
            } else {
                console.log('klik na no u modal');
            }
        });

    }
</script>