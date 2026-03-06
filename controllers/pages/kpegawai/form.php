<?php
    $id=inputGet('id');
    $username=inputPost('username');
    $nama=inputPost('nama');
    $gender=inputPost('gender');
    $tempat_lahir=inputPost('tempat_lahir');
    $tanggal_lahir=inputPost('tanggal_lahir','2000-01-01');
    $alamat=inputPost('alamat');
    $btn=inputPost('btn');

    $btn = $_POST["btn"];

    if($btn === "Simpan"){
        switch($ak){
            case "tambah":
                $dataBaru = [
                    'Username' => $username,
                    'Nama'     => $nama,
                    'Gender'  => $gender,
                    'TempatLahir'   => $tempat_lahir,
                    'TanggalLahir'  =>  $tanggal_lahir,
                    'Alamat'    => $alamat
                ];
                
                $simpan = insertData($koneksiku, 'pegawai', $dataBaru);
                if($simpan){
                    setAlert("SimpanBerhasil");
                    header("location:index.php?pg=$pg&fl=$fl&ak=$ak&id=$id");
                    exit();
                }else{
                    showAlertGagal("SimpanGagal");
                }

            break;
            case "edit":
                $dataUpdate = [
                    'Username' => $username,
                    'Nama'     => $nama,
                    'Gender'  => $gender,
                    'TempatLahir'   => $tempat_lahir,
                    'TanggalLahir'  =>  $tanggal_lahir,
                    'Alamat'    => $alamat
                ];

                $kondisi = ['IdPegawai' => $id];

                $simpan=updateData($koneksiku, 'pegawai', $dataUpdate, $kondisi);

                if($simpan){
                    setAlert("SimpanBerhasil");
                    header("location:index.php?pg=$pg&fl=$fl&ak=$ak&id=$id");
                    exit();
                }else{
                    showAlertGagal("SimpanGagal");
                }
                
            break;
        }
    }

    switch($ak){
        case "edit":
                $kondisi = ['IdPegawai' => $id];
                $hasil = selectData($koneksiku, 'pegawai', $kondisi);
                $data = $hasil[0];
                $username = $data['Username'];
                $nama = $data['Nama'];
                $gender = $data['Gender'];
                $tempat_lahir = $data['TempatLahir'];
                $tanggal_lahir = $data['TanggalLahir'];
                $alamat = $data['Alamat'];
            break;
    }
   

    switch($gender){
        case "L":
            $CGenderL = "checked";
            break;
        case "P":
            $CGenderP = "checked";
            break;
        default :
            $CGenderL = "checked";
            break;
    }


?> 