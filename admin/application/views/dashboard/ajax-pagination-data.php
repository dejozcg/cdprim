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