<?php
if($hal==""){header("location:?pg=$pg&fl=$fl&hal=1");}
$id = inputGet('id');
$kode = inputPost('kode');
$nama = inputPost('nama');
$deskripsi = inputPost('deskripsi');
$Btn = inputPost('Btn');

$Tabel = "lokasi_aset"; 
$Kolom = "*";
$Kondisi = "";
$OrBy = "IdLokasiAset ASC";
$Limit = "";

//page number
$jumlahPerHalaman = 10;
$halamanAktif = isset($hal) ? (int)$hal : 1;
if ($halamanAktif <= 0) $halamanAktif = 1;

$hitungTotal = selectData($koneksiku, $Tabel, $Kondisi, 'COUNT(*) as total');
$totalData = $hitungTotal[0]['total'];
$totalHalaman = ceil($totalData / $jumlahPerHalaman);

$offset = ($halamanAktif - 1) * $jumlahPerHalaman;
$LimitPengelola = "$offset, $jumlahPerHalaman";

$QLokasiAset = selectData($koneksiku, $Tabel, $Kondisi, $Kolom, $OrBy, $Limit);
$CountTotal = count($QLokasiAset);

$KondisiId = ['IdLokasiAset' => $id];

if($Btn == "Simpan"){
    
    switch($ak)
    {
        case "edit":
            $dataUpdate = [
                'KodeLokasiAset'     => $kode,
                'NamaLokasiAset'  => $nama,
                'DeskripsiLokasiAset'  => $deskripsi,
                ];
            $simpan=updateData($koneksiku, $Tabel, $dataUpdate, $KondisiId);
            break;
        default:
            $dataBaru = [
                'KodeLokasiAset'     => $kode,
                'NamaLokasiAset'  => $nama,
                'DeskripsiLokasiAset'  => $deskripsi
                ];

            $simpan = insertData($koneksiku, $Tabel, $dataBaru);
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
        
        $hasil = deleteData($koneksiku, $Tabel, $KondisiId);

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
        $hasil = selectData($koneksiku, $Tabel, $KondisiId);
        $data = $hasil[0];
        $kode = $data['KodeLokasiAset'];
        $nama = $data['NamaLokasiAset'];
        $deskripsi = $data['DeskripsiLokasiAset'];
    break;
}

?>