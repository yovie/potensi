<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="./assets/js/canvasjs.min.js"></script>
	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil Kompetensi Karir</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-6">Nama</label>
                <label class="col-md-6">: <?php echo $siswa->profile->nama ?> </label>
            </div>
            <div class="form-group">
                <label class="col-md-6">Tempat/Tgl. Lahir</label>
                <label class="col-md-6">: <?php echo $siswa->profile->tempat_lahir.", ".$siswa->profile->tanggal_lahir ?> </label>
            </div>
            <div class="form-group">
                <label class="col-md-6">Jenis Kelamin</label>
                <label class="col-md-6">: <?php echo $siswa->profile->jenis_kelamin ?> </label>
            </div>
            <div class="form-group">
                <label class="col-md-6">Nomor Induk Siswa</label>
                <label class="col-md-6">: <?php echo $siswa->profile->nip ?> </label>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-md-5">Sekolah</label>
                <label class="col-md-7">: <?php echo $siswa->profile->sekolah ?> </label>
            </div>
            <div class="form-group">
                <label class="col-md-5">Etnis</label>
                <label class="col-md-7">: <?php echo $siswa->profile->etnis ?> </label>
            </div>
            <div class="form-group">
                <label class="col-md-5">Tanggal Tes</label>
                <label class="col-md-7">: <?php 
                    echo date("d-M-Y h:i:s", $siswa->mulai);
                 ?> </label>
            </div>
            <div class="form-group">
                <label class="col-md-5">No.HP/Email</label>
                <label class="col-md-7">: <?php echo $siswa->profile->kontak." / ".$siswa->profile->email; ?> </label>
            </div>
        </div> 

        <div class="col-md-12">
            <div id="chartContainer3" style="width: 100%; height: 300px;display: inline-block;"></div>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td></td><td align="center">KK</td><td align="center">SK A</td><td align="center">SK B</td><td align="center">SK C</td><td align="center">RK</td>
                    </tr>
                    <tr>
                        <td>
                            <div style="width:20px;height:20px;background:#F08080;float:left;margin-right:10px;"></div>
                            Kelompok
                        </td>
                        <td><?php echo sprintf("%.2f", $tes['rata_total']) ?></td>
                        <td><?php echo sprintf("%.2f", $tes['rata_total_a']) ?></td>
                        <td><?php echo sprintf("%.2f", $tes['rata_total_b']) ?></td>
                        <td><?php echo sprintf("%.2f", $tes['rata_total_c']) ?></td>
                        <td><?php echo sprintf("%.2f", $tes['rata_total_r']) ?></td>
                    </tr>
                    <tr>
                        <td>
                            <div style="width:20px;height:20px;background:#20B2AA;float:left;margin-right:10px;"></div>
                            Individu
                        </td>
                        <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu) ?></td>
                        <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_a) ?></td>
                        <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_b) ?></td>
                        <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_c) ?></td>
                        <td><?php echo sprintf("%.2f", $siswa->rata_kompetensi) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success" onclick="window.open('kompetensi_karir?siswa=<?php echo $get_siswa ?>&export=1')"> <i class="fa fa-file-pdf-o"></i> &nbsp; Ekspor</button>
            <br/>
            <br/>
        </div>
    </div>

            
    <script type="text/javascript">
        $(document).ready( function() {
            var chart = new CanvasJS.Chart("chartContainer3", {
                // title: {
                //     text: "Site Traffic",
                //     fontSize: 30
                // },
                animationEnabled: true,
                axisX: {
                    gridColor: "Silver",
                    tickColor: "silver",
                    // valueFormatString: "000"

                },
                toolTip: {
                    shared: true
                },
                theme: "theme2",
                axisY: {
                    gridColor: "Silver",
                    tickColor: "silver"
                },
                legend: {
                    verticalAlign: "bottom",
                    horizontalAlign: "center"
                },
                data: [{
                    type: "line",
                    showInLegend: false,
                    lineThickness: 2,
                    name: "Kelompok",
                    markerType: "square",
                    color: "#F08080",
                    dataPoints: [
                    { label: "KK", y: <?php echo sprintf("%.2f", $tes['rata_total']) ?> },
                    { label: "SK A", y: <?php echo sprintf("%.2f", $tes['rata_total_a']) ?> },
                    { label: "SK B", y: <?php echo sprintf("%.2f", $tes['rata_total_b']) ?> },
                    { label: "SK C", y: <?php echo sprintf("%.2f", $tes['rata_total_c']) ?> },
                    { label: "RK", y: <?php echo sprintf("%.2f", $tes['rata_total_r']) ?> }
                    ]
                },
                {
                    type: "line",
                    showInLegend: false,
                    name: "Individu",
                    color: "#20B2AA",
                    lineThickness: 2,
                    dataPoints: [
                    { label: "KK", y: <?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu) ?> },
                    { label: "SK A", y: <?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_a) ?> },
                    { label: "SK B", y: <?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_b) ?> },
                    { label: "SK C", y: <?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_c) ?> },
                    { label: "RK", y: <?php echo sprintf("%.2f", $siswa->rata_kompetensi) ?> }
                    ]
                }
                ],
            });

            chart.render();
        } );
    </script>


<?php include "layout/footer.php"; ?>