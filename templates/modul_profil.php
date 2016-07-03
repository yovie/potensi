<?php include "layout/header.php"; ?>
<?php include "layout/sidemenu.php"; ?>

	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil User</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" name="akun" class="form-horizontal">
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
                            <label class="col-md-3"> Username baru</label>
                            <div class="col-md-9">
                                <input type="text" name="username" placeholder="Username" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="ubah-password" type="checkbox" name="ubah_password" value="1" />
                                <label for="ubah-password"> Ubah password</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Password baru</label>
                            <div class="col-md-9">
                                <input type="password" name="password1" placeholder="Password" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3"> Password baru lagi</label>
                            <div class="col-md-9">
                                <input type="password" name="password2" placeholder="Password lagi" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"> &nbsp;
                        <button class="btn btn-xs btn-primary pull-right">simpan</button> 
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="post" name="akun" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading"><label>Data Profil</label></div>
                    <div class="panel-body">Panel Content</div>
                    <div class="panel-footer"> &nbsp;
                        <button class="btn btn-xs btn-primary pull-right">simpan</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
            

<?php include "layout/footer.php"; ?>