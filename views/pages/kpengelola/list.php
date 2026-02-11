<?php
    PageHeader("Pengelola Aset","Pengaturan tanggung jawab pegawai dalam manajemen aset","");

?>

<div class="container-fluid p-0">
    <div class="row g-4">
        
        <div class="col-lg-4">

            <?php
                $BtnSimpan=button("Btn","Simpan","primary","save","");
                PageContentForm(
                    <<<a
                         <form method="POST" autocomplete="off">
                        
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">
                                    <i data-lucide="user" style="width: 14px; margin-bottom: 2px;" class="me-1"></i> Pilih Pegawai
                                </label>
                                <select name="pegawai" class="form-select form-select-lg bg-light border-0 fs-6 text-dark" name="id_pegawai" style="cursor: pointer;">
                                    <option value="" selected disabled>-- Cari nama pegawai --</option>
                                    <option value="1">Siti Nurhaliza (SN)</option>
                                    <option value="2">John Doe (JD)</option>
                                    <option value="3">Budi Santoso (BS)</option>
                                    <option value="4">Dewi Persik (DP)</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-secondary text-uppercase" style="letter-spacing: 0.5px;">
                                    <i data-lucide="shield" style="width: 14px; margin-bottom: 2px;" class="me-1"></i> Role Access
                                </label>
                                
                                <select class="form-select form-select-lg bg-light border-0 fs-6 text-dark" name="role" style="cursor: pointer;">
                                    <option value="" selected disabled>-- Tentukan Role --</option>
                                    <option value="1">Admin Instansi</option>
                                    <option value="2">Pengelola Aset</option>
                                    <option value="3">Staf</option>
                                    <option value="4">Teknisi</option>
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
                $BtnAksi = AksiDropdown(
                    [
                        ["", "?pg=$pg&fl=$fl&ak=edit&id=xxx", "pencil", "Edit", "", "5=onclick"],
                        ["hr"],
                        ["hapus", "#", "trash-2", "Hapus", "danger", "konfirmasiHapus('?pg=$pg&fl=$fl&ak=hapus&id=XXXXX')"]
                    ]
                );

                PageContentTabel(
                    <<<a
                        <th class="ps-4 py-3 text-secondary small text-uppercase fw-bold">Pegawai</th>
                        <th class="py-3 text-secondary small text-uppercase fw-bold">Role</th>
                        <th class="pe-4 py-3 text-end text-secondary small text-uppercase fw-bold">Aksi</th>
                    a,
                    <<<a
                         <tr>
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <img src="https://ui-avatars.com/api/?name=Nano Supriatna&background=random&color=fff" class="rounded-circle shadow-sm" style="width: 42px; height: 42px; font-size: 0.9rem;">
                                        <span class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-white rounded-circle"></span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Nano Supriatna</h6>
                                        <span class="text-muted small">nans@gmail.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="small">Admin Instansi</td>
                            <td class="pe-4 text-end">
                                $BtnAksi
                            </td>
                        </tr>
                    a,
                    "&nbsp",
                    <<<a
                        <li class="page-item disabled"><a class="page-link border-0" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link border-0 bg-primary shadow-sm" href="#">1</a></li>
                        <li class="page-item"><a class="page-link border-0 text-secondary" href="#">2</a></li>
                        <li class="page-item"><a class="page-link border-0" href="#">Next</a></li>
                    a
                );
            ?>

        </div>

    </div>
</div>

<?php
    modalHapus()
?>
