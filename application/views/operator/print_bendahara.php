        <table id="dataTables" class="table table-hover table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Password</th>
                
            </thead>

            <?php
            $no = 1;
            foreach ($bendahara as $bnd) :
            ?>
                <tbody>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $bnd->nama_pengguna ?></td>
                    <td><?php echo $bnd->jabatan_pengguna ?></td>
                    <td><?php echo $bnd->username_pengguna ?></td>
                    <td><?php echo $bnd->password_pengguna ?></td>
                    

                </tbody>
            <?php endforeach; ?>
        </table>

        <script type="text/javascript">
            window.print();
        </script>
