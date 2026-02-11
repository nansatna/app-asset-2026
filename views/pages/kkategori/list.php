<?php
    PageHeader(
        "Kategori Aset",
        "Pengelolaan dan klasifikasi jenis-jenis aset"
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
                                <input type="text" name="nama" class="form-control form-control-lg bg-light border-0 fs-6" placeholder="Contoh : R001" style="border-radius: 10px;" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Nama</label>
                                <input type="text" name="nama" class="form-control form-control-lg bg-light border-0 fs-6" placeholder="" style="border-radius: 10px;" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">Deskripsi</label>
                                <textarea name="alamat" class="form-control bg-light border-0 p-3" rows="3" style="border-radius: 12px; resize: none;"></textarea>
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
                $BtnAksi = AksiDropdown([
                    ["", "?pg=$pg&fl=$fl&ak=edit&id=xxxx", "pencil", "Eidt"],
                    ["hr"],
                    ["hapus", "#", "trash-2", "Hapus", "danger", "konfirmasiHapus('?pg=kkategori&fl=list&aksi=hapus&id=XXXXX')"]
                ]);

                PageContentTabel(
                    <<<th
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Kode</th>
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Kategori</th>
                        <th class="pe-4 py-3 text-end text-secondary small text-uppercase fw-bold">Aksi</th>
                    th,
                    <<<tr
                        <tr>
                            <td class="ps-4 py-3 fw-bold text-dark small">R001</td>
                            <td class="ps-4 py-3 fw-bold text-dark small">Kelas X</td>
                            <td class="pe-4 text-end">
                                $BtnAksi
                            </td>
                        </tr>
                    tr,
                    <<<knum
                        <span class="text-muted small">Showing <strong>1-10</strong> of <strong>25</strong> users</span>
                    knum,
                    <<<li
                        <li class="page-item disabled"><a class="page-link border-0" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link border-0 bg-primary shadow-sm" href="#">1</a></li>
                        <li class="page-item"><a class="page-link border-0 text-secondary" href="#">2</a></li>
                        <li class="page-item"><a class="page-link border-0" href="#">Next</a></li>
                    li
                );
            ?>
        </div>
    </div>
</div>

<?php modalHapus() ?>
