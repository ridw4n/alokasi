<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <p><strong><?php echo tanggalIndo(date('Y-m-d'),'l, j F Y')." ".date('H:i')?></strong></p>
        </li>
        <li>
            <a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>ruangan"><i class="fa fa-building-o fa-fw"></i> Ruangan</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>prodi"><i class="fa fa-book fa-fw"></i> Program Studi</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-calendar fa-fw"></i> Jadwal Kuliah<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?php echo base_url();?>jadwal/opsi_elektro">Jadwal Jurusan Elektro</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>jadwal/opsi_sipil">Jadwal Jurusan Sipil</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>jadwal/upload_jadwal">Upload Jadwal</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-th-list fa-fw"></i> Mata Kuliah<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?php echo base_url();?>matakuliah/opsi">Daftar Mata Kuliah</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>matakuliah/upload_mk">Upload Mata Kuliah</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> Operator<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?php echo base_url();?>operator/profil">Profil</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>operator/listop">Manajemen Operator</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="<?php echo base_url();?>pengaturan"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
        </li>
        <li>
            <a href="#" onClick="logout()"><i class="fa fa-power-off fa-fw"></i> Logout</a>
        </li>
    </ul>
</div>