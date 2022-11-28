<?php
    $host = $_SERVER['HTTP_HOST'];
    $hest = "http://".$host."/rw-kebonsari/master";
?>
<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-5 d-none d-sm-inline">Menu</span>
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start nav-sidebar" id="menu">
        <li>
            <a href="<?php echo $hest; ?>/dashboard/" class="nav-link px-0"> <span class="d-none d-sm-inline">Dashboard </a>
        </li>
        <li>
            <a href="<?php echo $hest; ?>/warga/" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Warga</a>
        </li>
        <li>
            <a href="<?php echo $hest; ?>/kartu-keluarga/" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Kartu Keluarga</a>
        </li>
        <li>
            <a href="#collapseExample" class="nav-link px-0" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Kegiatan RW</a>
            <div class="collapse" id="collapseExample">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-sm-start nav-sidebar">
                    <li>
                        <a href="<?php echo $hest; ?>/kegiatan-ronda/" class="nav-link px-2"> <span class="d-none d-sm-inline">Kegiatan Ronda</span> </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <hr>
    <div class="dropdown dropdown-custom-sidebar pb-4">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../../assets/image/kotacimahi.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['role']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>             
        </ul>
    </div>
</div>