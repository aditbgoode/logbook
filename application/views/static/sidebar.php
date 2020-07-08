<nav id="sidebar">
    <div class="sidebar-header">
        <h3>LogBook</h3>
    </div>

    <ul class="list-unstyled">
        <!-- <p>Dummy Heading</p> -->
        <li <?php if($this->uri->segment(2)==""){echo 'class="active"';}?>>
            <a href="<?php echo base_url();?>dashboard">Home</a>
        </li>
        <li <?php if($this->uri->segment(2)=="rencana"){echo 'class="active"';}?>>
            <a href="<?php echo base_url();?>dashboard/rencana">Rencana Harian</a>
        </li>
        <li <?php if($this->uri->segment(2)=="laporan"){echo 'class="active"';}?>>
            <a href="<?php echo base_url();?>dashboard/laporan">Laporan Harian</a>
        </li>
        <li <?php if($this->uri->segment(2)=="rekapan"){echo 'class="active"';}?>>
            <a href="<?php echo base_url();?>dashboard/rekapan">Rekap</a>
        </li>
        <!-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li> -->
    </ul>

    <!-- <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul> -->
</nav>