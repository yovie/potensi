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
            <div class="col-md-11 col-md-offset-1" style="margin-bottom:10px;">
                <form method="post" class="form-horizontal">
                <?php foreach($jawaban as $ji=>$ja): ?>
                    <label class="col-md-3" for="jawab<?php echo $ji ?>"> <?php echo $ja->teks ?> </label>
                    <div class="col-md-1" id="jawab<?php echo $ji ?>">
                        <input type="checkbox" name="jawab<?php echo $ji ?>" value="<?php echo $ja->id ?>" />
                    </div>
                <?php endforeach; ?>
                </form>
            </div>
        <?php endforeach; ?>            
    </div>

    <script type="text/javascript">
        
    </script>

    <style type="text/css">
        
    </style>

<?php include "layout/footer.php"; ?>