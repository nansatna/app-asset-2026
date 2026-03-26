<?php
    PageHeader("Pengelola Aset","Pengaturan tanggung jawab pegawai dalam manajemen aset","");

?>

<div class="container-fluid p-0">
    <div class="row g-4">
        
        <div class="col-lg-4">

            <?php
                $BtnSimpan=button("Btn","Simpan","primary","save","");
                //option pegawai
                foreach($QSelPegawai as $OpSelPegawai){
                    if($OpSelPegawai['IdPegawai'] == $pegawai)
                    {
                        $SelPegawai .= "
                            <option value='{$OpSelPegawai['IdPegawai']}' selected>{$OpSelPegawai['Nama']}</option>
                        ";
                    }
                    else
                    {
                        $SelPegawai .= "
                            <option value='{$OpSelPegawai['IdPegawai']}'>{$OpSelPegawai['Nama']}</option>
                        ";
                    }
                }

                //option role
                foreach($QSelRole as $OpSelRole){
                    if($OpSelRole['IdRole'] == $role)
                    {
                        $SelRole .= "
                            <option value='{$OpSelRole['IdRole']}' selected>{$OpSelRole['NamaRole']}</option>
                        ";
                    }
                    else
                    {
                        $SelRole .= "
                            <option value='{$OpSelRole['IdRole']}'>{$OpSelRole['NamaRole']}</option>
                        ";
                    }
                }

                PageContentForm(
                    <<<a
                         <form method="POST" autocomplete="off">
                        
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">
                                    <i data-lucide="user" style="width: 14px; margin-bottom: 2px;" class="me-1"></i> Pilih Pegawai
                                </label>
                                <select name="pegawai" class="form-select form-select-lg bg-light border-0 fs-6 text-dark" name="id_pegawai" style="cursor: pointer;">
                                    <option value="" selected disabled>-- Cari nama pegawai --</option>
                                    $SelPegawai
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">
                                    <i data-lucide="shield" style="width: 14px; margin-bottom: 2px;" class="me-1"></i> Role Access
                                </label>
                                
                                <select class="form-select form-select-lg bg-light border-0 fs-6 text-dark" name="role" style="cursor: pointer;">
                                    <option value="" selected disabled>-- Tentukan Role --</option>
                                    $SelRole
                                </select>
                                <div class="form-text text-muted x-small ms-1 mt-2">
                                    <i data-lucide="info" style="width: 12px; margin-bottom: 1px;" class="me-1"></i>
                                    Role menentukan menu apa saja yang bisa diakses user.
                                </div>
                            </div>

                            <div class="d-grid mt-5">
                                $BtnSimpan
                            </div>

                        </form>
                    a
                );
            ?>

        </div>

        <div class="col-lg-8">
            
            <?php

                //Data Pengelola
                foreach($QPengelola as $DtPengelola){
                    $BtnAksi = AksiDropdown(
                        [
                            ["", "?pg=$pg&fl=$fl&hal=$hal&ak=edit&id={$DtPengelola['IdPengelola']}", "pencil", "Edit", "", "5=onclick"],
                            ["hr"],
                            ["hapus", "#", "trash-2", "Hapus", "danger", "konfirmasiHapus('?pg=$pg&fl=$fl&hal=$hal&ak=hapus&id={$DtPengelola['IdPengelola']}')"]
                        ]
                    );

                    $tr.=<<<a
                        <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <img src="https://ui-avatars.com/api/?name={$DtPengelola['Nama']}&background=random&color=fff" class="rounded-circle shadow-sm" style="width: 42px; height: 42px; font-size: 0.9rem;">
                                        <span class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-white rounded-circle"></span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">{$DtPengelola['Nama']}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="small">{$DtPengelola['NamaRole']}</td>
                            <td class="pe-4 text-end">
                                $BtnAksi
                            </td>
                        </tr>
                    a;
                }

                PageContentTabel(
                    <<<a
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Pegawai</th>
                        <th class="py-3 text-secondary small text-uppercase fw-bold">Role</th>
                        <th class="pe-4 py-3 text-end text-secondary small text-uppercase fw-bold">Aksi</th>
                    a,
                    $tr
                    ,
                    "&nbsp",
                    pageNumber($halamanAktif,$totalHalaman,"pg=$pg&fl=$fl&hal=")
                );
            ?>

        </div>

    </div>
</div>

<?php
    modalHapus()
?>
