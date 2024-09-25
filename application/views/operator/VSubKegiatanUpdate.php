<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Sub Kegiatan</h1>
        </div>

        <div class="container-fluid">

            <?php foreach ($kegiatan as $act) : ?>

                <form action="<?php echo base_url('operator/CSubKegiatanCRUD/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $act->nama_kegiatan ?>">
                                <input type="hidden" name="id_subkegiatan" class="form-control" value="<?php echo $act->id_subkegiatan ?>">
                            </div>

                            <div class="form-group">
                                <label>Sub Kegiatan</label>
                                <input type="text" name="sub_kegiatan" class="form-control" value="<?php echo $act->sub_kegiatan ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Belanja</label>
                                <input type="text" name="nama_belanja" class="form-control" value="<?php echo $act->nama_belanja ?>">
                            </div>

                            <div class="form-group">
                                <label>Kode Rekening</label>
                                <input type="text" name="kode_rekening" class="form-control" value="<?php echo $act->kode_rekening ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pagu Anggaran</label>
                                <input type="text" name="pagu_anggaran" class="form-control" value="<?php echo $act->pagu_anggaran ?>">
                            </div>
                                      
                            <div class="form-group">
                                <label>Nama Pemangku</label>
                                <input type="text" name="nama_pptk" class="form-control" value="<?php echo $act->nama_pptk ?>">
                                
                            </div>

                            <div class="form-group">
                                <label>Tanggal Input</label>
                                <input type="date" name="tanggal_input" class="form-control" value="<?php echo $act->tanggal_input ?>">
                            </div>
                        </div>

                    </div>
                    <?php echo anchor('operator/CSubKegiatanCRUD/', '<div class="btn btn-danger mb-1">Kembali</div>') ?>
                    <button type="submit" class="btn btn-primary mb-1 ml-3">Simpan</button>
                </form>

            <?php endforeach; ?>
        </div>
    </section>
</div>