<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Siswa</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th width="10px">No</th><th>NIS</th><th>Nama</th><th>Kontak</th><th>Email</th><th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($siswa as $rw=>$item): ?>
                    <tr>
                        <td align="center"><?php echo $rw+1 ?></td>
                        <td><?php echo $item->nip ?></td>
                        <td><?php echo $item->nama ?></td>
                        <td><?php echo $item->kontak ?></td>
                        <td><?php echo $item->email ?></td>
                        <td align="center">
                            <button class="btn btn-xs btn-success">login info</button>
                            <button class="btn btn-xs btn-warning">ubah</button>
                            <button class="btn btn-xs btn-danger">hapus</button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Siswa</button>
        </div> 
    </div>
            
    <script type="text/javascript">
        $(document).ready( function() {
            $('#table-data').DataTable( {
                "bLengthChange": false,
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 5 ] }
                ]
            } );
        } );
    </script>

<?php include "layout/footer.php"; ?>