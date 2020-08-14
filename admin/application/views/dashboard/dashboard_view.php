<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/header_mobile'); ?>
<?php $this->load->view('includes/sidebar'); ?>


<!-- PAGE CONTAINER-->
<div class="page-container">

    <?php $this->load->view('includes/header_desktop'); ?>

    <script>
        function searchFilter(page_num, id) {
            page_num = page_num ? page_num : 0;

            var status = $('#status').val();
            if(id != undefined && id !== 6){
                status = id;
                $('#status').val('');
            }

            var grad = $('#grad').val();
            var datumod = $('#datumod').val();
            var datumdo = $('#datumdo').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>dashboard/ajaxPaginationData/' + page_num,
                data: 'page=' + page_num + '&status=' + status + '&grad=' + grad + '&datumod=' + datumod + '&datumdo=' + datumdo,
                beforeSend: function() {
                    $('.loading').show();
                },
                success: function(html) {
                    $('#postList').html(html);
                    $('.loading').fadeOut("slow");
                    // $('#datatable11').DataTable({
                    //     responsive: true,
                    //     "paging": false,
                    //     "info": false,
                    //     searching: false,
                    //     retrieve: true
                    // });
                }
            });
        }
    </script>



    <?php
            $ukupno = 0;
            $podnesen = 0;
            $procedura = 0;
            $odbacen = 0;
            $rijesen = 0;
            //$izbrisane = 0;

    if (!empty($statistic)) {
        foreach ($statistic as $stat) {
            if ($stat['id'] == 1) {
                $podnesen = $stat['ukupno'];
            } elseif ($stat['id'] == 2) {
                $procedura = $stat['ukupno'];
            } elseif ($stat['id'] == 3) {
                $odbacen = $stat['ukupno'];
            } elseif ($stat['id'] == 4) {
                $rijesen = $stat['ukupno'];
            } else {
                $izbrisane = $stat['ukupno'];
            }
        }
    } 

    
   $ukupno = $podnesen + $procedura + $odbacen + $rijesen;

    ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Statistika</h2>
                            <!-- <button class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>add item</button> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="text-light display-6">Status podnešenih prijava
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <aside class="profile-nav alt">
                            <section class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#" onclick="searchFilter(0,6)">
                                            <i class="fa fa-envelope" style="margin-right: 10px"></i> Sve prijave <?= $ukupno; ?>
                                            <!-- <span class="badge badge-primary pull-right"></span> -->
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" onclick="searchFilter(0,1)">
                                            <i class="fa fa-tasks" style="margin-right: 10px"></i> Podnešene <?= $podnesen; ?>
                                            <!-- <span class="badge badge-danger pull-right"></span> -->
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" onclick="searchFilter(0,2)">
                                            <i class="fa fa-calendar-o" style="margin-right: 10px"></i> U proceduri <?= $procedura; ?>
                                            <!-- <span class="badge badge-success pull-right"> </span> -->
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" onclick="searchFilter(0,4)">
                                            <i class="fa fa-check" style="margin-right: 10px"></i> Riješene <?= $rijesen; ?>
                                            <!-- <span class="badge badge-warning pull-right r-activity"></span> -->
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" onclick="searchFilter(0,5)">
                                            <i class="fa fa-minus-circle" style="margin-right: 10px"></i> Odbačen <?= $odbacen; ?>
                                            <!-- <span class="badge badge-warning pull-right r-activity"></span> -->
                                        </a>
                                    </li>
                                    <!-- <li class="list-group-item">
                                        <a href="<?//= base_url() ?>prijave/5">
                                            <i class="fa fa-eraser"></i> Obrisane <?//= $izbrisane; ?>
                                          
                                        </a>
                                    </li> -->
                                </ul>

                            </section>
                        </aside>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3 class="title-2 m-b-40"></h3>
                                <canvas id="pieChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Prikaz podnijetih prijava</h2>
                        <div class="table-responsive table--no-card m-b-12">
                            <div class="input-group"> <span class="input-group-addon">Filter</span>
                                <input id="filter" type="text" class="form-control col-3" placeholder="Type here...">
                                <select id="status" name="status" onchange="searchFilter()" class="form-control col-3">
                                    <option value="">pretraga po statusu</option>
                                        <?php if (!empty($statusi)) :  foreach ($statusi as $status) : ?>    
                                    <option value="<?php echo $status['id']; ?>"><?php echo $status['naziv']; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                                <select id="grad" name="grad" onchange="searchFilter()" class="form-control col-3">
                                    <option value="">pretraga po opštini</option>
                                        <?php if (!empty($gradovi)) :  foreach ($gradovi as $grad) : ?>    
                                    <option value="<?php echo $grad['id']; ?>"><?php echo $grad['naziv_gr']; ?></option>
                                    <?php endforeach; endif; ?>
                                </select>
                                <input id="datumod" type="date" class="form-control col-3" placeholder="datum od" onchange="searchFilter()">
                                <input id="datumdo" type="date" class="form-control col-3" placeholder="datum do" onchange="searchFilter()">
                            </div>
                            <div class="table-wrapper" id="postList">
                                <table id="datatable11" class="table table-borderless table-striped table-responsive-stack">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Kategorija</th>
                                            <th>Grad ID</th>
                                            <th>Primjedba</th>
                                            <th>Ime / Email</th>
                                            <th>Datum primjedbe</th>
                                            <th>Status</th>
                                            <th>Akcija</th>
                                        </tr>
                                    </thead>
                                    <tbody class="searchable">
                                        <?php if (!empty($prijave)) :  foreach ($prijave as $prijava) : ?>
                                                <tr>
                                                    <td><?php echo $prijava['id']; ?></td>
                                                    <td><?php echo $prijava['kategorija']; ?></td>
                                                    <td><?php echo $prijava['grad']; ?></td>
                                                    <td><?php echo (strlen($prijava['primjedba']) > 20) ? substr($prijava['primjedba'], 0, 20) . "..." : $prijava['primjedba']; ?></td>
                                                    <td><?php echo $prijava['ime'] . '<br>' .  $prijava['email']; ?></td>
                                                    <!-- <td><?php // echo $prijava['email']; ?></td> -->
                                                    <td><?php echo $prijava['datum_i']; ?></td>
                                                    <td><?php echo $prijava['status']; ?></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a class="item"  href="<?= base_url() ?>create/<?php echo $prijava['id']; ?>" title="Stampa prijave">
                                                                <i class="zmdi zmdi-print"></i>
                                                            </a>
                                                            <a class="item"  href="<?= base_url() ?>prijava/<?php echo $prijava['id']; ?>" title="Postupi po prijavi">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </a>
                                                            <a class="item" onclick="dellData(<?php echo $prijava['id'] . ',&#39;' . base_url() . 'promijeniStat/&#39;'; ?>)" href="#" title='Izbrisi prijavu'>
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </a>
                                                        </div>
                                                    </td>



                                                </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                    
                                <?php else : ?>
                                    <p>Nema unijetih prijava.</p>
                                <?php endif; ?>
                                </table>
                                <?php echo $this->ajax_pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $this->load->view('includes/copyright'); ?>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

<?php $this->load->view('includes/footer'); ?>

<script>
    // sweetAlert("Hello world!");
    try {

        //pie chart
        var ctx = document.getElementById("pieChart1");
        if (ctx) {
            ctx.height = 200;
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [<?php echo $podnesen . ', ' . $odbacen . ', ' . $procedura . ', ' . $rijesen; ?>], // . ', ' . $izbrisane
                        backgroundColor: [
                            "rgba(0,0,0,0.08)",
                            "rgb(11, 116, 237, 0.8)",
                            "rgb(237, 19, 11, 0.8)",
                            "rgba(63, 191, 89,0.8)"
                            //"rgba(63, 191, 89,0.4)"
                            // "rgba(0, 123, 255,0.5)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0,0,0,0.1)",
                            "rgb(11, 116, 237, 1)",
                            "rgb(237, 19, 11, 1)",
                            "rgb(63, 191, 89, 1)"
                            // "rgba(63, 191, 89,0.6)"
                            // "rgba(0, 123, 255, 0.5)"
                        ]

                    }],
                    labels: [
                        "Neobrađen",
                        "Odbačen",
                        "U proceduri",
                        "Riješeni"
                        // "Izbrisani"
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    responsive: true
                }
            });
        }
    } catch (error) {
        console.log(error);
    }
</script>
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
                    url: url,
                    data: {
                        'idprij': id,
                        'status': 5
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