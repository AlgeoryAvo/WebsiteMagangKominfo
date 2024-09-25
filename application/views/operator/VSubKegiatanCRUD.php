<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sub Kegiatan</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>

        <div class="container-fluid">
            <div class="row">
            <div class="col-xl-5 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="small text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    ANGGARAN TERSERAP
                                    </div>
                                    <div class="h8 mb-0 font-weight-bold text-gray-800">
                                        <td>Rp<?php echo number_format($pagu_anggaran, 0, ',', '.') ?> /  <td>
                                            Rp<?php echo number_format($nominal, 0, ',', '.') ?> </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="small text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        KEGIATAN
                                    </div>
                                    <div class="h8 mb-0 font-weight-bold text-gray-800"><?= $keg ?></td>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="small text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        TOTAL USER
                                    </div>
                                    <div class="h8 mb-0 font-weight-bold text-gray-800"><?= $PPTK ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fas-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <buttton class="btn btn-primary mb-3" data-toggle="modal" data-target="#TambahKegiatan">
            <i class="fas fa-plus fa-sm"></i> Tambah Kegiatan</buttton>
            <a  class="btn btn-warning mb-3" href = "<?php echo base_url('operator/CSubKegiatanCRUD/print')?>" >
            <i class="fas fa-fw fa-print"></i> Print</a>
            
        <div class="table-responsive">
            <table id="dataTables" class="table table-hover table-striped table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Sub Kegiatan</th>
                    <th>Nama Belanja</th>
                    <th>Kode Rekening</th>
                    <th>Pagu Anggaran</th>
                    <th>Nama PPTK</th>
                    <th>Tanggal Input</th>
                    <th>Bukti Tagihan</th>
                    <th>Bukti Transfer</th>
                    <th>Status Pembayaran</th>
                    <th colspan="3">Aksi</th>
                </thead>

                <?php
                $no = 1;
                foreach ($kegiatan as $dxd) :
                ?>
                    <tbody>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $dxd->nama_kegiatan ?></td>
                        <td><?php echo $dxd->sub_kegiatan ?></td>
                        <td><?php echo $dxd->nama_belanja ?></td>
                        <td><?php echo $dxd->kode_rekening ?></td>
                        <td>Rp<?php echo number_format($dxd->pagu_anggaran, 0, ',', '.') ?></td>
                        <td><?php echo $dxd->nama_pptk ?></td>
                        <td><?php echo $dxd->tanggal_input ?></td>

                        <td>
                            <?php 
                                if (empty($dxd->bukti_tagihan)) {
                                    echo '<center><img src="' . base_url('./assets/images/noimg.jpg') . '" border="0" width="70px" height="70px"> </center>';
                                
                                } else {
                                    echo '<center><img src="' . base_url('./uploads/bukti_tagihan/' . $dxd->bukti_tagihan) . '" border="0" width="70px" height="70px"> </center>';
                                }
                            ?>
                        </td>

                        <td>
                            <?php 
                                if (empty($dxd->bukti_transfer)) {
                                    echo '<center><img src="' . base_url('./assets/images/noimg.jpg') . '" border="0" width="70px" height="70px"> </center>';
                                
                                } else {
                                    echo '<center><img src="' . base_url('./uploads/bukti_transfer/' . $dxd->bukti_transfer) . '" border="0" width="70px" height="70px"> </center>';
                                }
                            ?>
                        </td>

                        <td>
                            <?php
                                if (empty($dxd->bukti_tagihan) && empty($dxd->bukti_transfer)) {
                                    echo "<span class='badge badge-pill badge-dark'>Belum dijalankan</span>";
                                } elseif (empty($dxd->bukti_transfer)) {
                                    echo "<span class='badge badge-pill badge-danger'>Belum dibayar</span>";
                                } elseif (!empty($dxd->bukti_tagihan) && !empty($dxd->bukti_transfer)) {
                                    echo "<span class='badge badge-pill badge-success'>Sudah dibayar</span>";
                                }
                            ?>
                        </td>

                        <td>
                            <?php echo anchor(
                                'operator/CSubKegiatanCRUD/halamanDetail/' . $dxd->id_subkegiatan,
                                '<div class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i></div>'
                            ) ?>
                        </td>

                        <td>
                            <?php echo anchor(
                                'operator/CSubKegiatanCRUD/halamanUpdate/' . $dxd->id_subkegiatan,
                                '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>'
                            ) ?>
                        </td>

                        <td>
                            <!-- <a class="btn btn-danger btn-sm" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                            href="<?php echo base_url('operator/CSubKegiatanCRUD/fungsiDelete/') ?>/<?php echo $dxd->id_subkegiatan ?>">
                            <i class="fa fa-trash"></i>
                        </a> -->

                            <a onclick="deleteConfirm('<?php echo site_url('operator/CSubKegiatanCRUD/fungsiDelete/' . $dxd->id_subkegiatan) ?>')" href="#!" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a>
                        </td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>

    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="TambahKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('operator/CSubKegiatanCRUD/fungsiTambah') ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Sub Kegiatan</label>
                                <input type="text" name="sub_kegiatan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Nama Belanja</label>
                                <input type="text" name="nama_belanja" class="form-control" required>
                            </div>

                            <div class="form-group">
                           <label for="name">Kode Rekening</label>
                            <div class="form-group">
                               <select required name="kode_rekening"class="form-control">
        	                       
                                    <option value="">--Pilih Kode Rekening--</option>
                                <?php                                
                                   foreach ($user as $dxd) {  
                                       
		                             echo "<option value='".$dxd->kode_rek."'>".$dxd->kode_rek."</option>";
		                                               }
		                                       echo"
		                                    </select>"
	                              	?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pagu Anggaran</label>
                                <input type="number" name="pagu_anggaran" class="form-control" required>
                            </div>

                            <div class="form-group">
                           <label for="name">Nama PPTK</label>
                            <div class="form-group">
                               <select required name="nama_pptk"class="form-control">
        	                       
                                    <option value="">--Pilih PPTK--</option>
                                <?php                                
                                   foreach ($user as $dxd) {  
                                       
		                             echo "<option value='".$dxd->nama_pengguna."'>".$dxd->nama_pengguna."</option>";
		                                               }
		                                       echo"
		                                    </select>"
	                              	?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Input</label>
                                <input type="date" name="tanggal_input" class="form-control">
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

<!-- <script>
$(document).ready(function() {
    $('#dataTables').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"> -->