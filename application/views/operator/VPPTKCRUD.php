<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>PPTK</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>

        <buttton class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahPPTK">
            <i class="fas fa-user-plus fa-sm"></i> Tambah PPTK</buttton>
            <a  class="btn btn-warning mb-3" href = "<?php echo base_url('operator/CPPTKcrud/print')?>" >
            <i class="fas fa-fw fa-print"></i> Print</a>

        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Nama PPTK</th>
                 <th>Kode Rekening</th>
                <th>Jabatan</th>
                <th>Username PPTK</th>
                <th>Status</th>

                <th colspan="2">Aksi</th>
            </thead>

            <?php
            $no = 1;
            foreach ($pptk as $ptk) :
            ?>
                <tbody>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ptk->nama_pengguna ?></td>
                    <td><?php echo $ptk->kode_rek ?></td>
                    <td><?php echo $ptk->jabatan_pengguna ?></td>
                    <td><?php echo $ptk->username_pengguna ?></td>
                    <td><?php echo $ptk->pengguna_status ?></td>

                    <td>
                        <?php echo anchor(
                            'operator/CPPTKCRUD/halamanUpdate/' . $ptk->id_pengguna,
                            '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>'
                        ) ?>
                    </td>

                    <td>
                        <!-- <a class="btn btn-danger btn-sm" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                            href="<?php echo base_url('operator/CPPTKCRUD/fungsiDelete/') . $ptk->id_pengguna ?>">
                            <i class="fa fa-trash"></i>
                        </a> -->

                        <a onclick="deleteConfirm('<?php echo site_url('operator/CPPTKCRUD/fungsiDelete/' . $ptk->id_pengguna) ?>')" href="#!" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>
                    </td>
                </tbody>
            <?php endforeach; ?>
        </table>

    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="TambahPPTK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah PPTK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('operator/CPPTKCRUD/fungsiTambah') ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama PPTK</label>
                                <input type="text" name="nama_pengguna" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <!-- <select class="form-control" id="jabatan_pengguna" name="jabatan_pengguna"> -->
                                    <option value="PPTK" class="form-control">PPTK</option>
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
                                    <label>Kode Rekening</label>
                                    <input type="text" name="kode_rek" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Username PPTK</label>
                                    <input type="text" name="username_pengguna" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Password PPTK</label>
                                    <input type="text" name="password_pengguna" class="form-control" required>
                                </div>
                                
                            </div>
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

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang sudah dihapus tidak bisa dikembalikan</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>