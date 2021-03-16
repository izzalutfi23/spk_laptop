<?php 
    $active = 'penilaian';
    include('header.php');
    if(isset($_GET['hapus_penilaian']))
    {
        $kd_penilaian = $_GET['hapus_penilaian'];
        $del = $saw->del_nilai($kd_penilaian);
        if($del)
        {
            header('Location: penilaian.php');
        }
    }
?>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Penilaian</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form">
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        $kategori = $saw->get_data_kategori();
                        while ($data_kategori = $kategori->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <a href="penilaian.php?kat=<?=$data_kategori['id_kategori']?>">
                        <button class="btn btn-default btn-sm"><?=$data_kategori['nama_kategori']?></button>
                    </a>
                    <?php } ?>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title ">Data Penilaian</h4>
                                    <p class="card-category"> Ini adalah data penilaian alternatif beserta masing-masing
                                        kriterianya</p>
                                </div>
                                <div class="col-lg-6">
                                    <a href="addpenilaian.php"><button
                                            class="btn btn-danger btn-sm float-right">Tambah</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th rowspan="2" style="text-align: center;">Alternatif</th>
                                        <th colspan="<?php echo $jml_kriteria+1; ?>" style="text-align: center;">
                                            Kriteria</th>
                                        <tr>
                                            <?php
                                    $kriteria = $saw->get_data_kriteria();
                                    while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                            <th style="text-align: center;">
                                                C<?php echo $data_kriteria['id_kriteria']; ?></th>
                                            <?php } ?>
                                            <th width="20%">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['kat'])){
                                            $alternatif = $saw->alternatif_by_idkat($_GET['kat']);
                                        }
                                        else{
                                            $alternatif = $saw->get_data_alternatif();
                                        }
                                        while ($data_alternatif = $alternatif->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <center>K<?php echo $data_alternatif['id_alternatif']; ?></center>
                                            </td>
                                            <?php
                                            $nilai = $saw->get_data_nilai_id($data_alternatif['id_alternatif']);
                                            while ($data_nilai = $nilai->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <td>
                                                <center><?php echo $data_nilai['nilai']; ?></center>
                                            </td>

                                            <?php } ?>
                                            <td>
                                                <a onclick="return confirm('Data akan dihapus!')"
                                                    href="penilaian.php?hapus_penilaian=<?=$data_alternatif['id_alternatif']?>">
                                                    <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
?>