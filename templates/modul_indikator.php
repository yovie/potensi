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
                            <br/>
                            <button class="btn btn-xs btn-warning" style="margin:2px" title="Edit Standar Kompetensi" data-toggle="modal" data-target="#tambah-data" data-info='<?php echo json_encode($item) ?>'> <i class="fa fa-edit"></i> </button>
                            <button class="btn btn-xs btn-danger" style="margin:2px" title="Hapus Standar Kompetensi" data-info='<?php echo json_encode($item) ?>' onclick="hapus(this)"> <i class="fa fa-remove"></i> </button>
                            <button class="btn btn-xs btn-primary" style="margin:2px" title="Tambah Kompetensi" data-toggle="modal" data-target="#tambah-data" data-info='{"jenis":"kompetensi","parent":"<?php echo $item->id ?>"}'> <i class="fa fa-plus"></i> </button>
                        </td>
                        <?php if( count($item->kompetensi)>0 ): ?>
                            <?php foreach($item->kompetensi as $x_ko=>$ko): ?>
                                <?php 
                                    if( $x_ko>0 ) {
                                        echo '<tr><td></td>';
                                    }
                                ?>
                                <td>
                                    <?php echo $ko->teks; ?>
                                    <br/>
                                    <button class="btn btn-xs btn-warning" style="margin:2px" title="Edit Kompetensi" data-toggle="modal" data-target="#tambah-data" data-info='<?php echo json_encode($ko) ?>'> <i class="fa fa-edit"></i> </button>
                                    <button class="btn btn-xs btn-danger" style="margin:2px" title="Hapus Kompetensi" data-info='<?php echo json_encode($ko) ?>' onclick="hapus(this)"> <i class="fa fa-remove"></i> </button>
                                    <button class="btn btn-xs btn-primary" style="margin:2px" title="Tambah Indikator" data-toggle="modal" data-target="#tambah-data" data-info='{"jenis":"indikator","parent":"<?php echo $ko->id ?>"}'> <i class="fa fa-plus"></i> </button>
                                </td>
                                <?php if( count($ko->indikator)>0 ): ?>
                                    <?php foreach($ko->indikator as $x_in=>$in): ?>
                                        <?php 
                                            if( $x_in>0 ) {
                                                echo '<tr><td></td><td></td>';
                                            }
                                        ?>
                                        <td>
                                            <?php echo $in->teks; ?>
                                            <br/>
                                            <button class="btn btn-xs btn-warning" style="margin:2px" title="Edit Indikator" data-toggle="modal" data-target="#tambah-data" data-info='<?php echo json_encode($in) ?>'> <i class="fa fa-edit"></i> </button>
                                            <button class="btn btn-xs btn-danger" style="margin:2px" title="Hapus Indikator" data-info='<?php echo json_encode($in) ?>' onclick="hapus(this)"> <i class="fa fa-remove"></i> </button>
                                            <button class="btn btn-xs btn-primary" style="margin:2px" title="Tambah Pertanyaan" data-toggle="modal" data-target="#tambah-data" data-info='{"jenis":"pertanyaan","parent":"<?php echo $in->id ?>"}'> <i class="fa fa-plus"></i> </button>
                                        </td>
                                        <?php if( count($in->pertanyaan)>0 ): ?>
                                            <?php foreach($in->pertanyaan as $x_pe=>$pe): ?>
                                                <?php 
                                                    if( $x_pe>0 ) {
                                                        echo '<tr><td></td><td></td><td></td>';
                                                    }
                                                ?>
                                                <td>
                                                    <?php echo $pe->teks; ?>
                                                    <br/>
                                                    <button class="btn btn-xs btn-warning" style="margin:2px" title="Edit Pertanyaan" data-toggle="modal" data-target="#tambah-data" data-info='<?php echo json_encode($pe) ?>'> <i class="fa fa-edit"></i> </button>
                                                    <button class="btn btn-xs btn-danger" style="margin:2px" title="Hapus Pertanyaan" data-info='<?php echo json_encode($pe) ?>' onclick="hapus(this)"> <i class="fa fa-remove"></i> </button>
                                                </td>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <td></td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endif; ?>
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
            // $('#table-data').DataTable( {
            //     "bLengthChange": false,
            //     "bInfo" : false,
            //     "aoColumnDefs": [
            //         { 'bSortable': false, 'aTargets': [ ] }
            //     ]
            // } );
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
                $('#tambah-data').find('input[name=parent]').val('');
                if( inf.jenis=="standar" && inf.id==undefined ) {
                    $('#tambah-data').find('.modal-title').html('Tambah Standar Kompetensi');
                    $('#tambah-data').find('#teks-title').html('Standar Kompetensi');
                } else if( inf.jenis=="standar" && inf.id!=undefined ) {
                    $('#tambah-data').find('.modal-title').html('Edit Standar Kompetensi');
                    $('#tambah-data').find('#teks-title').html('Standar Kompetensi');
                    $('#tambah-data').find('textarea[name=teks]').val(inf.teks);
                    $('#tambah-data').find('input[name=id]').val(inf.id);
                } else if( inf.jenis=="kompetensi" && inf.id==undefined ) {
                    $('#tambah-data').find('.modal-title').html('Tambah Kompetensi');
                    $('#tambah-data').find('#teks-title').html('Kompetensi');
                    $('#tambah-data').find('input[name=parent]').val(inf.parent);
                } else if( inf.jenis=="kompetensi" && inf.id!=undefined ) {
                    $('#tambah-data').find('.modal-title').html('Edit Kompetensi');
                    $('#tambah-data').find('#teks-title').html('Kompetensi');
                    $('#tambah-data').find('textarea[name=teks]').val(inf.teks);
                    $('#tambah-data').find('input[name=id]').val(inf.id);
                    $('#tambah-data').find('input[name=parent]').val(inf.parent);
                } else if( inf.jenis=="indikator" && inf.id==undefined ) {
                    $('#tambah-data').find('.modal-title').html('Tambah Indikator');
                    $('#tambah-data').find('#teks-title').html('Indikator');
                    $('#tambah-data').find('input[name=parent]').val(inf.parent);
                } else if( inf.jenis=="indikator" && inf.id!=undefined ) {
                    $('#tambah-data').find('.modal-title').html('Edit Indikator');
                    $('#tambah-data').find('#teks-title').html('Indikator');
                    $('#tambah-data').find('textarea[name=teks]').val(inf.teks);
                    $('#tambah-data').find('input[name=id]').val(inf.id);
                    $('#tambah-data').find('input[name=parent]').val(inf.parent);
                } else if( inf.jenis=="pertanyaan" && inf.id==undefined ) {
                    $('#tambah-data').find('.modal-title').html('Tambah Pertanyaan');
                    $('#tambah-data').find('#teks-title').html('Pertanyaan');
                    $('#tambah-data').find('input[name=parent]').val(inf.parent);
                } else if( inf.jenis=="pertanyaan" && inf.id!=undefined ) {
                    $('#tambah-data').find('.modal-title').html('Edit Pertanyaan');
                    $('#tambah-data').find('#teks-title').html('Pertanyaan');
                    $('#tambah-data').find('textarea[name=teks]').val(inf.teks);
                    $('#tambah-data').find('input[name=id]').val(inf.id);
                    $('#tambah-data').find('input[name=parent]').val(inf.parent);
                } 
                $('#tambah-data').find('input[name=jenis]').val(inf.jenis);
            }
            $('textarea[name=teks]').focus();
        });

        function hapus(th) {
            if( !confirm( 'Yakin akan dihapus ?' ) )
                return false;
            var info = $(th).data( 'info' );
            if( info!=undefined ) {
                $.post( location.href, {delete: 1, id: info.id}, function(res) {
                    location.reload();
                } );
            }
        }
    </script>

    <style type="text/css">
        #table-data td button{
            visibility: hidden;
            cursor:pointer;
        }
        #table-data td:hover > button{
            visibility: visible;
        }
    </style>

<?php include "layout/footer.php"; ?>