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
                        <th width="10px">No</th><th>NIS</th><th>Nama</th><th>Kontak</th><th>Kelas</th><th>Sekolah</th><th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($siswa as $rw=>$item): ?>
                    <tr>
                        <td align="center"><?php echo $rw+1 ?></td>
                        <td>
                            <img src=".<?php echo $item->foto ?>" width="40px" style="margin-right:10px" />
                            <?php echo $item->nip ?>
                        </td>
                        <td><?php echo $item->nama ?></td>
                        <td><?php echo $item->kontak ?></td>
                        <td><?php echo $item->kelas ?></td>
                        <td><?php echo $item->sekolah ?></td>
                        <td align="center">
                            <button class="btn btn-xs <?php echo empty($item->have_account) ? "btn-default":"btn-success"; ?>"  data-toggle="modal" data-target="#login-info" data-info='<?php echo json_encode($item); ?>' >login info</button>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#tambah-siswa" data-info='<?php echo json_encode($item); ?>'>ubah</button>
                            <button class="btn btn-xs btn-danger" onclick="hapus(this)" data-id="<?php echo $item->id ?>" >hapus</button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-siswa" ><i class="fa fa-plus"></i> Tambah Data Siswa</button>
        </div> 
    </div>

    <div id="tambah-siswa" class="modal fade" role="dialog">
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" value=""/>
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
                                        <label class="col-md-3"  style="color:#555;">Jenis Kelamin</label>
                                        <div class="col-md-5">
                                            <select name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                                                <option value=""></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Tempat Lahir</label>
                            <div class="col-md-7">
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Tanggal Lahir</label>
                            <div class="col-md-5">
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal lahir" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Etnis</label>
                            <div class="col-md-8">
                                <input type="text" name="etnis" class="form-control" placeholder="Etnis" />
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
                        <div class="form-group">
                            <label class="col-md-3">Kelas</label>
                            <div class="col-md-7">
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Sekolah</label>
                            <div class="col-md-9">
                                <input type="text" name="sekolah" class="form-control" placeholder="Sekolah" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Foto</label>
                            <div class="col-md-7" id="for-photo">
                                <input type="file" name="foto" class="form-control" placeholder="Foto" />
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

    <div id="login-info" class="modal fade" role="dialog">
        <form method="post" class="form-horizontal">
            <input type="hidden" name="login_info" value="1"/>
            <input type="hidden" name="id" value=""/>
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login Info</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" placeholder="Username" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="text" name="pwd" class="form-control" placeholder="Password" required />
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
                // "pageLength": 1,
                "bLengthChange": false,
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 6 ] }
                ]
            } );
        } );

        $('#tambah-siswa').on('shown.bs.modal', function (e) {
            var b = $(e.relatedTarget);
            var inf = b.data( 'info' );
            if( inf!=undefined ) {
                $('input[name=id]').val( inf.id );
                $('input[name=nis]').val( inf.nip );
                $('input[name=nama]').val( inf.nama );
                $('select[name=jenis_kelamin]').val( inf.jenis_kelamin );
                $('input[name=tempat_lahir]').val( inf.tempat_lahir );
                $('input[name=tanggal_lahir]').val( inf.tanggal_lahir );
                $('input[name=etnis]').val( inf.etnis );
                $('input[name=kontak]').val( inf.kontak );
                $('input[name=email]').val( inf.email );
                $('input[name=kelas]').val( inf.kelas );
                $('input[name=sekolah]').val( inf.sekolah );
                $('#for-photo').find('img').remove();
                $('#for-photo').prepend('<img src=".' + inf.foto +'" height="70px" style="margin:10px" />');
            } else {
                $('input[name=id]').val( '' );
                $('input[name=nis]').val( '' );
                $('input[name=nama]').val( '' );
                $('select[name=jenis_kelamin]').val( '' );
                $('input[name=tempat_lahir]').val( '' );
                $('input[name=tanggal_lahir]').val( '' );
                $('input[name=etnis]').val( '' );
                $('input[name=kontak]').val( '' );
                $('input[name=email]').val( '' );
                $('input[name=kelas]').val( '' );
                $('input[name=sekolah]').val( '' );
                $('#for-photo').find('img').remove();
            }
            $('input[name=nis]').focus();
        });

        $('#login-info').on('shown.bs.modal', function (e) {
            var b = $(e.relatedTarget);
            var inf = b.data( 'info' );
            if( inf!=undefined ) {
                $('#login-info').find('input[name=id]').val( inf.id );
                $('#login-info').find('input[name=username]').val( inf.have_account.username );
                $('#login-info').find('input[name=pwd]').val( inf.have_account.tpwd );
            } else {
                $('#login-info').find('input[name=username]').val( '' );
                $('#login-info').find('input[name=pwd]').val( '' );
            }
            $('#login-info').find('input[name=username]').focus();
        });

        function hapus(th) {
            if( !confirm( 'Yakin akan dihapus ?' ) )
                return false;
            var id = $(th).data( 'id' );
            if( id!=undefined ) {
                $.post( location.href, {delete: 1, id: id}, function(res) {
                    location.reload();
                } );
            }
        }
    </script>

<?php include "layout/footer.php"; ?>