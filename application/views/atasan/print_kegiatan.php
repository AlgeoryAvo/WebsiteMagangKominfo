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

                </tbody>
            <?php endforeach; ?>
        </table>

        <script type="text/javascript">
            window.print();
        </script>
