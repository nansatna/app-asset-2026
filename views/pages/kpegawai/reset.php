<?php
    PageHeader(
        "Pegawai",
        "Atur ulang kata sandi untuk pegawai",
       buttonhref("?pg=$pg&fl=list&hal=$hal","Kembali","primary","circle-chevron-left","")
    );

    $BtnSimpan = button("Btn","Reset","primary","refresh-cw","");

    PageContentForm(
        <<<a1
            <div class="d-flex align-items-center mb-4 p-3 rounded-3" style="background-color: #f8fafc; border: 1px dashed #cbd5e1;">
                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center border shadow-sm me-3" style="width: 48px; height: 48px;">
                    <img src="https://ui-avatars.com/api/?name={$data['Nama']}&background=random&color=fff" class="rounded-circle shadow-sm" style="width: 42px; height: 42px; font-size: 0.9rem;">
                </div>
                <div>
                    <span class="text-muted small">{$data['Username']}</span>
                    <h6 class="fw-bold text-dark mb-0">{$data['Nama']}</h6>
                </div>
            </div>

            <form method="POST">
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Password Baru</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 ps-3" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                            <i data-lucide="lock" class="text-muted" style="width: 18px;"></i>
                        </span>
                        <input type="text" name="new_password" id="passInput" class="form-control form-control-lg bg-light border-0 fs-6" readonly value="$new_password">
                    </div>
                    <small class="text-danger mt-1 d-block">
                        * Tekan tombol reset untuk mendapatkan kata sandi secara acak
                    </small>
                </div>
                <div class="">
                    $BtnSimpan
                    $BtnCetak
                </div>
            </form>
        a1
    );

    dialogPrint();
?>