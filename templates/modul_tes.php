<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Skala Kompetensi Karir
            </h1>
        </div>
    </div>
    
    <div class="row">
        <?php foreach($pertanyaan as $n=>$ta): ?>
            <label class="col-md-1"> <?php echo $n+1 ?> )</label>
            <label class="col-md-11" style="padding:0;"> <?php echo $ta->teks ?> </label>
            <div class="col-md-12" style="margin-bottom:10px;">
                <form method="post" class="form-inline form-isian">
                <?php foreach($jawaban as $ji=>$ja): ?>
                    <div class="form-group col-md-3">
                        <input class="col-md-1" type="radio" id="jawab<?php echo $n.$ji ?>" name="jawab<?php echo $n ?>" data-pertanyaan_id="<?php echo $ta->id ?>" data-jawaban_id="<?php echo $ja->id ?>" onchange="send_answer(this)"  <?php 
                            if( isset( $sebelumnya[$test_id][$ta->id] ) ) {
                                echo $sebelumnya[$test_id][$ta->id]->jawaban_id==$ja->id ? " checked ":"";
                            }
                        ?> />
                        <label class="col-md-11" for="jawab<?php echo $n.$ji ?>"> <?php echo $ja->teks ?> </label>
                    </div>
                <?php endforeach; ?>
                </form>
            </div>
        <?php endforeach; ?>            
    </div>

    <script type="text/javascript">
        
        function send_answer(th) {
            var tes_id = <?php echo $test_id; ?>;
            var pertanyaan_id = $(th).data('pertanyaan_id');
            var jawaban_id = $(th).data('jawaban_id');
            $.post( "tes", {tes_id: tes_id, pertanyaan_id: pertanyaan_id, jawaban_id: jawaban_id}, function(res) {
                console.log( "saved" );
            } );
        }

        function after_jawab() {
            var jt = $('.form-isian').find('input[type=radio]').length;
            var js = $('.form-isian').find('input[type=radio]:checked').length;
            var tt = jt/4;
            var bj = tt-js;
            $('.belum_dijawab').html( bj );
            $('.sudah_dijawab').html( js );
        }

        function waktu() {
            var date = new Date;
            var seconds = date.getSeconds()<10 ? '0'+date.getSeconds():date.getSeconds();
            var minutes = date.getMinutes()<10 ? '0'+date.getMinutes():date.getMinutes();
            var hour = date.getHours()<10 ? '0'+date.getHours():date.getHours();
            $('.waktu_mulai').html( hour+':'+minutes+':'+seconds );
            setTimeout( 'waktu()', 1000 );
        }

        $(document).ready( function() {

            $('.form-isian').find('input[type=radio]').change( function() {
                after_jawab();
            } );

            waktu();

            after_jawab();

        } );

    </script>

    <style type="text/css">
        
    </style>

<?php include "layout/footer.php"; ?>