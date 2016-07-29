<?php include "layout/header.php"; ?>
<?php //include "layout/sidemenu.php"; ?>
</div>
</nav>

<div class="container">
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
	
    <?php if( $the_status=="selesai" ): $msg = get_flashmessage(); ?>
        <div class="row">
            <div class="col-md-12" style="padding-top:20px;">
                <div class="panel panel-success">
                    <div class="panel-heading text-center"> Selesai </div>
                    <div class="panel-body text-center"><p><?php echo sprintf( "Terima kasih %s sudah menjawab seluruh pertanyaan", $user_session->profile->nama); ?></p></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php $msg = get_flashmessage(); ?>
    <div class="row">
        <div class="col-md-12" style="padding-top:20px;">
            
            <?php if( !empty($msg) && ( $the_status!="selesai" ) ): ?>
            <div class="panel panel-<?php echo $msg['type'] ?>">
                <div class="panel-heading text-center"><?php echo $msg['title'] ?></div>
                <div class="panel-body text-center"><p><?php echo sprintf( $msg['message'], $user_session->profile->nama); ?></p></div>
            </div>
            <?php endif; ?>

            <div class="panel panel-danger" id="panel-pertanyaan">
                <div class="panel-heading">Pertanyaan ke <?php echo $get_soal ?></div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal form-isian">
                        <input type="hidden" name="soal_ke" value="<?php echo $get_soal ?>" />
                        <input type="hidden" name="tes_id" value="<?php echo $test_id ?>" />
                        <input type="hidden" name="pertanyaan_id" value="<?php echo $pertanyaan->id ?>" />
                        <div class="form-group">
                            <label class="col-md-12"> <?php echo $pertanyaan->teks ?> </label>
                        </div>
                        <?php foreach($jenis_jawaban as $ji=>$jj): ?>
                        <div class="form-group">
                            <label for="pilihan<?php echo $ji ?>" class="col-md-11"><input type="radio" id="pilihan<?php echo $ji ?>" name="jawaban_id" value="<?php echo $jj->id ?>"  onchange="kirim()" <?php
                            if( !empty($jawaban) ) {
                                if( $jawaban->jawaban_id==$jj->id)
                                    echo " checked ";
                            }
                            ?> />  &nbsp;  <?php echo $jj->teks ?> </label>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success" onclick="location.href='tes?soal=<?php echo $back ?>'" <?php echo ($back<0)?'disabled':'' ?> > <i class="fa fa-angle-left"></i> Sebelumnya</button>
                    <button class="btn btn-success pull-right" onclick="location.href='tes?soal=<?php echo $next ?>'" <?php echo ($next<0)?'disabled':'' ?> >Selanjutnya <i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function kirim() {
            $('.form-isian').submit();
        }
    </script>

    <style type="text/css">
        
    </style>

<?php include "layout/footer.php"; ?>