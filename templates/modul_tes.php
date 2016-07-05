<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>
    
    <link href="./assets/js/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./assets/js/datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="./assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/datatables/media/js/dataTables.bootstrap.min.js"></script>
	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Skala Kompetensi Karir</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <?php foreach($pertanyaan as $n=>$ta): ?>
                <p><?php echo $ta->teks ?></p>
            <?php endforeach; ?>            
        </div> 
    </div>

    <script type="text/javascript">
        
    </script>

    <style type="text/css">
        
    </style>

<?php include "layout/footer.php"; ?>