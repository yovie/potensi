<?php include "layout/header.php"; ?>

<?php if( $user_session->group_id==USER_SISWA ): ?>
    </div>
</nav>

<div class="container">

    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Selamat datang <?php echo $user_session->profile->nama ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <div class="row">
            <div class="col-md-12">
                <p><strong>Petunjuk Pengisian</strong></p>
                                <ol>
                                    <li><p>Para peserta didik yang baik hati, ke hadapan Anda disajikan 43 butir pernyataan. Anda diminta untuk memilih salah satu dari empat alternatif jawaban yang menurut Anda paling sesuai dengan diri Anda pada saat sekarang ini dengan cara menghitamkan. Alternatif jawaban yang disediakan, yaitu :</p>
                                    <ol type="a">
                                        <li><p>Sangat Sesuai jika pernyataan tersebut sangat sesuai dengan diri Anda.</p></li>
                                        <li><p>Sesuai jika pernyataan tersebut sesuai dengan diri Anda.</p></li>
                                        <li><p>Tidak Sesuai jika pernyataan tersebut tidak sesuai dengan diri Anda.</p></li>
                                        <li><p>Sangat Tidak Sesuai jika pernyataan tersebut sangat tidak sesuai dengan diri Anda.</p></li>
                                    </ol>
                                    </li>
                                    <li><p>Tidak ada jawaban benar atau salah. Anda tidak perlu merasa takut karena tidak akan berpengaruh pada nama baik dan nilai Anda pada mata pelajaran tertentu.</p></li>
                                    <li><p>Bekerjalah dengan cepat tetapi teliti. Isilah identitas secara lengkap. Selanjutnya, jawablah semua butir pernyataan pada lembar jawaban yang tersedia.</p></li>
                                    <li><p>Sebelum Anda menjawab pernyataan-pernyataan dalam instrumen ini, dipersilahkan berdo'a terlebih dahulu.</p></li>
                                    <li><p>Terima kasih atas kejujuran dan kesungguhan Anda dalam mengisi setiap butir pernyataan ini.</p></li>
                                </ol>
            </div>
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
                    Kompetensi karir adalah kemampuan individu dalam pengambilan keputusan tentang pendidikan lanjutan dan

                    pekerjaan yang didasari oleh pengetahuan, sikap, dan keterampilan. Layanan bimbingan yang tepat dalam

                    membantu peserta didik dalam mengetahui kompetensi karirnya adalah dengan bimbingan karir.
                </div>
            </div>

<?php endif; ?>
            

<?php include "layout/footer.php"; ?>