<?php
if($hal==""){header("location:?pg=$pg&fl=$fl&hal=1");}
$id = inputGet('id');
$kode = inputPost('kode');
$nama = inputPost('nama');
$deskripsi = inputPost('deskripsi');
$Btn = inputPost('Btn');

$Tabel = "kategori_aset"; 
$Kolom = "*";
$Kondisi = "";
$OrBy = "IdKategoriAset ASC";
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

$QKategoriAset = selectData($koneksiku, $Tabel, $Kondisi, $Kolom, $OrBy, $Limit);
$CountTotal = count($QKategoriAset);

$KondisiId = ['IdKategoriAset' => $id];

if($Btn == "Simpan"){
    
    switch($ak)
    {
        case "edit":
            $dataUpdate = [
                'KodeKategori'     => $kode,
                'NamaKategori'  => $nama,
                'DeskripsiKategori'  => $deskripsi,
                ];
            $simpan=updateData($koneksiku, $Tabel, $dataUpdate, $KondisiId);
            break;
        default:
            $dataBaru = [
                'KodeKategori'     => $kode,
                'NamaKategori'  => $nama,
                'DeskripsiKategori'  => $deskripsi
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
        $kode = $data['KodeKategori'];
        $nama = $data['NamaKategori'];
        $deskripsi = $data['DeskripsiKategori'];
    break;
}

?>