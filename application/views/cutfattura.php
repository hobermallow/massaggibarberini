<h3 class="page-title">
                        Nuova fattura
                    </h3>

                    <form class="row" method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>gestionedottori/caricaFattura">
                        <input type="hidden" name="id_dottore" value="<?php echo $dottore_edit[0]->id; ?>"/>
                        <div>
                            <div class="col-xs-4">
                                <input type="file" accept="application/pdf" name="filename"/>
                            </div>
                            <div class="col-xs-4">
                                <input type="number" name="totale" required class="form-control" placeholder="Totale"/>
                            </div>
                            <div class="col-xs-4">
                                <button type='submit' class="btn green">Conferma</button>
                            </div>
                        </div>
                    </form>
<div class="portlet-body flip-scroll">
                            <table class="table table-bordered table-striped table-condensed flip-content">
                                <thead class="flip-content">
                                    <tr>
                                        <th>
                                            Data
                                        </th>
                                        <th>
                                            Fattura
                                        </th>
                                        <th>
                                            Totale
                                        </th>
                                        <th class="numeric">
                                            Azioni
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $precId = 0;
                                    foreach ($fatture as $fattura):
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $fattura->data; ?>
                                            </td>
                                            <td>
                                                <a target="blank" href="<?php echo base_url(); ?>/fatture_dottori/<?php echo $fattura->id_dottore ?>/<?php echo $fattura->filename ?>">Visualizza</a>
                                            </td>
                                            <td>
                                                <?php echo $fattura->totale; ?> &euro;
                                            </td>
                                            <td class="numeric" style="text-align: center;" >
                                                <a href="<?php echo base_url(); ?><?php echo "gestionedottori/deleteFattura/" . $fattura->id_fattura; ?>" onclick="return confirm('Sei sicuro di voler eliminare questa fattura?')" title="Elimina" class="btn purple">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>