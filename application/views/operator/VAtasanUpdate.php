<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Atasan</h1>
        </div>

        <div class="container-fluid">

            <?php foreach ($atasan as $atsn) : ?>

                <form action="<?php echo base_url('operator/CAtasanCRUD/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Atasan</label>
                                <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $atsn->nama_pengguna ?>">
                                <input type="hidden" name="id_pengguna" class="form-control" value="<?php echo $atsn->id_pengguna ?>">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <!-- <select class="form-control" id="jabatan_pengguna" name="jabatan_pengguna"> -->
                                    <option value="Atasan" class="form-control">Atasan</option>
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
                                <label>Username Atasan</label>
                                <input type="text" name="username_pengguna" class="form-control" value="<?php echo $atsn->username_pengguna ?>">
                                <input type="hidden" name="id_pengguna" class="form-control" value="<?php echo $atsn->id_pengguna ?>">
                            </div>

                            <div class="form-group">
                                <label>Password Atasan</label>
                                <input type="text" name="password_pengguna" class="form-control" value="<?php echo $atsn->password_pengguna ?>">
                            </div>
                        </div>
                    </div>

                    <?php echo anchor('operator/CAtasanCRUD/', '<div class="btn btn-danger mb-1">Kembali</div>') ?>
                    <button type="submit" class="btn btn-primary btn sm mb-1 ml-3">Simpan</button>
                </form>

            <?php endforeach; ?>
        </div>
    </section>
</div>