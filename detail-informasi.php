<?php include 'header.php'; ?>

    <div class="section">
        <div class="container">

            <?php 
                $informasi   = mysqli_query($conn, "SELECT * FROM informasi LEFT JOIN pengguna ON 
                pengguna.id = informasi.created_by WHERE informasi.id = '".$_GET['id']."' ");

                if(mysqli_num_rows($informasi) == 0) {
                    echo "<script>window.location='index.php'</script>";
                }
                
                $p          = mysqli_fetch_object($informasi);
            ?>            
            
            <h3 class="text-center"><?= $p->judul ?></h3>
            <img src="uploads/informasi/<?= $p->gambar ?>" width="500px" class="image"><br><br>
            <h2 class="text-right"><?= $p->keterangan ?></h2>
        </div>

    </div>

<?php include 'footer.php'; ?>