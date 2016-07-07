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
                <form method="post" class="form-inline">
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

    </script>

    <style type="text/css">
        
    </style>

<?php include "layout/footer.php"; ?>