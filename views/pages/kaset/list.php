<?php
    PageHeader(
        "Aset",
        "Pengelolaan daftar inventaris dan pelacakan status aset secara mendetail",
       buttonhref("?pg=$pg&fl=form&ak=tambah","Tambah","primary","circle-plus","")
    );

    $Aksi = AksiDropdown(
        [
            ["","?pg=$pg&fl=form&ak=edit&id=xxx", "pencil", "Edit"],
            ["qr","#", "qr-code", "QR-Code", "","generateQRCode('BRG-00123', 'Laptop Gaming ASUS')"],
            ["hr"],
            ["hapus","#", "trash-2", "Hapus", "danger","konfirmasiHapus('?pg=$pg&fl=$fl&ak=hapus&id=XXXXX')"]
        ]
    );

    PageContentTabel(
    <<<th
        <th class="ps-4 py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Inventaris</th>
        <th class="py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Kategori</th>
        <th class="py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Lokasi</th>
        <th class="pe-4 py-3 text-end text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Aksi</th>
    th,
    <<<Tr
        <tr class="group-hover-shadow">
            <td class="ps-4 py-3">
                <div class="d-flex align-items-center">
                    <div class="position-relative me-3">
                        <img src="https://id-media.apjonlinecdn.com/wysiwyg/blog/reasons_to_own_all_in_one_desktop_computer/500x436_px._hp_pavilion_24_inch_all_in_one_desktop.png" 
                            alt="Foto Barang" 
                            class="rounded-3 shadow-sm border border-light" 
                            style="width: 48px; height: 48px; object-fit: cover;">
                    </div>
                    <div>
                        <span class="text-muted small">KODE: BRG-00123</span>
                        <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;">Laptop Gaming ASUS</h6>
                    </div>
                </div>
            </td>
            <td class="py-3"><span class="fw-medium text-dark">Komputer</span></td>
            <td class="py-3 text-secondary small">Ruang A</td>
            <td class="pe-4 py-3 text-end">
                $Aksi
            </td>
        </tr>
    Tr,
    <<<knum
        <span class="text-muted small">Showing <strong>1-10</strong> of <strong>25</strong> users</span>
    knum,
    <<<num
        <li class="page-item disabled"><a class="page-link border-0" href="#">Prev</a></li>
        <li class="page-item active"><a class="page-link border-0 bg-primary shadow-sm" href="#">1</a></li>
        <li class="page-item"><a class="page-link border-0 text-secondary" href="#">2</a></li>
        <li class="page-item"><a class="page-link border-0" href="#">Next</a></li>
    num
    );

    modalHapus();

    modalQRCode();
?>