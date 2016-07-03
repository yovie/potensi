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
                            <a href="data_indikator"><i class="fa fa-th-list fa-fw"></i> Data Indikator</a>
                        </li>
                        <li>
                            <a href="hasil_tes"><i class="fa fa-file fa-fw"></i> Hasil Tes</a>
                        </li>
                        <?php endif; ?>
                        <?php if( $user_session->group_id==USER_SISWA ): ?>
                        <li>
                            <a href="tes"><i class="fa fa-dashboard fa-fw"></i> Tes</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">