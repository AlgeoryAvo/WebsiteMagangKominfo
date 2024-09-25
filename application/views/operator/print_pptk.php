        <table id="dataTables" class="table table-hover table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Kode Rekening</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Password</th>
                
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
                    <td><?php echo $ptk->password_pengguna ?></td>
                    

                </tbody>
            <?php endforeach; ?>
        </table>

        <script type="text/javascript">
            window.print();
        </script>
