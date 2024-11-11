<?php include 'header.php' ?>
         
         <!-- content -->
          <div class="content">
            <div class="container">
                <div class="box">
                    <div class="box-header">
                        Jurusan
                    </div>

                    <div class="box-body">

                        <a href="tambah-jurusan.php" class="text-blue"><i class="fa fa-plus"></i> Tambah</a>

                        <?php 
                            if(isset($_GET['success'])){
                                echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                            }
                        ?>

                        <form action="">
                            <div class="input-group">
                                <input type= "text" name="key" placeholder="Pencarian">
                                <button type="submit"><i class="fa fa-search"></i></button> 
                            </div>
                        </form>

                       <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Mata Pelajaran</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </thead>
                        
                        <tbody>
                            <?php
                            $no = 1;
                                $where = " WHERE 1=1 ";
                                if(isset($_GET['key'])) {
                                    $where .= " AND nama LIKE '%".addslashes($_GET['key'])."%' ";
                                }

                                $jurusan = mysqli_query($conn,"SELECT * FROM jurusan $where ORDER BY id DESC");
                                if(mysqli_num_rows($jurusan) > 0){
                                    while($p = mysqli_fetch_array($jurusan)){
                            ?>
                        
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['mata_pelajaran'] ?></td>
                                <td><?= $p['keterangan'] ?></td>
                                <td><img src="../uploads/jurusan/<?= $p['gambar'] ?>" width="100px"></td>
                                <td>
                                    <a href="edit-jurusan.php?id=<?= $p['id'] ?>" title="Edit data" class="text-blue"><i class="fa fa-edit"></i></a>
                                    <a href="hapus.php?idjurusan=<?= $p['id'] ?>" onclick = "return confirm ('Yakin ingin hapus?')" title="Hapus data" class="text-red"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php }}else{ ?>
                                <tr>
                                    <td colspan="6">Data tidak ada</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
          </div>

    <?php include 'footer.php' ?> 