<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Bendahara</h1>
        </div>

        <div class="container-fluid">

            <?php foreach ($bendahara as $bnhr) : ?>

                <form action="<?php echo base_url('operator/CBendaharaCRUD/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Bendahara</label>
                                <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $bnhr->nama_pengguna ?>">
                                <input type="hidden" name="id_pengguna" class="form-control" value="<?php echo $bnhr->id_pengguna ?>">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <!-- <select class="form-control" id="jabatan_pengguna" name="jabatan_pengguna"> -->
                                    <option value="Bendahara" class="form-control">Bendahara</option>
                                <!-- </select> -->
                            </div>

                            <div class="form-group">
                                <label>Status pengguna</label>
                                <select name="pengguna_status" class="form-control">
                                    <option value="Aktif" name="pengguna_status" class="form-control">Aktif</option>
                                    <option value="Nonaktif" name="pengguna_status" class="form-control">Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username Bendahara</label>
                                <input type="text" name="username_pengguna" class="form-control" value="<?php echo $bnhr->username_pengguna ?>">
                                <input type="hidden" name="id_pengguna" class="form-control" value="<?php echo $bnhr->id_pengguna ?>">
                            </div>

                            <div class="form-group">
                                <label>Password Bendahara</label>
                                <input type="text" name="password_pengguna" class="form-control" value="<?php echo $bnhr->password_pengguna ?>">
                            </div>
                        </div>
                    </div>

                    <?php echo anchor('operator/CBendaharaCRUD/', '<div class="btn btn-danger mb-1">Kembali</div>') ?>
                    <button type="submit" class="btn btn-primary btn sm mb-1 ml-3">Simpan</button>
                </form>

            <?php endforeach; ?>
        </div>
    </section>
</div>