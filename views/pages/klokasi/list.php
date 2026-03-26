<?php
    PageHeader(
        "Lokasi",
        "Pengelolaan titik penempatan dan distribusi fisik aset"
    );

?>

<div class="container-fluid p-0">
    <div class="row g-4">
        
        <div class="col-lg-4">
            <?php
                $BtnSimpan = button("Btn","Simpan","primary","save","");
                PageContentForm(
                    <<<a
                        <form method="POST" autocomplete="off">
                        
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Kode</label>
                                <input type="text" name="kode" value='$kode' class="form-control form-control-lg bg-light border-0 fs-6" placeholder="Contoh : R001" style="border-radius: 10px;" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Nama</label>
                                <input type="text" name="nama" value='$nama' class="form-control form-control-lg bg-light border-0 fs-6" placeholder="" style="border-radius: 10px;" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control bg-light border-0 p-3" rows="3" style="border-radius: 12px; resize: none;">$deskripsi</textarea>
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

                

                foreach($QLokasiAset as $DtLokasiAset){

                    $BtnAksi = AksiDropdown([
                        ["", "?pg=$pg&fl=$fl&hal=$hal&ak=edit&id={$DtLokasiAset['IdLokasiAset']}", "pencil", "Edit"],
                        ["hr"],
                        ["hapus", "#", "trash-2", "Hapus", "danger", "konfirmasiHapus('?pg=$pg&fl=$fl&hal=$hal&ak=hapus&id={$DtLokasiAset['IdLokasiAset']}')"]
                    ]);

                    $tr.=<<<a
                        <tr>
                            <td class="ps-4 py-3 text-dark small">{$DtLokasiAset['KodeLokasiAset']}</td>
                            <td class="ps-4 py-3 text-dark small">{$DtLokasiAset['NamaLokasiAset']}</td>
                            <td class="ps-4 py-3 text-dark small">{$DtLokasiAset['DeskripsiLokasiAset']}</td>
                            <td class="pe-4 text-end">
                                $BtnAksi
                            </td>
                        </tr>
                    a;
                }

                PageContentTabel(
                    <<<th
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Kode</th>
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Lokasi</th>
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Deskripsi</th>
                        <th class="pe-4 py-3 text-end text-secondary small text-uppercase fw-bold">Aksi</th>
                    th,
                    $tr
                    ,
                    pageNumberShowing($CountTotal, $totalData),
                    pageNumber($halamanAktif,$totalHalaman,"pg=$pg&fl=$fl&hal=")
                );
            ?>
        </div>
    </div>
</div>

<?php modalHapus() ?>
