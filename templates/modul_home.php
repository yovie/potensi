<?php include "layout/header.php"; ?>

<?php if( $user_session->group_id==USER_SISWA ): ?>
    </div>
</nav>

<div class="container">

    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Selamat datang <?php echo $user_session->profile->nama ?>,</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <div class="row">
                <div class="col-md-12">
                    <a href="tes" class="btn btn-success btn-lg">Mulai Tes &nbsp <i class="fa fa-play"></i> </a>
                </div>
            </div>

<?php endif; ?>

<?php if( $user_session->group_id==USER_GURU ): ?>

    <?php include "layout/sidemenu.php"; ?>

    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Selamat datang <?php echo $user_session->username ?>,</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <div class="row">
                <div class="col-md-12">
                    Aplikasi ini digunakan untuk mengukur sejauh mana kompetensi siswa ...
                </div>
            </div>

<?php endif; ?>
            

<?php include "layout/footer.php"; ?>