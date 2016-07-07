<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>

	
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Selamat datang,</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                <?php if( $user_session->group_id==USER_GURU ): ?>
                    Aplikasi ini digunakan untuk mengukur sejauh mana kompetensi siswa ...
                <?php else: ?>
                    <a href="tes" class="btn btn-success btn-lg">Mulai Tes &nbsp <i class="fa fa-play"></i> </a>
                <?php endif; ?>
                </div>
            </div>
            

<?php include "layout/footer.php"; ?>