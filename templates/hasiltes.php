<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil Kompetensi Karir</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="table-data">
                <thead>
                    <tr>
                        <th width="10px">No</th><th>NIS</th><th>Nama</th><th>Kontak</th><th>Kelas</th><th>Sekolah</th><th>Hasil</th>
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
                           <button class="btn btn-success btn-xs" onclick="buka(<?php echo $item->id ?>);" > <i class="fa fa-bar-chart"></i> Kompetensi Karir</button>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div> 
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

        function buka(ida) {
            location.href = "kompetensi_karir?siswa=" + ida;
        }
    </script>

<?php include "layout/footer.php"; ?>