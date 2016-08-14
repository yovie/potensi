<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="./assets/js/canvasjs.min.js"></script>
    
    <div class="row" id="kontenHtml">
        <div class="col-lg-12">
            <h3 class="page-header text-center">Profil Kompetensi Karir</h3>
        </div>
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

        <script type="text/javascript">
        function cetak() {
            var doc = window.frames["printf"];
            if( doc.document ) {
                doc.document.body.innerHTML = ""; //Chrome, IE
            }else {
                doc.contentDocument.body.innerHTML = ""; //FireFox
            }
            var res = $('#kontenHtml').html();
            
            var canvas = $("#chartContainer3").find('canvas').get(0);
            var img    = canvas.toDataURL("image/jpeg");

            doc.document.write(
                "<center><strong>Profil Kompetensi Karir</strong></center><hr style=\"\"/><br/>"
                + "<table border=\"0\" width=\"100%\">"
                + "<tr>"
                + "   <td>Nama</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->nama ?></td>"
                + "   <td>Sekolah</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->sekolah ?></td>"
                + "</tr>"
                + "<tr>"
                + "   <td>Tempat/Tgl. lahir</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->tempat_lahir."/".$siswa->profile->tanggal_lahir ?></td>"
                + "   <td>Etnis</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->etnis ?></td>"
                + "</tr>"
                + "<tr>"
                + "   <td>Jenis kelamin</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->jenis_kelamin ?></td>"
                + "   <td>Tanggal test</td><td width=\"2px\">:</td><td><?php echo date("d-M-Y h:i:s", $siswa->mulai) ?></td>"
                + "</tr>"
                + "<tr>"
                + "   <td>Nomor induk siswa</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->nip ?></td>"
                + "   <td>No. HP/Email</td><td width=\"2px\">:</td><td><?php echo $siswa->profile->kontak." / ".$siswa->profile->email ?></td>"
                + "</tr>"
                + "</table> <br/>"
            );

            doc.document.write( '<img src="' + img + '" />' );

            doc.document.write( '<table border="1" cellpadding="5" cellspacing="0" width="100%">' 
                + '<tr>'
                + ' <td></td> <td>KK</td> <td>SK A</td> <td>SK B</td> <td>SK C</td> <td>RK</td>'
                + '</tr>'
                + '<tr>'
                + ' <td> <div style="width:20px;height:20px;background:#F08080;float:left;margin-right:10px;"></div> Kelompok</td> <td><?php echo sprintf("%.2f", $tes['rata_total']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_a']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_b']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_c']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_r']) ?></td>'
                + '</tr>'
                + '<tr>'
                + ' <td> <div style="width:20px;height:20px;background:#20B2AA;float:left;margin-right:10px;"></div> Individu</td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu) ?></td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_a) ?></td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_b) ?></td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_c) ?></td> <td><?php echo sprintf("%.2f", $siswa->rata_kompetensi) ?></td>'
                + '</tr>'
                + '</table>'
            );

            doc.focus();
            doc.print();
        }

        function ekspor() {
            var canvas = $("#chartContainer3").find('canvas').get(0);
            var img    = canvas.toDataURL("image/jpeg");
            $('#imgChart').attr( 'src', img );
            // console.log($('#toPDF').html());
            var newForm = jQuery('<form>', {
                'action': 'kompetensi_karir?siswa=<?php echo $get_siswa ?>',
                'target': '_blank',
                'method': "post"
            }).append(jQuery('<input>', {
                'name': 'pdf',
                'value': '1',
                'type': 'hidden'
            })).append(jQuery('<input>', {
                'name': 'siswa',
                'value': '<?php echo $get_siswa ?>',
                'type': 'hidden'
            })).append(jQuery('<input>', {
                'name': 'konten',
                'value': $('#toPDF').html(),
                'type': 'hidden'
            }));
            newForm.submit();
        }

        function excel() {
            var canvas = $("#chartContainer3").find('canvas').get(0);
            var img    = canvas.toDataURL("image/jpeg");
            // $('#imgChart').attr( 'src', img );
            // console.log($('#toPDF').html());
            var newForm = jQuery('<form>', {
                'action': 'kompetensi_karir?siswa=<?php echo $get_siswa ?>',
                'target': '_blank',
                'method': "post"
            }).append(jQuery('<input>', {
                'name': 'excel',
                'value': '1',
                'type': 'hidden'
            })).append(jQuery('<input>', {
                'name': 'siswa',
                'value': '<?php echo $get_siswa ?>',
                'type': 'hidden'
            })).append(jQuery('<input>', {
                'name': 'chart',
                'value': img,
                'type': 'hidden'
            }));
            newForm.submit();
        }

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
    </div>

    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success" onclick="cetak()"> <i class="fa fa-print"></i> &nbsp; Cetak</button> &nbsp; 
            <button class="btn btn-success" onclick="ekspor()"> <i class="fa fa-file-pdf-o"></i> &nbsp; PDF</button> &nbsp; 
            <button class="btn btn-success" onclick="excel()"> <i class="fa fa-file-excel-o"></i> &nbsp; Excel</button> &nbsp; 
            <br/>
            <br/>
        </div>
    </div>


    <div style="display:none" id="toPDF">
        <p align="center"><strong>Profil Kompetensi Karir</strong></p><hr style=""/><br/>
        <table border="0" width="100%">
        <tr>
           <td>Nama</td><td width="2px">:</td><td><?php echo $siswa->profile->nama ?></td>
           <td>Sekolah</td><td width="2px">:</td><td><?php echo $siswa->profile->sekolah ?></td>
        </tr>
        <tr>
           <td>Tempat/Tgl. lahir</td><td width="2px">:</td><td><?php echo $siswa->profile->tempat_lahir."/".$siswa->profile->tanggal_lahir ?></td>
           <td>Etnis</td><td width="2px">:</td><td><?php echo $siswa->profile->etnis ?></td>
        </tr>
        <tr>
           <td>Jenis kelamin</td><td width="2px">:</td><td><?php echo $siswa->profile->jenis_kelamin ?></td>
           <td>Tanggal test</td><td width="2px">:</td><td><?php echo date("d-M-Y h:i:s", $siswa->mulai) ?></td>
        </tr>
        <tr>
           <td>Nomor induk siswa</td><td width="2px">:</td><td><?php echo $siswa->profile->nip ?></td>
           <td>No. HP/Email</td><td width="2px">:</td><td><?php echo $siswa->profile->kontak." / ".$siswa->profile->email ?></td>
        </tr>
        </table> <br/>

        <img id="imgChart" />

        <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <tr>
            <td></td> <td>KK</td> <td>SK A</td> <td>SK B</td> <td>SK C</td> <td>RK</td>
        </tr>
        <tr>
         <td> <span style="width:20px;height:20px;background:#F08080;margin-right:10px;float:left;border:solid 1px #f08080;">&nbsp; &nbsp; &nbsp; </span> Kelompok</td> <td><?php echo sprintf("%.2f", $tes['rata_total']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_a']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_b']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_c']) ?></td> <td><?php echo sprintf("%.2f", $tes['rata_total_r']) ?></td>
        </tr>
        <tr>
         <td> <span style="width:20px;height:20px;background:#20B2AA;margin-right:10px;float:left;border:solid 1px #20b2aa;">&nbsp; &nbsp; &nbsp; </span> Individu</td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu) ?></td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_a) ?></td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_b) ?></td> <td><?php echo sprintf("%.2f", $siswa->kompetensi_karir_individu_c) ?></td> <td><?php echo sprintf("%.2f", $siswa->rata_kompetensi) ?></td>
        </tr>
        </table>

        <style type="text/css">
            .warna{
                border: solid 5px #ff0000;
            }
        </style>
    </div>


<?php include "layout/footer.php"; ?>