<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Indikator</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th>Standar Kompetensi</th><th>Kompetensi</th><th>Indikator</th><th>Pertanyaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $rw=>$item): ?>
                    <tr>
                        <td>
                            <?php echo $item->teks; ?>
                            <button class="btn btn-xs btn-warning pull-right"> <i class="fa fa-edit"></i> </button>
                            <button class="btn btn-xs btn-danger pull-right"> <i class="fa fa-remove"></i> </button>        
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-data" data-info='{"jenis":"standar"}' ><i class="fa fa-plus"></i> Tambah Data Standar Kompetensi</button>
        </div> 
    </div>

    <div id="tambah-data" class="modal fade" role="dialog">
        <form method="post" class="form-horizontal">
            <input type="hidden" name="id" value=""/>
            <input type="hidden" name="jenis" value=""/>
            <input type="hidden" name="parent" value=""/>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Siswa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-3" id="teks-title">Teks</label>
                            <div class="col-md-9">
                                <textarea name="teks" class="form-control" placeholder="" required></textarea>
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
                "bInfo" : false,
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ ] }
                ]
            } );
        } );

        $('#tambah-data').on('shown.bs.modal', function (e) {
            var b = $(e.relatedTarget);
            var inf = b.data( 'info' );
            console.log(inf);
            $('#tambah-data').find('input[name=id]').val('');
            $('#tambah-data').find('input[name=jenis]').val('');
            $('#tambah-data').find('input[name=parent]').val('');
            $('#tambah-data').find('input[name=teks]').val('');
            if( inf!=undefined ) {
                if( inf.jenis=="standar" ) {
                    $('#tambah-data').find('.modal-title').html('Tambah Standar Kompetensi');
                    $('#tambah-data').find('#teks-title').html('Standar Kompetensi');
                }
                $('#tambah-data').find('input[name=jenis]').val(inf.jenis);
            }
            $('textarea[name=teks]').focus();
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