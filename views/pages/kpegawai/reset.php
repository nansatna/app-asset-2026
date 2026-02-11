<?php
    PageHeader(
        "Pegawai",
        "Atur ulang kata sandi untuk pegawai",
       buttonhref("?pg=$pg&fl=list","Kembali","primary","circle-chevron-left","")
    );

    $BtnSimpan = button("Btn","Simpan","primary","save","");
    $BtnCetak = buttonhref("#","Cetak","info text-white","printer","onclick=\"cetakDariFile('kode','reset')\"");

    PageContentForm(
        <<<a1
            <div class="d-flex align-items-center mb-4 p-3 rounded-3" style="background-color: #f8fafc; border: 1px dashed #cbd5e1;">
                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center border shadow-sm me-3" style="width: 48px; height: 48px;">
                    <span class="fw-bold text-primary">JD</span> 
                </div>
                <div>
                    <h6 class="fw-bold text-dark mb-0">John Doe</h6>
                    <span class="text-muted small">john.doe@kantor.com</span>
                </div>
            </div>

            <form method="POST">
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.75rem; letter-spacing: 0.5px; text-transform: uppercase;">Password Baru</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 ps-3" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                            <i data-lucide="lock" class="text-muted" style="width: 18px;"></i>
                        </span>
                        <input type="password" name="new_password" id="passInput" class="form-control form-control-lg bg-light border-0 fs-6" placeholder="Tekan tombol reset untuk mendapatkan kata sandi secara acak" readonly>
                    </div>
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