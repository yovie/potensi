            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li> -->
                        <?php if( $user_session->group_id==USER_GURU ): ?>
                        <li>
                            <a href="data_siswa" class="<?php echo $module_link=="data_siswa" ? "active":"" ?>"><i class="fa fa-users fa-fw"></i> Data Siswa</a>
                        </li>
                        <li>
                            <a href="data_indikator" class="<?php echo $module_link=="data_indikator" ? "active":" " ?>"><i class="fa fa-th-list fa-fw"></i> Data Indikator</a>
                        </li>
                        <li>
                            <a href="hasil_tes" class="<?php echo $module_link=="hasil_tes" ? "active":" " ?>"><i class="fa fa-bar-chart-o fa-fw"></i> Hasil Tes</a>
                        </li>
                        <?php endif; ?>
                        <?php if( $user_session->group_id==USER_SISWA ): ?>
                        <li>
                            <a href="tes"><i class="fa fa-dashboard fa-fw"></i> Tes</a>
                        </li>
                            <?php if( $module_link=="tes" ): ?>
                            <li class="sidebar-search">
                                <div class="input-group">
                                    <p>Waktu mulai : <span class="waktu_mulai"></span> </p>
                                    <p>Sudah dijawab : <span class="sudah_dijawab"></span></p>
                                    <p>Belum dijawab : <span class="belum_dijawab"></span></p>
                                </div>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">