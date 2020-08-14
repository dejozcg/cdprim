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
                    <div class="col-md-4">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Pregled opština</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-right">
                                    <a href="<?= base_url() ?>createopstina" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>nova opština</a>
                                </div>
                            </div>
                                <div class="input-group"> <span class="input-group-addon">Filter</span>
                                    <input id="filter" type="text" class="form-control col-10" placeholder="Type here...">
                                </div>
                                <table class="table table-borderless table-striped table-responsive-stack">
                                    <thead class="bg-dark">
                                        <th>Id</th>
                                        <th class="text-left">Naziv</th>
                                        <th>Akcija</th>
                                    </thead>
                                    <tbody class="searchable">
                                        <?php if (!empty($opstine)) : foreach ($opstine as $opstina) : ?>
                                                <tr>
                                                    <td class=""><?php echo $opstina['id']; ?></td>
                                                    <td class="col-md-8 text-left"><?php echo $opstina['naziv_gr']; ?></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a class="item" href="<?= base_url() ?>showopst/<?php echo $opstina['id']; ?>" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                            </a>
                                                            <a class="item" onclick="dellData(<?php echo $opstina['id']  . ',&#39;' . base_url() . 'deletekateg/&#39;'; ?>, 'grad')" href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>Nema opstina</p>
                            <?php endif; ?>
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

    function dellData(id, url, tbl) {
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
                    data: {
                       tbl: 'grad'
                    },
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