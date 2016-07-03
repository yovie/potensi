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
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-siswa" ><i class="fa fa-plus"></i> Tambah Data Siswa</button>
        </div> 
    </div>

    <div id="tambah-siswa" class="modal fade" role="dialog">
        <form method="post" class="form-horizontal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Siswa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3">NIS</label>
                            <div class="col-md-5">
                                <input type="text" name="nis" class="form-control" placeholder="NIS" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Kontak</label>
                            <div class="col-md-5">
                                <input type="text" name="kontak" class="form-control" placeholder="Kontak" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Email</label>
                            <div class="col-md-7">
                                <input type="email" name="email" class="form-control" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"> &nbsp;
                        <button class="btn btn-primary pull-right"> <i class="fa fa-save"></i> simpan </button>
                    </div>
                </div>
            </div>
        </form>
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