<div class="row align-items-center mb-4 g-3">
    <div class="col-md-6">
        <h4 class="fw-bold text-dark mb-0" style="letter-spacing: -0.5px;">Penghapusan Aset</h4>
        <p class="text-secondary small mb-0 mt-1">Pengelolaan aset yang sudah tidak digunakan atau dihapus dari inventaris</p>
    </div>
    <div class="col-md-6">
        <div class="d-flex gap-2 justify-content-md-end">
            <div class="d-flex gap-2 justify-content-md-end">
                <div class="position-relative" style="width: 220px;">
                    <input type="text" class="form-control border-0 shadow-sm ps-5" placeholder="Search..." style="background: #fff; padding-top: 0.6rem; padding-bottom: 0.6rem;">
                    <div class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                        <i data-lucide="search" style="width: 18px; height: 18px;"></i>
                    </div>
                </div>
                <a href="?pg=<?= $pg ?>&fl=tambah" class="btn btn-primary d-flex align-items-center gap-2 shadow-sm px-4 rounded-3 fw-medium" style="background-color: #4338ca; border: none; padding-top: 0.6rem; padding-bottom: 0.6rem;">
                    <i data-lucide="plus-circle" style="width: 18px; height: 18px;"></i>
                    <span>Tambah</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: #fff;">
    <div class="card-body p-0">
        
        <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
            <table class="table table-hover align-middle mb-0" style="border-collapse: collapse; white-space: nowrap;">
                
                <thead class="bg-white border-bottom sticky-top" style="z-index: 10;">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Waktu</th>
                        <th class="ps-4 py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">No. Surat</th>
                        <th class="py-3 text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Penerima</th>
                        <th class="pe-4 py-3 text-end text-uppercase text-secondary" style="font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">Aksi</th>
                    </tr>
                </thead>

                <tbody class="border-top-0">
                    <?php foreach($data_serah_terima as $ArrDt): ?>
                    <tr class="group-hover-shadow">
                        <td class="ps-4 py-3 small">09-02-2026 08:00:21</td>

                        <td class="ps-4 py-3 small"><?= $ArrDt['kode'] ?></td>

                        <td class="py-3 small">
                            <?php 
                                $key=array_search($ArrDt['peg_serah'], array_column($data_pegawai, 'id'));
                                echo $data_pegawai[$key]['nama'];
                            ?>
                        </td>

                        <td class="pe-4 py-3 text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light border shadow-sm" type="button" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'>
                                    <i data-lucide="more-horizontal" style="width:16px"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" style="z-index: 9999;">
                                    <li><a href="?pg=<?= $pg ?>&fl=edit&id=xxxx" class="dropdown-item small"><i data-lucide="pencil" style="width: 16px;"></i> Edit</a></li>
                                    <li>
                                        <button class="dropdown-item small" onclick="cetakDariFile('<?= $ArrDt['kode'] ?>','surat')">
                                        <i data-lucide="printer" style="width: 16px;"></i> Cetak</button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a href="#" class="dropdown-item small text-danger bg-danger bg-opacity-10"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalHapus" 
                                        onclick="konfirmasiHapus('?pg=Kaset&fl=list&aksi=hapus&id=XXXXX')">
                                        <i data-lucide="trash-2" style="width: 16px;"></i> Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-top py-3 px-4">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted small">Showing <strong>1-10</strong> of <strong>25</strong> users</span>
                <nav>
                    <ul class="pagination pagination-sm mb-0 gap-1">
                        <li class="page-item disabled"><a class="page-link border-0 rounded-2 text-secondary" href="#"><i data-lucide="chevron-left" style="width: 14px;"></i></a></li>
                        <li class="page-item active"><a class="page-link border-0 rounded-2 shadow-sm" href="#" style="background-color: #4338ca; color: white;">1</a></li>
                        <li class="page-item"><a class="page-link border-0 rounded-2 text-secondary hover-bg-light" href="#">2</a></li>
                        <li class="page-item"><a class="page-link border-0 rounded-2 text-secondary" href="#"><i data-lucide="chevron-right" style="width: 14px;"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger rounded-circle" style="width: 64px; height: 64px;">
                        <i data-lucide="alert-triangle" style="width: 32px; height: 32px;"></i>
                    </div>
                </div>

                <h6 class="fw-bold text-dark mb-1">Hapus Data Ini?</h6>
                <p class="text-muted small mb-4">
                    Tindakan ini tidak dapat dibatalkan. Data aset akan hilang permanen dari sistem.
                </p>

                <div class="d-grid gap-2">
                    <a href="#" id="btnLinkHapus" class="btn btn-danger fw-bold py-2 rounded-3 shadow-sm">
                        Ya, Hapus Permanen
                    </a>
                    
                    <button type="button" class="btn btn-light text-secondary fw-bold py-2 rounded-3" data-bs-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<iframe id="frameCetak" name="frameCetak" style="display:none;"></iframe>
