<?php
if($hal==""){header("location:?pg=$pg&fl=$fl&hal=1");}
$id = inputGet('id');
$pegawai = inputPost('pegawai');
$role = inputPost('role');
$Btn = inputPost('Btn');

//option pegawai
$TabelSelPegawai = "pegawai"; 
$KolomSelPegawai = "IdPegawai,Nama";
$KondisiSelPegawai = "";
$OrBySelPegawai = "";
$LimitSelPegawai = "";
$QSelPegawai = selectData($koneksiku, $TabelSelPegawai, $KondisiSelPegawai, $KolomSelPegawai, $OrBySelPegawai, $LimitSelPegawai);

//Role
$TabelSelRole = "role"; 
$KolomSelRole = "IdRole,NamaRole";
$KondisiSelRole = "";
$OrBySelRole = "";
$LimitSelRole = "";
$QSelRole = selectData($koneksiku, $TabelSelRole, $KondisiSelRole, $KolomSelRole, $OrBySelRole, $LimitSelRole);


//Pengelola
$TabelPengelola = "pengelola_aset"; 
$TabelVPengelola = "v_pengelola_aset"; 
$KolomPengelola = "IdPengelola,Nama,NamaRole";
$KondisiPengelola = "";
$OrByPengelola = "IdPengelola ASC";
$LimitPengelola = "";

//page number
$jumlahPerHalaman = 10;
$halamanAktif = isset($hal) ? (int)$hal : 1;
if ($halamanAktif <= 0) $halamanAktif = 1;

$hitungTotal = selectData($koneksiku, $TabelVPengelola, $KondisiPengelola, 'COUNT(*) as total');
$totalData = $hitungTotal[0]['total'];
$totalHalaman = ceil($totalData / $jumlahPerHalaman);

$offset = ($halamanAktif - 1) * $jumlahPerHalaman;
$LimitPengelola = "$offset, $jumlahPerHalaman";

$QPengelola = selectData($koneksiku, $TabelVPengelola, $KondisiPengelola, $KolomPengelola, $OrByPengelola, $LimitPengelola);


$KondisiId = ['IdPengelola' => $id];

if($Btn == "Simpan"){
    
    switch($ak)
    {
        case "edit":
            $dataUpdate = [
                    'IdRole' => $role
                ];
            $simpan=updateData($koneksiku, $TabelPengelola, $dataUpdate, $KondisiId);
            break;
        default:
            $dataBaru = [
                'IdPegawai'     => $pegawai,
                'IdRole'  => $role
                ];

            $simpan = insertData($koneksiku, $TabelPengelola, $dataBaru);
        break;
    }
    


    if($simpan){
        setAlert("SimpanBerhasil");
        header("location:index.php?pg=$pg&fl=$fl&hal=$hal");
        exit();
    }else{
        showAlert1("SimpanGagal");
    }

}


switch($ak)
{
    case "hapus":
        
        $hasil = deleteData($koneksiku, $TabelPengelola, $KondisiId);

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
    case "edit":
        $hasil = selectData($koneksiku, $TabelPengelola, $KondisiId);
        $data = $hasil[0];
        $pegawai = $data['IdPegawai'];
        $role = $data['IdRole'];
    break;
}

?>