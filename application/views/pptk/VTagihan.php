<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Input / Edit Bukti Tagihan</h1>
        </div>

        <div class="container-fluid">

            <?php foreach ($kegiatan as $act) : ?>

                <form action="<?php echo base_url('pptk/CPPTK/fungsiInput') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <?php 
                                    if (empty($act->bukti_tagihan)) {
                                        echo '<center><img src="' . base_url('./assets/images/noimg.jpg') . '" class="img-fluid" /> </center>';
                                    
                                    } else {
                                        echo '<center><img src="' . base_url('./uploads/bukti_tagihan/' . $act->bukti_tagihan) . '" class="img-fluid" /> <br><br> </center>';
                                    }
                                ?>

                                <!-- <img src="<?php echo base_url('./uploads/bukti_tagihan/') . $act->bukti_tagihan ?>" class="img-fluid" /> <br><br> -->
                                <label>Bukti Tagihan</label>
                                <input type="file" class="form-control" name="bukti_tagihan">
                                <input type="hidden" name="bukti_tagihan" value="<?php echo $act->bukti_tagihan; ?>">
                            </div>
                            
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $act->nama_kegiatan ?>" readonly>
                                <input type="hidden" name="id_kegiatan" class="form-control" value="<?php echo $act->id_kegiatan ?>">
                            </div>

                            <div class="form-group">
                                <label>Sub Kegiatan</label>
                                <input type="text" name="sub_kegiatan" class="form-control" value="<?php echo $act->sub_kegiatan ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama Belanja</label>
                                <input type="text" name="nama_belanja" class="form-control" value="<?php echo $act->nama_belanja ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Kode Rekening</label>
                                <input type="text" name="kode_rekening" class="form-control" value="<?php echo $act->kode_rekening ?>" readonly>
                            </div>
                        
                            <div class="form-group">
                                <label>Pagu Anggaran</label>
                                <input type="text" name="pagu_anggaran" class="form-control" value="<?php echo $act->pagu_anggaran ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nama PPTK</label>
                                <input type="text" name="nama_pptk" class="form-control" value="<?php echo $act->nama_pptk ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Input</label>
                                <input type="date" name="tanggal_input" class="form-control" value="<?php echo $act->tanggal_input ?>" readonly>
                            </div>
                        </div>

                    </div>

                    <?php echo anchor('pptk/CPPTK/', '<div class="btn btn-danger mb-1">Kembali</div>') ?>
                    <button type="submit" class="btn btn-primary btn sm mb-1 ml-3">Simpan</button>
                </form>

            <?php endforeach; ?>
        </div>
    </section>
</div>