<?php
    $active = 'penilaian';
    include('header.php');
    if(!empty($_POST["add_record"])) {
        require_once("db.php");
        $no=0;        
        foreach($_POST['nilai'] as $dt){
            $sql = "INSERT INTO nilai_saw ( id_kriteria, id_alternatif, nilai) VALUES ( :id_kriteria, :id_alternatif, :nilai )";
            $pdo_statement = $pdo_conn->prepare( $sql );
            $result = $pdo_statement->execute( array( ':id_kriteria'=>$_POST['id_kriteria'][$no], ':id_alternatif'=>$_POST['id_alternatif'], ':nilai'=>$dt ) );
            $no++;
        }
        if (!empty($result) ){
            header('location:penilaian.php');
        }
    }
?>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Tambah Data Penilaian</a>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Penilaian</h4>
                            <p class="card-category">Silahkan isi form di bawah ini!</p>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nama Alternatif</label>
                                            <select name="id_alternatif" class="form-control">
                                                <option value="0">--Pilih--</option>
                                                <?php
                                                    $alternatif = $saw->get_data_alternatif();
                                                    while ($data_alternatif = $alternatif->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option value="<?=$data_alternatif['id_alternatif']?>"><?=$data_alternatif['nama_alternatif']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php
                                        $no=1;
                                            $kriteria = $saw->get_data_kriteria();
                                            while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">C<?=$data_kriteria['id_kriteria']?></label>
                                            <input type="hidden" name="id_kriteria[]" class="form-control" value="<?=$data_kriteria['id_kriteria']?>">
                                            <input type="text" name="nilai[]" class="form-control">
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <input name="add_record" type="submit" value="Add" class="btn btn-primary pull-right">
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-body">
                            <h4 class="card-title">Penilaian</h4>
                            <p class="card-description">
                                mencari penjumlahan terbobot dari penilaian kinerja setiap bobot semua kriteria dengan
                                proses perhitungan matematis
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
  include('footer.php');
?>