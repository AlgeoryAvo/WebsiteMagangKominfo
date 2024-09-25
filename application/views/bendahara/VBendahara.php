<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kegiatan</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>

<!--        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Kegiatan Selesai
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        220 / 220
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fa-2x text-gray-300"></i> -->

                <div class="col-xl-5 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Anggaran Terserap
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><td>Rp<?php echo number_format($pagu_anggaran, 0, ',', '.') ?> /  <td>Rp<?php echo number_format($nominal, 0, ',', '.') ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fas-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                <table id="dataTables" class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <!-- <th>ID Kegiatan</th> -->
                        <th>Nama Kegiatan</th>
                        <th>Sub Kegiatan</th>
                        <th>Nama Belanja</th>
                        <th>Kode Rekening</th>
                        <th>Pagu Anggaran</th>
                        <th>Nama PPTK</th>
                        <th>Tanggal Input</th>
                        <th>Nominal Pembayaran</th>
                        <th>Bukti Tagihan</th>
                        <th>Bukti Transfer</th>
                        <th>Status Pembayaran</th>
                        <th colspan="2">Aksi</th>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($kegiatan as $act) :
                    ?>
                        <tbody>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $act->nama_kegiatan ?></td>
                            <td><?php echo $act->sub_kegiatan ?></td>
                            <td><?php echo $act->nama_belanja ?></td>
                            <td><?php echo $act->kode_rekening ?></td>
                            <td>Rp<?php echo number_format($act->pagu_anggaran, 0, ',', '.') ?></td>
                            <td><?php echo $act->nama_pptk ?></td>
                            <td><?php echo $act->tanggal_input ?></td>
                            <td>Rp<?php echo number_format($act->nominal, 0, ',', '.') ?></td>

                            <td>
                                <?php 
                                    if (empty($act->bukti_tagihan)) {
                                        echo '<center><img src="' . base_url('./assets/images/no-image.jpg') . '" border="0" width="70px"> </center>';

                                    } else {
                                        echo '<center><img src="' . base_url('./uploads/bukti_tagihan/' . $act->bukti_tagihan) . '" border="0" width="70px"> </center>';
                                    }
                                ?>
                            </td>

                            <td>
                                <?php 
                                    if (empty($act->bukti_transfer)) {
                                        echo '<center><img src="' . base_url('./assets/images/no-image.jpg') . '" border="0" width="70px"> </center>';
                                
                                    } else {
                                        echo '<center><img src="' . base_url('./uploads/bukti_transfer/' . $act->bukti_transfer) . '" border="0" width="70px"> </center>';
                                    }
                                ?>
                            </td>

                            <td>
                                <?php
                                    if (empty($act->bukti_tagihan) && empty($act->bukti_transfer)) {
                                        echo "<span class='badge badge-pill badge-dark'>Belum dijalankan</span>";
                                    } elseif (empty($act->bukti_transfer)) {
                                        echo "<span class='badge badge-pill badge-danger'>Belum dibayar</span>";
                                    } elseif (!empty($act->bukti_tagihan) && !empty($act->bukti_transfer)) {
                                        echo "<span class='badge badge-pill badge-success'>Sudah dibayar</span>";
                                    }
                                ?>
                            </td>

                            <td>
                            <?php echo anchor(
                                    'bendahara/CBendahara/halamanInput/' . $act->id_kegiatan,
                                    '<div class="btn btn-primary btn-sm"><i class="fas fa-file-medical"></i></div>'
                                ) ?>
                            </td>
                        </tbody>
                    <?php endforeach; ?>
                </table>
                </div>

    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="InputBuktiTagihan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Bukti Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('pptk/CPPTK/fungsiInput') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Bukti Tagihan</label>
                        <input type="file" name="bukti_tagihan" class="form-control">
                    </div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('pptk/CPPTK/fungsiInput') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>