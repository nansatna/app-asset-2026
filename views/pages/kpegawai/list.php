<?php 
    
    PageHeader(
        "Pegawai",
        "Pengelolaan data induk dan informasi profil pegawai",
       buttonhref("?pg=$pg&fl=form&hal=$hal&ak=tambah","Tambah","primary","circle-plus","")
    );

    foreach ($semuaUser as $row) {
        
        if($row['StatusAktif'] === "1"){
            $AksiAktif = ["","?pg=$pg&fl=$fl&hal=$hal&ak=noaktif&id={$row['IdPegawai']}", "x-circle", "Non-Aktif"];
            $AksiReset = ["","?pg=$pg&fl=reset&hal=$hal&id={$row['IdPegawai']}", "key", "Reset"];
        }else{
            $AksiAktif = ["","?pg=$pg&fl=$fl&hal=$hal&ak=aktif&id={$row['IdPegawai']}", "check-circle-2", "Aktifkan"];
            $AksiReset = ["disabled","?pg=$pg&fl=reset&hal=$hal&id={$row['IdPegawai']}", "key", "Reset"];
        }

        $Aksi = AksiDropdown(
            [
                ["","?pg=$pg&fl=form&hal=$hal&ak=edit&id={$row['IdPegawai']}", "pencil", "Edit"],
                $AksiReset,
                $AksiAktif,
                ["hr"],
                ["hapus","#", "trash-2", "Hapus", "danger","konfirmasiHapus('?pg=$pg&fl=$fl&hal=$hal&ak=hapus&id={$row['IdPegawai']}')"]
            ]
        );

        $StatusPegawai = StatusPegawai($row['StatusAktif'],$row['Sandi']);

        $tr.=<<<tr
            <tr class="group-hover-shadow">
                <td class="ps-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="position-relative me-3">
                            <img src="https://ui-avatars.com/api/?name={$row['Nama']}&background=random&color=fff" class="rounded-circle shadow-sm" style="width: 42px; height: 42px; font-size: 0.9rem;">
                            <span class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div>
                            <span class="text-muted small">{$row['Username']}</span>
                            <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">{$row['Nama']}</h6>
                        </div>
                    </div>
                </td>
                <td class="py-3 small">$StatusPegawai</td>
                <td class="pe-4 py-3 text-end">
                    $Aksi
                </td>
            </tr>
        tr;
    }

    PageContentTabel(
    <<<th
        <th class="ps-4 py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Pegawai</th>
        <th class="py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Status</th>
        <th class="pe-4 py-3 text-end text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Aksi</th>
    th,
    <<<Tr
        $tr
    Tr,
    pageNumberShowing($counttotal, $totalData),
    pageNumber($halamanAktif,$totalHalaman,"pg=$pg&fl=$fl&hal=")
    );

    modalHapus();

?>