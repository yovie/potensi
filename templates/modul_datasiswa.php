<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>

	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Siswa</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10px">No</th><th>NIS</th><th>Nama</th><th>Kontak</th><th>Email</th><th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($siswa as $rw=>$item): ?>
                    <tr>
                        <td><?php echo $rw+1 ?></td>
                        <td><?php echo $item->nip ?></td>
                        <td><?php echo $item->nama ?></td>
                        <td><?php echo $item->kontak ?></td>
                        <td><?php echo $item->email ?></td>
                        <td>
                            <button class="btn btn-xs btn-primary">login info</button>
                            <button class="btn btn-xs btn-warning">ubah</button>
                            <button class="btn btn-xs btn-danger">hapus</button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div> 
    </div>
            
    <script type="text/javascript">
        $(document).ready( function() {

        } );
    </script>

<?php include "layout/footer.php"; ?>