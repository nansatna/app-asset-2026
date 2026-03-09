<?php
    $id = inputGet('id');

    if($hal==""){header("location:?pg=$pg&fl=$fl&hal=1");}

    $tabel = "pegawai";
    $kondisisemua = ['IdPegawai !=' => $_SESSION['IdUser']];
    $kolompilih = "IdPegawai, Nama, Username, StatusAktif, Sandi";
    $orderby = "Create_at ASC";

    //page number
    $jumlahPerHalaman = 10;
    $halamanAktif = isset($hal) ? (int)$hal : 1;
    if ($halamanAktif <= 0) $halamanAktif = 1;

    $hitungTotal = selectData($koneksiku, $tabel, $kondisisemua, 'COUNT(*) as total');
    $totalData = $hitungTotal[0]['total'];
    $totalHalaman = ceil($totalData / $jumlahPerHalaman);

    $offset = ($halamanAktif - 1) * $jumlahPerHalaman;
    $limit = "$offset, $jumlahPerHalaman";

    $semuaUser = selectData($koneksiku, $tabel, $kondisisemua, $kolompilih, $orderby, $limit);

    $counttotal = count($semuaUser);
    
    //Aksi
    if($ak !== ""){
        $kondisi = ['IdPegawai' => $id];
        $QData = selectData($koneksiku, $tabel, $kondisi);
        $data = $QData[0];

        switch($ak){
            case "aktif":
                $dataUpdate = [
                    'StatusAktif' => 1
                ];

                $simpan=updateData($koneksiku, $tabel, $dataUpdate, $kondisi);

                if($simpan){
                    setAlert("AktifBerhasil",$data['Nama']);
                    header("location:index.php?pg=$pg&fl=$fl&hal=$hal");
                    exit();
                }

                break;

            case "noaktif":
                $dataUpdate = [
                    'StatusAktif' => 0,
                    'Sandi' => ""
                ];

                $simpan=updateData($koneksiku, $tabel, $dataUpdate, $kondisi);

                if($simpan){
                    setAlert("NonAktifBerhasil",$data['Nama']);
                    header("location:index.php?pg=$pg&fl=$fl&hal=$hal");
                    exit();
                }

                break;

            case "hapus":
                
                $hasil = deleteData($koneksiku, 'pegawai', $kondisi);

                if ($hasil) {
                    setAlert("HapusBerhasil");
                    header("location:index.php?pg=$pg&fl=$fl&hal=$hal");
                    exit();
                } else {
                    setAlert("HapusGagal");
                    header("location:index.php?pg=$pg&fl=$fl&hal=$hal");
                    exit();
                }

                break;
        }
    }
    
?>