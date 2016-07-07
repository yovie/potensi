<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>

	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil User</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading"><label>Data Akun</label></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="ubah-username" type="checkbox" name="ubah_username" value="1" />
                                <label for="ubah-username"> Ubah username</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4"> Username baru</label>
                            <div class="col-md-8">
                                <input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $user_session->username; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="ubah-password" type="checkbox" name="ubah_password" value="1" />
                                <label for="ubah-password"> Ubah password</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4"> Password baru</label>
                            <div class="col-md-8">
                                <input type="password" name="password1" placeholder="Password" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4"> Password baru lagi</label>
                            <div class="col-md-8">
                                <input type="password" name="password2" placeholder="Password lagi" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"> &nbsp;
                        <button class="btn btn-xs btn-primary pull-right"> <i class="fa fa-save"></i> simpan</button> 
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="profil" value="1">
                <div class="panel panel-default">
                    <div class="panel-heading"><label>Data Profil</label></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <img src=".<?php echo empty($profil) ? "/files/users.png":$profil->foto ?>" width="70px" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> <?php echo $user_session->group_id==USER_GURU ? "NIP":"NIS" ?></label>
                            <div class="col-md-9">
                                <input type="text" name="nip" placeholder="<?php echo $user_session==USER_GURU ? "NIP":"NIS" ?>" class="form-control" value="<?php echo empty($profil) ? "":$profil->nip ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Nama</label>
                            <div class="col-md-9">
                                <input type="text" name="nama" placeholder="Nama" class="form-control" value="<?php echo empty($profil) ? "":$profil->nama ?>" >
                            </div>
                        </div>
                        <?php if( $user_session->group_id==USER_SISWA ): ?>
                            <div class="form-group">
                                <label class="col-md-3">Tempat Lahir</label>
                                <div class="col-md-9">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?php echo empty($profil) ? "":$profil->tempat_lahir ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">Tanggal Lahir</label>
                                <div class="col-md-9">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal lahir" value="<?php echo empty($profil) ? "":$profil->tanggal_lahir ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">Etnis</label>
                                <div class="col-md-9">
                                    <input type="text" name="etnis" class="form-control" placeholder="Etnis" value="<?php echo empty($profil) ? "":$profil->etnis ?>"/>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="col-md-3"> Kontak</label>
                            <div class="col-md-9">
                                <input type="text" name="kontak" placeholder="Kontak" class="form-control" value="<?php echo empty($profil) ? "":$profil->kontak ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo empty($profil) ? "":$profil->email ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Kelas</label>
                            <div class="col-md-9">
                                <input type="text" name="kelas" placeholder="Kelas" class="form-control" value="<?php echo empty($profil) ? "":$profil->kelas ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Sekolah</label>
                            <div class="col-md-9">
                                <input type="text" name="sekolah" placeholder="Kelas" class="form-control" value="<?php echo empty($profil) ? "":$profil->sekolah ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Foto</label>
                            <div class="col-md-9">
                                <input type="file" name="foto" placeholder="Foto" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"> &nbsp;
                        <button class="btn btn-xs btn-primary pull-right"> <i class="fa fa-save"></i> simpan</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
            
    <script type="text/javascript">
        $(document).ready( function() {

            $('#ubah-username').change( function() {
                var ck = $(this).is( ':checked' );
                if( ck )
                    $( 'input[name=username]' ).removeAttr( 'disabled' );
                else
                    $( 'input[name=username]' ).attr( 'disabled', 'disabled' );
                $( 'input[name=username]' ).focus();
            } );

            $('#ubah-password').change( function() {
                var ck = $(this).is( ':checked' );
                if( ck ) {
                    $( 'input[name=password1]' ).removeAttr( 'disabled' );
                    $( 'input[name=password2]' ).removeAttr( 'disabled' );
                } else {
                    $( 'input[name=password1]' ).attr( 'disabled', 'disabled' );
                    $( 'input[name=password2]' ).attr( 'disabled', 'disabled' );
                }
                $( 'input[name=password1]' ).focus();
            } );

        } );
    </script>

<?php include "layout/footer.php"; ?>