<?php
    $new_password = inputPost('new_password');
    $Btn = inputPost('Btn');
    $id = inputGet('id');
    $pas = inputGet('pas');

    $kondisi = ['IdPegawai' => $id];
    $hasil = selectData($koneksiku, 'pegawai', $kondisi);
    $data = $hasil[0];
    
    if($Btn){
        $new_password = randomPassword();

        $dataUpdate = [
                    'Sandi' => password_hash($new_password, PASSWORD_DEFAULT)
                ];

        // $kondisi = ['IdPegawai' => $id];

        $simpan=updateData($koneksiku, 'pegawai', $dataUpdate, $kondisi);

        if($simpan){
            showAlert1("ResetBerhasil");
        }else{
            showAlert1("ResetGagal");
        }

        $BtnCetak = buttonhref("#","Cetak","info text-white","printer","onclick=\"cetakDariFile('pg=kpegawai&fl=$fl&id=$id&pas=$new_password')\"");
        
    }

    $JdCetak = "Reset Password [ " .$data['Nama']." ]";

?>